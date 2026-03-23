// guitar-fretboard.js
//
// ─────────────────────────────────────────────────────────────
//  LLM-FRIENDLY NOTE — READ THIS BEFORE TOUCHING ANYTHING
// ─────────────────────────────────────────────────────────────
//
//  THIS CUSTOM ELEMENT IS <guitar-fretboard> IN THE HTML.
//
//  CONTRACT WITH THE REST OF THE APP:
//
//    • main.js WILL CALL:
//          guitarElement.setAnswerKey(answerKey, context)
//
//    • answerKey IS AN ARRAY OF NOTE OBJECTS FROM music-theory.js:
//          {
//              degree: <1–7>,
//              relSemitones: <0–11>,
//              semitones: <0–11>,
//              note: <string>
//          }
//
//    • context IS AN OBJECT:
//          {
//              type: "mode" | "chord",
//              degree: <number>,
//              tonic: <string>
//          }
//
//  DO NOT:
//    • Rename setAnswerKey
//    • Change its parameter order
//    • Expect any other shape for answerKey or context
//
//  RENDERING RULE:
//
//    • Highlight any fret whose semitone is in answerKey.semitones
//    • Show NOTE NAMES on highlighted frets
//
//  If you change this behavior, the trainer stops being predictable.
//
// ─────────────────────────────────────────────────────────────

const NOTE_NAMES = ["C", "C#", "D", "Eb", "E", "F", "F#", "G", "Ab", "A", "Bb", "B"];

// LLM NOTE: Standard tuning E A D G B E (low to high).
// Values are absolute semitone classes relative to C.
const STRING_OPEN_SEMITONES = [4, 9, 2, 7, 11, 4]; // E A D G B E

// LLM NOTE: This is the visual fret range. You can change it via attribute if needed.
const DEFAULT_FRETS = 15;

// LLM NOTE (PEDAGOGY / POSITION):
// "Position" = the fret window where the student's eyes should focus for this degree
// (e.g. G Ionian in "the box" = frets 2–5). We use rsync-style include logic:
// we draw ALL dots that are in the mode/triad; we then INCLUDE (for focus styling)
// only those dots that also lie inside the position window. So: full set first,
// then a subset gets the focus hue — we never exclude dots from being drawn.
const POSITION_FRET_SPAN = 4;

function getPositionFretRange(degree, frets) {
  const deg = Number(degree) || 1;
  const minFret = Math.max(0, 2 + (deg - 1) * 2);
  const maxFret = Math.min(frets, minFret + POSITION_FRET_SPAN - 1);
  return { minFret, maxFret };
}

// Idle in-scale dots (outside position): normal yellow. Inside position: focus (brighter).
const FILL_OUTSIDE_POSITION = "#ffbb33";
const FILL_INSIDE_POSITION = "#ffdd66";

export class GuitarFretboard extends HTMLElement {
  constructor() {
    super();
    this.attachShadow({ mode: "open" });
    this.answerKey = [];
    this.context = null;
    this._clickHandlerAttached = false; // LLM NOTE: ensure we only wire events once.
    this.flashNote = null;              // LLM NOTE: optional transient flash target (note name).
    this._flashTimeoutId = null;
  }

  // ─────────────────────────────────────────────────────────
  //  OPTIONAL PUBLIC API — flashNote(noteName)
  // ─────────────────────────────────────────────────────────
  //
  //  LLM NOTE:
  //  • This method is OPTIONAL and purely visual.
  //  • It does NOT change answerKey or context.
  //  • It triggers a short-lived overlay that circles every fret position
  //    whose semitone matches the given note name (C, C#, D, ...).
  //
  //  Used by:
  //      • main.js when a fretboard dot or piano key is clicked.
  //
  flashNote(noteName) {
    if (!noteName || !NOTE_NAMES.includes(noteName)) return;

    // Normalize and schedule transient flash.
    this.flashNote = noteName;
    if (this._flashTimeoutId) {
      clearTimeout(this._flashTimeoutId);
    }
    this.render();
    this._flashTimeoutId = setTimeout(() => {
      this.flashNote = null;
      this.render();
    }, 250);
  }

