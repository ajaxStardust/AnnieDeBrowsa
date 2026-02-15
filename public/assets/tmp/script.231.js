// --- Constants ---
const SHARP_NOTES = ['C','C♯','D','D♯','E','F','F♯','G','G♯','A','A♯','B'];
const FLAT_NOTES  = ['C','D♭','D','E♭','E','F','G♭','G','A♭','A','B♭','B'];
let USE_FLATS = false;

const STRINGS = ['E','B','G','D','A','E'].reverse();
const FRETS = 12;

// Mode intervals (Ionian reference)
const MODE_INTERVALS = {
  Ionian:     [0,2,4,5,7,9,11],
  Dorian:     [0,2,3,5,7,9,10],
  Phrygian:   [0,1,3,5,7,8,10],
  Lydian:     [0,2,4,6,7,9,11],
  Mixolydian: [0,2,4,5,7,9,10],
  Aeolian:    [0,2,3,5,7,8,10],
  Locrian:    [0,1,3,5,6,8,10]
};

// --- Helper ---
function toFlat(note) {
  const idx = SHARP_NOTES.indexOf(note);
  return FLAT_NOTES[idx] || note;
}

// --- Render Open Strings ---
const openNotesDiv = document.getElementById('open-notes');
function renderOpenNotes() {
  openNotesDiv.innerHTML = '';
  STRINGS.forEach(n=>{
    const d = document.createElement('div');
    d.textContent = USE_FLATS ? toFlat(n) : n;
    openNotesDiv.appendChild(d);
  });
}

// --- Guitar Fretboard Web Component ---
class GuitarFretboard extends HTMLElement {
  constructor() {
    super();
    this.attachShadow({mode:'open'});
    this.strings = STRINGS;
    this.frets = FRETS;
    this.svgNS = "http://www.w3.org/2000/svg";
    this.render();
  }

  render() {
    const fretGap = 30;
    const stringGap = 24;
    const nutWidth = 6;

    const svgWidth = this.frets*fretGap + nutWidth;
    const svgHeight = this.strings.length*stringGap + 40;
    const svg = document.createElementNS(this.svgNS,'svg');
    svg.setAttribute('width', svgWidth);
    svg.setAttribute('height', svgHeight);

    // draw nut
    const nut = document.createElementNS(this.svgNS,'rect');
    nut.setAttribute('x',0);
    nut.setAttribute('y',5);
    nut.setAttribute('width', nutWidth);
    nut.setAttribute('height', this.strings.length*stringGap);
    nut.setAttribute('fill','#333');
    svg.appendChild(nut);

    // draw strings
    for(let s=0;s<this.strings.length;s++){
      const y = 5 + s*stringGap;
      const line = document.createElementNS(this.svgNS,'line');
      line.setAttribute('x1', nutWidth);
      line.setAttribute('y1', y);
      line.setAttribute('x2', this.frets*fretGap + nutWidth);
      line.setAttribute('y2', y);
      line.setAttribute('stroke','#000');
      line.setAttribute('stroke-width',1.5);
      svg.appendChild(line);

      let openIdx = SHARP_NOTES.indexOf(this.strings[s]);
      for(let f=0; f<this.frets; f++){
        const note = SHARP_NOTES[(openIdx+f)%12];
        const circle = document.createElementNS(this.svgNS,'circle');
        circle.setAttribute('cx', f*fretGap + fretGap/2 + nutWidth);
        circle.setAttribute('cy', y);
        circle.setAttribute('r', 10);
        circle.setAttribute('fill','white');
        circle.setAttribute('stroke','#000');
        circle.dataset.note = note;
        svg.appendChild(circle);
      }
    }

    this.shadowRoot.innerHTML = '';
    this.shadowRoot.appendChild(svg);
  }

  updateHighlights(allowedNotes) {
    const svg = this.shadowRoot.querySelector('svg');
    svg.querySelectorAll('circle').forEach(c=>{
      const note = USE_FLATS ? toFlat(c.dataset.note) : c.dataset.note;
      c.setAttribute('fill', allowedNotes.includes(note)? 'gold' : 'white');
    });
  }
}

customElements.define('guitar-fretboard', GuitarFretboard);

