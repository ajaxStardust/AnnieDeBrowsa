// --- Constants ---
const SHARP_NOTES = ['C','C♯','D','D♯','E','F','F♯','G','G♯','A','A♯','B'];
const FLAT_NOTES  = ['C','D♭','D','E♭','E','F','G♭','G','A♭','A','B♭','B'];
let USE_FLATS = false;

const STRINGS = ['E','B','G','D','A','E'].reverse();
const FRETS = 12;

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
function toFlat(note) { const idx = SHARP_NOTES.indexOf(note); return FLAT_NOTES[idx]||note; }

// --- Web Component ---
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
    const fretGap = 30, stringGap = 24, nutWidth = 6;
    const svgWidth = this.frets*fretGap + nutWidth;
    const svgHeight = this.strings.length*stringGap + 40;
    const svg = document.createElementNS(this.svgNS,'svg');
    svg.setAttribute('width',svgWidth);
    svg.setAttribute('height',svgHeight);

    // nut
    const nut = document.createElementNS(this.svgNS,'rect');
    nut.setAttribute('x',0); nut.setAttribute('y',5);
    nut.setAttribute('width',nutWidth); nut.setAttribute('height',this.strings.length*stringGap);
    nut.setAttribute('fill','#333'); svg.appendChild(nut);

    // strings & circles
    for(let s=0;s<this.strings.length;s++){
      const y = 5+s*stringGap;
      const line = document.createElementNS(this.svgNS,'line');
      line.setAttribute('x1',nutWidth); line.setAttribute('y1',y);
      line.setAttribute('x2',this.frets*fretGap+nutWidth); line.setAttribute('y2',y);
      line.setAttribute('stroke','#000'); line.setAttribute('stroke-width',1.5);
      svg.appendChild(line);

      let openIdx = SHARP_NOTES.indexOf(this.strings[s]);
      for(let f=0;f<this.frets;f++){
        const note = SHARP_NOTES[(openIdx+f)%12];
        const circle = document.createElementNS(this.svgNS,'circle');
        circle.setAttribute('cx',f*fretGap+fretGap/2+nutWidth);
        circle.setAttribute('cy',y); circle.setAttribute('r',10);
        circle.setAttribute('fill','white'); circle.setAttribute('stroke','#000');
        circle.dataset.note = note;
        svg.appendChild(circle);
      }
    }
    this.shadowRoot.innerHTML=''; this.shadowRoot.appendChild(svg);
  }
  updateHighlights(notes){
    const svg = this.shadowRoot.querySelector('svg');
    svg.querySelectorAll('circle').forEach(c=>{
      const note = USE_FLATS?toFlat(c.dataset.note):c.dataset.note;
      c.setAttribute('fill',notes.includes(note)?'gold':'white');
    });
  }
}
customElements.define('guitar-fretboard',GuitarFretboard);

// --- UI ---
const fretboard = document.querySelector('guitar-fretboard');
const parentSelect = document.getElementById('parent-key-select');
const modeSelect = document.getElementById('mode-select');
const viewToggle = document.getElementById('view-toggle');
const viewLabel = document.getElementById('view-label');
const tonicRadiosContainer = document.getElementById('tonic-radios');

const MODES = Object.keys(MODE_INTERVALS);
const KEYS = SHARP_NOTES.slice();

let currentTonic = 'G';
let currentDegree = 1;
let currentMode = 'Ionian';

// --- Render Tonic Dropdown ---
KEYS.forEach(k=>{
  const opt = document.createElement('option'); opt.value=k; opt.textContent=k;
  if(k===currentTonic) opt.selected=true;
  parentSelect.appendChild(opt);
});
parentSelect.addEventListener('change',()=>{currentTonic=parentSelect.value; renderDegreeRadios(); updateHighlights();});

// --- Mode Dropdown ---
MODES.forEach(m=>{
  const opt = document.createElement('option'); opt.value=m; opt.textContent=m;
  if(m===currentMode) opt.selected=true;
  modeSelect.appendChild(opt);
});
modeSelect.addEventListener('change',()=>{currentMode=modeSelect.value; updateHighlights();});

// --- View Toggle ---
viewToggle.addEventListener('change',()=>{
  viewLabel.textContent = viewToggle.checked?'Chord':'Mode';
  updateHighlights();
});

// --- Degree Radios ---
function renderDegreeRadios(){
  tonicRadiosContainer.innerHTML='';
  for(let i=1;i<=7;i++){
    const label = document.createElement('label');
    const input = document.createElement('input'); input.type='radio'; input.name='degree'; input.value=i;
    if(i===currentDegree) input.checked=true;
    input.addEventListener('change',()=>{currentDegree=i; updateHighlights();});
    label.appendChild(input); label.appendChild(document.createTextNode(i));
    tonicRadiosContainer.appendChild(label);
  }
}
renderDegreeRadios();

// --- Open Strings Helper ---
function renderOpenNotes(){
  const stringNames = document.getElementById('string-names');
  stringNames.innerHTML=''; STRINGS.forEach(n=>{
    const d=document.createElement('div'); d.textContent=USE_FLATS?toFlat(n):n; stringNames.appendChild(d);
  });
}

// --- Compute Highlight Notes ---
function getHighlightNotes(){
  const tonicIdx = SHARP_NOTES.indexOf(currentTonic);
  const intervals = MODE_INTERVALS[currentMode];
  const keyNotes = intervals.map(i=>SHARP_NOTES[(tonicIdx+i)%12]);
  return viewToggle.checked ? [keyNotes[currentDegree-1]] : keyNotes;
}

// --- Update Highlights ---
function updateHighlights(){
  renderOpenNotes();
  fretboard.updateHighlights(getHighlightNotes());
}

// --- Init ---
updateHighlights();