  // ─────────────────────────────────────────────────────────
  //  PUBLIC API — DO NOT RENAME
  // ─────────────────────────────────────────────────────────
  //
  //  main.js calls:
  //      guitar.setAnswerKey(answerKey, context)
  //
  setAnswerKey(answerKey, context) {
    this.answerKey = Array.isArray(answerKey) ? answerKey : [];
    this.context = context || null;
    this.render();
  }

  // ─────────────────────────────────────────────────────────
  //  RENDER
  // ─────────────────────────────────────────────────────────
  render() {
    const fretsAttr = Number(this.getAttribute("frets"));
    const frets = Number.isFinite(fretsAttr) && fretsAttr > 0 ? fretsAttr : DEFAULT_FRETS;

    // LLM NOTE:
    // allowed = set of absolute semitone classes to highlight for the current
    // answerKey (mode / triad). flashSemi is an OPTIONAL extra pitch class
    // used for a transient "flash all X's" overlay when a note is clicked.
    const allowed = new Set(this.answerKey.map(n => n.semitones));
    const flashSemi =
      this.flashNote && NOTE_NAMES.includes(this.flashNote)
        ? NOTE_NAMES.indexOf(this.flashNote)
        : -1;

    const width = 1000;
    const height = 260;
    // Cosmetic: nut is drawn one fret-width in, so the board starts at 0 and the nut
    // doesn't imply a "-1" fret (open is segment 0, nut is its right edge).
    const numSegments = frets + 1; // open + frets 1..N
    const fretWidth = width / numSegments;
    const stringHeight = height / (STRING_OPEN_SEMITONES.length + 1);
    const stringCount = STRING_OPEN_SEMITONES.length;

    // LLM NOTE (PEDAGOGY / ORIENTATION):
    // The tuning array above is ordered LOW → HIGH (6th string to 1st string).
    // Visually, we MUST draw lower tones closer to the bottom of the viewport.
    // Therefore: string index 0 (low E) is drawn at the BOTTOM, not the top.
    const yForStringIndex = (sIdx) => (stringCount - sIdx) * stringHeight;

    // Vertical extent of the imaginary maple: frets run only between top and bottom string.
    const yMapleTop = yForStringIndex(stringCount - 1);
    const yMapleBottom = yForStringIndex(0);

    // Position window for "include" focus: only dots inside this fret range get focus fill.
    const degree = this.context && this.context.degree != null ? this.context.degree : 1;
    const { minFret, maxFret } = getPositionFretRange(degree, frets);

    const svgParts = [];
    svgParts.push(`<svg viewBox="0 0 ${width} ${height}" width="100%" height="100%">`);

    // Frets: nut at first segment boundary (one fret over), then fret 1..N.
    // Frets do not extend beyond the maple (string band); they stay between top and bottom string.
    for (let f = 0; f <= frets; f++) {
      const x = (f + 1) * fretWidth;
      const strokeWidth = f === 0 ? 4 : 1;
      const stroke = f === 0 ? "#e8e0d5" : "#999";
      svgParts.push(
        `<line x1="${x}" y1="${yMapleTop}" x2="${x}" y2="${yMapleBottom}" stroke="${stroke}" stroke-width="${strokeWidth}"/>`
      );
    }

    // Strings
    STRING_OPEN_SEMITONES.forEach((_, i) => {
      const y = yForStringIndex(i);
      svgParts.push(
        `<line x1="0" y1="${y}" x2="${width}" y2="${y}" stroke="#666" stroke-width="2"/>`
      );
    });

    // Notes
    // LLM NOTE (PEDAGOGY):
    // We do NOT print note names on the fretboard itself. The student should
    // discover note identities by cross‑referencing the piano + table. We
    // still encode the note name as data-note for click handling, but keep
    // the visual dots anonymous.
    // LLM NOTE (rsync-style include): All allowed dots are drawn. We INCLUDE
    // for focus styling only those dots whose fret index lies in [minFret, maxFret].
    STRING_OPEN_SEMITONES.forEach((openSemi, sIdx) => {
      const y = yForStringIndex(sIdx);
      for (let f = 0; f <= frets; f++) {
        const x = (f + 0.5) * fretWidth;
        const sem = (openSemi + f) % 12;

        if (allowed.has(sem)) {
          const note = NOTE_NAMES[sem];
          const r = stringHeight * 0.3;
          const inPosition = f >= minFret && f <= maxFret;
          const fill = inPosition ? FILL_INSIDE_POSITION : FILL_OUTSIDE_POSITION;

          svgParts.push(`
                        <g data-note="${note}">
                            <circle cx="${x}" cy="${y}" r="${r}" fill="${fill}" stroke="#333"/>
                        </g>
                    `);
        }
      }
    });

    // Optional flash overlay: highlight ALL fret positions whose semitone
    // matches flashSemi, regardless of whether they are in the current
    // answerKey. This preserves the original "show every C on the neck"
    // behavior when a single note is chosen.
    if (flashSemi >= 0) {
      STRING_OPEN_SEMITONES.forEach((openSemi, sIdx) => {
        const y = yForStringIndex(sIdx);
        for (let f = 0; f <= frets; f++) {
          const x = (f + 0.5) * fretWidth;
          const sem = (openSemi + f) % 12;
          if (sem !== flashSemi) continue;

          svgParts.push(`
                        <circle cx="${x}" cy="${y}" r="${stringHeight * 0.35}"
                                fill="none" stroke="#0074D9" stroke-width="3"/>
                    `);
        }
      });
    }

    svgParts.push(`</svg>`);

    const qualitySuffix = this.context && this.context.quality ? ` (${this.context.quality})` : "";
    const ctxLabel = this.context
      ? this.context.type === "chord"
        ? `<div class="ctx">Key of ${this.context.tonic}, Triad degree ${this.context.degree} (${this.context.modeName || ""})${qualitySuffix}</div>`
        : `<div class="ctx">Key of ${this.context.tonic}, Mode: ${this.context.modeName || this.context.degree}${qualitySuffix}</div>`
      : `<div class="ctx">No context</div>`;

    this.shadowRoot.innerHTML = `
            <style>
                :host {
                    display: block;
                    min-height: 220px;
                }
                /* LLM NOTE:
                   The SVG background is transparent on purpose.
                   The "fretboard" is defined by strings + frets only.
                   Fret markers live beneath this region for clear pedagogy. */
                svg {
                    background: transparent;
                }
                text {
                    font-family: system-ui, sans-serif;
                }
                .ctx {
                    color: #222;
                    font-family: system-ui, sans-serif;
                    margin-bottom: 0.5rem;
                    font-size: 0.9rem;
                }
            </style>
            ${ctxLabel}
            ${svgParts.join("")}
        `;

    // LLM NOTE:
    // Click handling is implemented via event delegation on the shadow root.
    // When a highlighted note circle is clicked, we dispatch a custom event
    // "fret-note-click" that bubbles OUT of the component so main.js (or any
    // controller) can react and, for example, update the note-panel.
    if (!this._clickHandlerAttached) {
      this._clickHandlerAttached = true;
      this.shadowRoot.addEventListener("click", (evt) => {
        const target = evt.target;
        if (!target) return;

        // Walk up to the nearest <g> that represents a note dot.
        const group = target.closest("g[data-note]");
        if (!group) return;

        // Read the encoded note name; dots themselves remain unlabeled visually.
        const noteName = group.getAttribute("data-note");
        if (!noteName) return;

        this.dispatchEvent(
          new CustomEvent("fret-note-click", {
            detail: { note: noteName },
            bubbles: true,
            composed: true
          })
        );
      });
    }
  }
}

customElements.define("guitar-fretboard", GuitarFretboard);