// --- UI Logic ---
const fretboard = document.querySelector('guitar-fretboard');
const tonicDropdownWrapper = document.getElementById('tonic-selector');
const accidentalToggle = document.getElementById('accidental-toggle');
const modeChordToggle = document.getElementById('mode-chord-toggle');
const modeChordLabel = document.getElementById('mode-chord-label');

const MODES = Object.keys(MODE_INTERVALS);
const PARENT_KEYS = SHARP_NOTES.slice(); // all 12 keys

let currentTonic = 'G';
let currentDegree = 1; // radio button
let currentMode = 'Ionian';

// --- Render Tonic Dropdown ---
function renderTonicDropdown(key=currentTonic) {
  tonicDropdownWrapper.innerHTML = '';
  const strong = document.createElement('strong');
  strong.textContent = 'Tonic:';
  tonicDropdownWrapper.appendChild(strong);

  PARENT_KEYS.forEach(n=>{
    const label = document.createElement('label');
    const input = document.createElement('input');
    input.type='radio';
    input.name='tonic';
    input.value=n;
    if(n===key) input.checked=true;
    input.addEventListener('change', ()=>{
      currentTonic = n;
      updateHighlights();
    });
    label.appendChild(input);
    label.appendChild(document.createTextNode(n));
    tonicDropdownWrapper.appendChild(label);
  });
}

// --- Render Degree Radio Buttons ---
function renderDegreeRadios() {
  const degreeWrapper = document.createElement('div');
  degreeWrapper.id='degree-wrapper';
  const strong = document.createElement('strong');
  strong.textContent = 'Scale Degree:';
  degreeWrapper.appendChild(strong);

  for(let i=1;i<=7;i++){
    const label = document.createElement('label');
    const input = document.createElement('input');
    input.type='radio';
    input.name='degree';
    input.value=i;
    if(i===currentDegree) input.checked=true;
    input.addEventListener('change', ()=>{
      currentDegree = parseInt(input.value);
      updateHighlights();
    });
    label.appendChild(input);
    label.appendChild(document.createTextNode(i));
    degreeWrapper.appendChild(label);
  }
  tonicDropdownWrapper.parentNode.insertBefore(degreeWrapper, tonicDropdownWrapper.nextSibling);
}

// --- Render Mode Dropdown ---
function renderModeDropdown() {
  const modeWrapper = document.createElement('div');
  modeWrapper.id='mode-wrapper';
  const label = document.createElement('label');
  label.textContent = 'Mode:';
  const select = document.createElement('select');
  MODES.forEach(m=>{
    const opt = document.createElement('option');
    opt.value=m;
    opt.textContent=m;
    if(m===currentMode) opt.selected=true;
    select.appendChild(opt);
  });
  select.addEventListener('change', ()=>{
    currentMode = select.value;
    updateHighlights();
  });
  modeWrapper.appendChild(label);
  modeWrapper.appendChild(select);
  tonicDropdownWrapper.parentNode.insertBefore(modeWrapper, tonicDropdownWrapper.nextSibling);
}

// --- Compute Notes for Highlights ---
function getNotesForHighlight() {
  const tonicIdx = SHARP_NOTES.indexOf(currentTonic);
  const intervals = MODE_INTERVALS[currentMode];
  const keyNotes = intervals.map(i => SHARP_NOTES[(tonicIdx+i)%12]);
  // If chord view is selected, highlight only the degree note
  if(modeChordToggle.checked){
    return [keyNotes[currentDegree-1]];
  }
  // If mode view, highlight all notes in mode
  return keyNotes;
}

// --- Update Highlights ---
function updateHighlights() {
  renderOpenNotes();
  const highlightNotes = getNotesForHighlight();
  fretboard.updateHighlights(highlightNotes);
}

// --- Event Listeners ---
accidentalToggle.addEventListener('change', ()=>{
  USE_FLATS = accidentalToggle.checked;
  updateHighlights();
});

modeChordToggle.addEventListener('change', ()=>{
  modeChordLabel.textContent = modeChordToggle.checked?'Chord':'Mode';
  updateHighlights();
});

// --- Init ---
renderTonicDropdown();
renderDegreeRadios();
renderModeDropdown();
updateHighlights();
