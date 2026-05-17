// assets/js/chord-selector.js

export class ChordSelector extends HTMLElement {
  constructor() {
    super();
    this.attachShadow({ mode: "open" });
  }

  connectedCallback() {
    this.render();
  }

  render() {
    const style = `
      :host {
        display: flex;
        gap: 1rem;
        align-items: center;
        font-family: system-ui, sans-serif;
      }
      label {
        font-weight: bold;
      }
      select {
        padding: 4px 6px;
        font-size: 1rem;
      }
    `;

    const tonicOptions = ["C", "C#", "D", "D#", "E", "F", "F#", "G", "G#", "A", "A#", "B"]
      .map(n => `<option value="${n}">${n}</option>`)
      .join("");

    const modeOptions = `
      <option value="scale">Major Scale (Ionian)</option>
      <option value="chord">Major Triad</option>
      <option value="ionian">Ionian</option>
      <option value="dorian">Dorian</option>
      <option value="phrygian">Phrygian</option>
      <option value="lydian">Lydian</option>
      <option value="mixolydian">Mixolydian</option>
      <option value="aeolian">Aeolian</option>
      <option value="locrian">Locrian</option>
    `;

    this.shadowRoot.innerHTML = `
      <style>${style}</style>

      <label>Tonic:</label>
      <select id="tonic">${tonicOptions}</select>

      <label>View:</label>
      <select id="mode">${modeOptions}</select>
    `;

    const tonicSel = this.shadowRoot.getElementById("tonic");
    const modeSel = this.shadowRoot.getElementById("mode");

    const emit = () => {
      this.dispatchEvent(
        new CustomEvent("chordselection", {
          detail: {
            tonic: tonicSel.value,
            viewMode: modeSel.value
          },
          bubbles: true,
          composed: true
        })
      );
    };

    tonicSel.addEventListener("change", emit);
    modeSel.addEventListener("change", emit);
  }
}

customElements.define("chord-selector", ChordSelector);
