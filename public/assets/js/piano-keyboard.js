// piano-keyboard.js
// Highlights allowed semitones and shows note names on keys.

const NOTE_NAMES = ["C", "C#", "D", "Eb", "E", "F", "F#", "G", "Ab", "A", "Bb", "B"];

export class PianoKeyboard extends HTMLElement {
  constructor() {
    super();
    this.attachShadow({ mode: "open" });
    this.answerKey = [];
    this.context = null;
    this._clickHandlerAttached = false; // LLM NOTE: ensure we only wire events once.
  }

  setAnswerKey(answerKey, context) {
    this.answerKey = answerKey || [];
    this.context = context || null;
    this.render();
  }

  render() {
    const allowed = new Set(this.answerKey.map(n => n.semitones));
    const whiteKeys = [0, 2, 4, 5, 7, 9, 11];
    const blackKeys = [1, 3, 6, 8, 10];

    const width = 420;
    const height = 120;
    const whiteWidth = width / whiteKeys.length;

    const svgParts = [];
    svgParts.push(`<svg viewBox="0 0 ${width} ${height}" width="100%" height="100%">`);

    // White keys
    whiteKeys.forEach((semi, i) => {
      const x = i * whiteWidth;
      const isActive = allowed.has(semi);
      svgParts.push(`
                <g data-note="${NOTE_NAMES[semi]}">
                    <rect x="${x}" y="0" width="${whiteWidth}" height="${height}" 
                          fill="${isActive ? "#ffbb33" : "#fff"}" stroke="#000"/>
                    <text x="${x + whiteWidth / 2}" y="${height - 10}" text-anchor="middle"
                          font-size="12" fill="#000">${NOTE_NAMES[semi]}</text>
                </g>
            `);
    });

    // Black keys (positioned between white keys)
    const blackPositions = {
      1: 0.75,
      3: 1.75,
      6: 3.75,
      8: 4.75,
      10: 5.75
    };

    blackKeys.forEach(semi => {
      const idx = blackPositions[semi];
      if (idx == null) return;
      const x = idx * whiteWidth;
      const isActive = allowed.has(semi);
      svgParts.push(`
                <g data-note="${NOTE_NAMES[semi]}">
                    <rect x="${x}" y="0" width="${whiteWidth * 0.6}" height="${height * 0.6}"
                          fill="${isActive ? "#ffbb33" : "#000"}" stroke="#333"/>
                    <text x="${x + whiteWidth * 0.3}" y="${height * 0.4}" text-anchor="middle"
                          font-size="10" fill="${isActive ? "#000" : "#fff"}">${NOTE_NAMES[semi]}</text>
                </g>
            `);
    });

    svgParts.push(`</svg>`);

    const qualitySuffix = this.context && this.context.quality ? ` (${this.context.quality})` : "";
    const ctxLabel = this.context
      ? this.context.type === "chord"
        ? `<div>Key of ${this.context.tonic}, Triad degree ${this.context.degree} (${this.context.modeName || ""})${qualitySuffix}</div>`
        : `<div>Key of ${this.context.tonic}, Mode: ${this.context.modeName || this.context.degree}${qualitySuffix}</div>`
      : "";

    this.shadowRoot.innerHTML = `
            <style>
                :host {
                    display: block;
                    min-height: 120px;
                }
                svg {
                    background: #222;
                }
                text {
                    font-family: system-ui, sans-serif;
                }
                div {
                    color: #ddd;
                    font-family: system-ui, sans-serif;
                    margin-bottom: 0.5rem;
                }
            </style>
            ${ctxLabel}
            ${svgParts.join("")}
        `;

    // LLM NOTE:
    // Click handling mirrors the fretboard: when a key is clicked, we emit a
    // "piano-key-click" custom event with the normalized note name so that the
    // controller (main.js) can update the note-panel and trigger fret flashes.
    if (!this._clickHandlerAttached) {
      this._clickHandlerAttached = true;
      this.shadowRoot.addEventListener("click", (evt) => {
        const target = evt.target;
        if (!target) return;
        const group = target.closest("g[data-note]");
        if (!group) return;
        const noteName = group.getAttribute("data-note");
        if (!noteName) return;

        this.dispatchEvent(
          new CustomEvent("piano-key-click", {
            detail: { note: noteName },
            bubbles: true,
            composed: true
          })
        );
      });
    }
  }
}

customElements.define("piano-keyboard", PianoKeyboard);
