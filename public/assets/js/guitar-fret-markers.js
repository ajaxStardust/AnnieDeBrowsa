// guitar-fret-markers.js
//
// ─────────────────────────────────────────────────────────────
//  LLM-FRIENDLY NOTE — READ BEFORE EDITING
// ─────────────────────────────────────────────────────────────
//
//  THIS CUSTOM ELEMENT IS <guitar-fret-markers> IN THE HTML.
//
//  PEDAGOGY CONTRACT:
//
//    • This component ONLY renders position markers (dots) at
//      frets 3, 5, 7, 9, 12, 15.
//    • It MUST NOT render strings, frets, or notes.
//    • It MUST be visually SEPARATE from the neck so students
//      see it as a reference strip, not part of the fretboard.
//
//  GEOMETRY CONTRACT:
//
//    • Width and fret count MUST align with <guitar-fretboard>
//      so markers line up under the same fret numbers.
//    • Use the SAME segment layout as guitar-fretboard: numSegments = frets + 1
//      (open + frets), fretWidth = width / numSegments, center of fret f at
//      (f + 0.5) * fretWidth. Do NOT use width/frets or markers will misalign.
//    • Background MUST remain transparent.
//
//  DO NOT:
//    • Add note names here.
//    • Add tonic / mode / degree logic here.
//    • Depend on music-theory.js.
//
// ─────────────────────────────────────────────────────────────

const MARKER_FRETS = [3, 5, 7, 9, 12, 15];
const DEFAULT_FRETS = 15;

export class GuitarFretMarkers extends HTMLElement {
  constructor() {
    super();
    this.attachShadow({ mode: "open" });
  }

  connectedCallback() {
    this.render();
  }

  render() {
    const fretsAttr = Number(this.getAttribute("frets"));
    const frets = Number.isFinite(fretsAttr) && fretsAttr > 0 ? fretsAttr : DEFAULT_FRETS;

    // LLM NOTE:
    // Match fretboard geometry exactly: nut one segment in, so numSegments = frets + 1.
    const width = 1000;
    const height = 60;
    const numSegments = frets + 1;
    const fretWidth = width / numSegments;

    const svgParts = [];
    svgParts.push(`<svg viewBox="0 0 ${width} ${height}" width="100%" height="100%">`);

    // LLM NOTE:
    // Marker row sits roughly in the middle of this strip.
    const markerY = height / 2;

    MARKER_FRETS.forEach(fretNum => {
      if (fretNum < 0 || fretNum > frets) return;
      const xCenter = (fretNum + 0.5) * fretWidth;

      if (fretNum === 12) {
        const offset = height * 0.18;
        svgParts.push(`
                <g>
                    <circle cx="${xCenter}" cy="${markerY - offset}" r="${height * 0.12}" fill="#666" />
                    <circle cx="${xCenter}" cy="${markerY + offset}" r="${height * 0.12}" fill="#666" />
                </g>
            `);
      } else {
        svgParts.push(`
                <circle cx="${xCenter}" cy="${markerY}" r="${height * 0.14}" fill="#666" />
            `);
      }
    });

    svgParts.push(`</svg>`);

    this.shadowRoot.innerHTML = `
        <style>
            :host {
                display: block;
                min-height: ${height}px;
            }
            svg {
                background: transparent;
            }
        </style>
        ${svgParts.join("")}
    `;
  }
}

customElements.define("guitar-fret-markers", GuitarFretMarkers);

