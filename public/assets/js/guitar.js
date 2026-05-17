class GuitarFretboard extends HTMLElement {
  static get observedAttributes() { return ["frets"]; }

  constructor() {
    super();
    this.attachShadow({ mode: "open" });

    this.strings = 6;
    this.frets = parseInt(this.getAttribute("frets"), 10) || 12;

    this.viewMode = "mode";
    this.currentTonic = "G";

    this.highlighted = new Set();
    this.ghost = new Set();

    this.activePerString = new Map();
    this.wrongIndicators = new Map();
    for (let s = 1; s <= this.strings; s++) {
      this.activePerString.set(s, new Set());
      this.wrongIndicators.set(s, new Set());
    }

    this.tempFlashNotes = new Set();
    this.tempFlashPitches = new Set();

    // Absolute scaleMap: the "dual-layer" reference
    this.scaleMap = {
      6: {0:"E",1:"F",2:"F#",3:"G",4:"G#",5:"A",6:"A#",7:"B",8:"C",9:"C#",10:"D",11:"D#",12:"E"},
      5: {0:"A",1:"A#",2:"B",3:"C",4:"C#",5:"D",6:"D#",7:"E",8:"F",9:"F#",10:"G",11:"G#",12:"A"},
      4: {0:"D",1:"D#",2:"E",3:"F",4:"F#",5:"G",6:"G#",7:"A",8:"A#",9:"B",10:"C",11:"C#",12:"D"},
      3: {0:"G",1:"G#",2:"A",3:"A#",4:"B",5:"C",6:"C#",7:"D",8:"D#",9:"E",10:"F",11:"F#",12:"G"},
      2: {0:"B",1:"C",2:"C#",3:"D",4:"D#",5:"E",6:"F",7:"F#",8:"G",9:"G#",10:"A",11:"A#",12:"B"},
      1: {0:"E",1:"F",2:"F#",3:"G",4:"G#",5:"A",6:"A#",7:"B",8:"C",9:"C#",10:"D",11:"D#",12:"E"}
    };

    // Piano key layout
    this.pianoKeys = [
      { note: "C", type: "white" }, { note: "C#", type: "black" },
      { note: "D", type: "white" }, { note: "D#", type: "black" },
      { note: "E", type: "white" },
      { note: "F", type: "white" }, { note: "F#", type: "black" },
      { note: "G", type: "white" }, { note: "G#", type: "black" },
      { note: "A", type: "white" }, { note: "A#", type: "black" },
      { note: "B", type: "white" }
    ];

    this.updateHighlightedForMode();
    this.render();
    this.emitNoteChange();
  }

  setViewMode(mode) {
    this.viewMode = mode;
    if (mode === "chord") this.updateHighlightedForChord();
    else this.updateHighlightedForMode();

    this.activePerString.forEach(set => set.clear());
    this.render();
    this.emitNoteChange();
  }

  setTonic(note) {
    this.currentTonic = note;
    if (this.viewMode === "chord") this.updateHighlightedForChord();
    else this.updateHighlightedForMode();

    this.activePerString.forEach(set => set.clear());
    this.render();
    this.emitNoteChange();
  }

  updateHighlightedForMode() {
    const majorScaleIntervals = [0,2,4,5,7,9,11];
    const chromatic = ["C","C#","D","D#","E","F","F#","G","G#","A","A#","B"];
    const tonicIndex = chromatic.indexOf(this.currentTonic);
    const scaleNotes = majorScaleIntervals.map(i => chromatic[(tonicIndex + i) % 12]);

    this.highlighted.clear();
    for (let s = 1; s <= this.strings; s++) {
      for (let f = 0; f <= this.frets; f++) {
        if (scaleNotes.includes(this.scaleMap[s]?.[f])) this.highlighted.add(`${s}-${f}`);
      }
    }
  }

  updateHighlightedForChord() {
    const chromatic = ["C","C#","D","D#","E","F","F#","G","G#","A","A#","B"];
    const tonicIndex = chromatic.indexOf(this.currentTonic);
    const chordNotes = [
      chromatic[tonicIndex],
      chromatic[(tonicIndex + 4) % 12],
      chromatic[(tonicIndex + 7) % 12]
    ];

    this.highlighted.clear();
    for (let s = 1; s <= this.strings; s++) {
      for (let f = 0; f <= this.frets; f++) {
        if (chordNotes.includes(this.scaleMap[s]?.[f])) this.highlighted.add(`${s}-${f}`);
      }
    }
  }

  attributeChangedCallback(name, oldValue, newValue) {
    if (name === "frets" && oldValue !== newValue) {
      const parsed = parseInt(newValue, 10);
      this.frets = Number.isFinite(parsed) ? parsed : 12;
      this.render();
      this.emitNoteChange();
    }
  }

  emitNoteChange() {
    const active = {};
    for (let s = 1; s <= this.strings; s++) {
      active[s] = [...this.activePerString.get(s)].sort((a,b)=>a-b);
    }

    this.dispatchEvent(new CustomEvent("notechange", {
      detail: { activePerString: active, scaleMap: this.scaleMap, strings: this.strings },
      bubbles: true, composed: true
    }));
  }

  render() {
    const width = 720;
    const fretboardHeight = 180;
    const pianoHeight = 140;
    const verticalGap = 24;
    const stringSpacing = fretboardHeight / (this.strings + 1);
    const fretSpacing = width / (this.frets + 1);
    const svgNS = "http://www.w3.org/2000/svg";

    this.shadowRoot.innerHTML = `<style>:host{display:inline-block} svg{user-select:none}</style>`;

    // Fretboard
    const fretboard = document.createElementNS(svgNS, "svg");
    fretboard.setAttribute("viewBox", `0 0 ${width} ${fretboardHeight}`);
    fretboard.setAttribute("width", width);
    fretboard.setAttribute("height", fretboardHeight);

    for (let s = 0; s < this.strings; s++) {
      const y = stringSpacing * (s + 1);
      const line = document.createElementNS(svgNS, "line");
      line.setAttribute("x1", 0);
      line.setAttribute("y1", y);
      line.setAttribute("x2", width);
      line.setAttribute("y2", y);
      line.setAttribute("stroke", "black");
      line.setAttribute("stroke-width", 2);
      fretboard.appendChild(line);
    }

    for (let f = 0; f <= this.frets; f++) {
      const x = fretSpacing * (f + 1);
      const line = document.createElementNS(svgNS, "line");
      line.setAttribute("x1", x);
      line.setAttribute("y1", stringSpacing);
      line.setAttribute("x2", x);
      line.setAttribute("y2", fretboardHeight - stringSpacing);
      line.setAttribute("stroke", f===0?"black":"#888");
      line.setAttribute("stroke-width", f===0?4:2);
      fretboard.appendChild(line);
    }

    for (let s = 0; s < this.strings; s++) {
      for (let f = 0; f <= this.frets; f++) {
        const key = `${s+1}-${f}`;
        const cx = fretSpacing * (f + 0.5);
        const cy = stringSpacing * (s + 1);
        const circle = document.createElementNS(svgNS, "circle");
        circle.setAttribute("cx", cx);
        circle.setAttribute("cy", cy);
        circle.setAttribute("r", 8);
        circle.setAttribute("stroke", "black");
        circle.style.cursor = "pointer";

        const activeSet = this.activePerString.get(s+1);
        const wrongSet = this.wrongIndicators.get(s+1);

        if (this.tempFlashNotes.has(key)) circle.setAttribute("fill", "orange");
        else if (activeSet.has(f)) circle.setAttribute("fill", "red");
        else if (wrongSet.has(f)) circle.setAttribute("fill", "grey");
        else if (this.highlighted.has(key)) circle.setAttribute("fill", "rgba(0,0,0,0.2)");
        else circle.setAttribute("fill", "transparent");

        circle.addEventListener("click", () => {
          if (!this.highlighted.has(key)) {
            wrongSet.add(f);
            this.render();
            setTimeout(()=>{ wrongSet.delete(f); this.render(); this.emitNoteChange(); }, 1500);
            return;
          }

          const note = this.scaleMap[s+1]?.[f];
          if(!note) return;

          activeSet.has(f)?activeSet.delete(f):activeSet.add(f);

          this.flashMatchingNotes(note);
          this.render();
          this.emitNoteChange();
        });

        fretboard.appendChild(circle);
      }
    }

    this.shadowRoot.appendChild(fretboard);

    const spacer = document.createElement("div");
    spacer.style.height = verticalGap+"px";
    this.shadowRoot.appendChild(spacer);

    // Piano
    this.shadowRoot.appendChild(this.renderPiano(svgNS, width, pianoHeight));
  }

  renderPiano(svgNS, width, height) {
    const piano = document.createElementNS(svgNS,"svg");
    piano.setAttribute("viewBox", `0 0 ${width} ${height}`);
    piano.setAttribute("width", width);
    piano.setAttribute("height", height);

    const whiteKeyWidth = width / 7;
    let whiteIndex = 0;

    // White keys
    this.pianoKeys.forEach(k=>{
      if(k.type!=="white") return;
      const x = whiteIndex*whiteKeyWidth;
      const rect = document.createElementNS(svgNS,"rect");
      rect.setAttribute("x",x);
      rect.setAttribute("y",0);
      rect.setAttribute("width",whiteKeyWidth);
      rect.setAttribute("height",height);
      rect.setAttribute("stroke","black");
      rect.setAttribute("fill",this.tempFlashPitches.has(k.note)?"orange":"white");
      piano.appendChild(rect);

      const label = document.createElementNS(svgNS,"text");
      label.setAttribute("x",x+whiteKeyWidth/2);
      label.setAttribute("y",height-12);
      label.setAttribute("text-anchor","middle");
      label.setAttribute("font-size","14");
      label.textContent = k.note;
      piano.appendChild(label);

      whiteIndex++;
    });

    // Black keys
    const blackKeyWidth = whiteKeyWidth*0.6;
    const blackKeyHeight = height*0.65;
    const blackOffsets = {"C#":0.7,"D#":1.7,"F#":3.7,"G#":4.7,"A#":5.7};

    this.pianoKeys.forEach(k=>{
      if(k.type!=="black") return;
      const x = blackOffsets[k.note]*whiteKeyWidth - blackKeyWidth/2;
      const rect = document.createElementNS(svgNS,"rect");
      rect.setAttribute("x",x);
      rect.setAttribute("y",0);
      rect.setAttribute("width",blackKeyWidth);
      rect.setAttribute("height",blackKeyHeight);
      rect.setAttribute("fill",this.tempFlashPitches.has(k.note)?"orange":"black");
      piano.appendChild(rect);

      const label = document.createElementNS(svgNS,"text");
      label.setAttribute("x",x+blackKeyWidth/2);
      label.setAttribute("y",blackKeyHeight-8);
      label.setAttribute("text-anchor","middle");
      label.setAttribute("font-size","10");
      label.setAttribute("fill","white");
      label.textContent = k.note;
      piano.appendChild(label);
    });

    return piano;
  }

  flashMatchingNotes(note) {
    this.tempFlashNotes.clear();
    this.tempFlashPitches.clear();
    this.tempFlashPitches.add(note);

    for(let s=1;s<=this.strings;s++){
      for(let f=0;f<=this.frets;f++){
        if(this.scaleMap[s]?.[f]===note) this.tempFlashNotes.add(`${s}-${f}`);
      }
    }

    this.render();
    setTimeout(()=>{
      this.tempFlashNotes.clear();
      this.tempFlashPitches.clear();
      this.render();
    },500);
  }
}

customElements.define("guitar-fretboard", GuitarFretboard);

// Note Panel Hook
window.addEventListener("notechange",(e)=>{
  const { activePerString, scaleMap, strings } = e.detail||{};
  if(!activePerString || !scaleMap) return;

  const out = [];
  for(let s=strings;s>=1;s--){
    const frets = activePerString[s]||[];
    const notes = frets.map(f=>scaleMap[s]?.[f]||"-");
    out.push(`${s}  ${notes.join(", ")}`);
  }

  const target = document.getElementById("note-panel-content");
  if(target) target.innerHTML = out.join("<br>");
});