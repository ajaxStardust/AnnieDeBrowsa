// note-panel.js
// LLM-ORIENTED NOTE:
// This panel is for STUDENT-FACING, DEGREE-FIRST info, not raw engine debug.
// Keep the display focused on degrees + note names. Semitone math lives in
// music-theory.js and the visual components, not here.

export class NotePanel extends HTMLElement {
  constructor() {
    super();
    this.attachShadow({ mode: "open" });
    this.answerKey = [];
    this.context = null;
    this.activeNote = null; // LLM NOTE: optional highlight for a clicked note.
  }

  setAnswerKey(answerKey, context) {
    this.answerKey = answerKey || [];
    this.context = context || null;
    this.render();
  }

  // LLM-ORIENTED NOTE:
  // This is an OPTIONAL, student-facing enhancement used when a fret is
  // clicked. It does NOT change the answerKey; it only highlights the row
  // whose note name matches the clicked note.
  setActiveNote(note) {
    this.activeNote = note || null;
    this.render();
  }

  render() {
    const rows = this.answerKey.map(n => {
      const isActive = this.activeNote && this.activeNote === n.note;
      const cls = isActive ? "active-row" : "";
      return `<tr class="${cls}">
                <td>${n.degree}</td>
                <td>${n.note}</td>
              </tr>`;
    }).join("");

    const qualitySuffix = this.context && this.context.quality ? ` (${this.context.quality})` : "";
    const ctxLabel = this.context
      ? this.context.type === "chord"
        ? `Key of ${this.context.tonic}, Triad degree ${this.context.degree} (${this.context.modeName || ""})${qualitySuffix}`
        : `Key of ${this.context.tonic}, Mode: ${this.context.modeName || this.context.degree}${qualitySuffix}`
      : "No context";

    this.shadowRoot.innerHTML = `
            <style>
                :host {
                    display: block;
                    font-family: system-ui, sans-serif;
                    color: #222;              /* dark text on light card from outer CSS */
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 0.5rem;
                    background: #ffffff;      /* ensure strong contrast */
                }
                th, td {
                    border: 1px solid #ccc;
                    padding: 0.35rem 0.6rem;
                    text-align: center;
                    font-size: 0.9rem;
                }
                th {
                    background: #333;
                    color: #f5f5f5;
                    font-weight: 600;
                }
                tbody tr:nth-child(even):not(.active-row) {
                    background: #f5f5f5;
                }
                .active-row {
                    background: #0074D9;     /* distinct highlight (blue) */
                    color: #ffffff;
                    font-weight: 600;
                }
            </style>
            <div>${ctxLabel}</div>
            <table>
                <thead>
                    <tr>
                        <th>Degree</th>
                        <th>Note</th>
                    </tr>
                </thead>
                <tbody>
                    ${rows}
                </tbody>
            </table>
        `;
  }
}

customElements.define("note-panel", NotePanel);
