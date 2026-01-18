// --- Constants ---
const SHARP_NOTES = ['C','C♯','D','D♯','E','F','F♯','G','G♯','A','A♯','B'];
const FLAT_NOTES  = ['C','D♭','D','E♭','E','F','G♭','G','A♭','A','B♭','B'];
let USE_FLATS = false;

const STRINGS = ['E','B','G','D','A','E'].reverse(); 
const FRETS = 12;

// Modes
const MODE_INTERVALS = {
  Ionian:     [0,2,4,5,7,9,11],
  Dorian:     [0,2,3,5,7,9,10],
  Phrygian:   [0,1,3,5,7,8,10],
  Lydian:     [0,2,4,6,7,9,11],
  Mixolydian: [0,2,4,5,7,9,10],
  Aeolian:    [0,2,3,5,7,8,10],
  Locrian:    [0,1,3,5,6,8,10]
};

// --- Elements ---
const parentKeySelect = document.getElementById('parent-key-select');
const modeSelect = document.getElementById('mode-select');
const tonicContainer = document.getElementById('tonic-radios');
const viewToggle = document.getElementById('view-toggle');
const viewLabel = document.getElementById('view-label');

const fretboardSVG = document.getElementById('fretboard');
const stringNamesDiv = document.getElementById('string-names');

// --- Helper Functions ---
function toFlat(note){
  const index = SHARP_NOTES.indexOf(note);
  return FLAT_NOTES[index] || note;
}

// Generate scale notes given tonic and mode
function generateScaleNotes(tonic, mode){
  const tonicIndex = SHARP_NOTES.indexOf(tonic);
  const intervals = MODE_INTERVALS[mode];
  return intervals.map(i=>{
    const note = SHARP_NOTES[(tonicIndex + i)%12];
    return USE_FLATS ? toFlat(note) : note;
  });
}

// --- Populate Tonic Radios based on Parent Key ---
function renderTonicRadios(){
  tonicContainer.innerHTML = '';
  const parentKey = parentKeySelect.value;
  const scaleNotes = generateScaleNotes(parentKey, modeSelect.value);
  scaleNotes.forEach((note, idx)=>{
    const label = document.createElement('label');
    label.innerHTML = `<input type="radio" name="tonic-radio" value="${note}" ${idx===0?'checked':''}>${note}`;
    tonicContainer.appendChild(label);
  });
}

// --- Render string names (left of nut) ---
function renderStringNames(){
  stringNamesDiv.innerHTML = '';
  STRINGS.forEach(note=>{
    const div = document.createElement('div');
    div.textContent = note;
    stringNamesDiv.appendChild(div);
  });
}

// --- Render fretboard ---
function renderFretboard(){
  fretboardSVG.innerHTML = '';
  const svgNS = "http://www.w3.org/2000/svg";
  const fretGap = 40;
  const stringGap = 24;
  const bottomPadding = 40;
  const svgHeight = STRINGS.length*stringGap + bottomPadding;
  fretboardSVG.setAttribute('width', FRETS*fretGap);
  fretboardSVG.setAttribute('height', svgHeight);

  for(let s=0;s<STRINGS.length;s++){
    const y=10+s*stringGap;
    // String line
    const line=document.createElementNS(svgNS,'line');
    line.setAttribute('x1',0); line.setAttribute('y1',y);
    line.setAttribute('x2',FRETS*fretGap); line.setAttribute('y2',y);
    line.setAttribute('stroke','#000'); line.setAttribute('stroke-width',1.5);
    fretboardSVG.appendChild(line);

    let openIndex = SHARP_NOTES.indexOf(STRINGS[s]);
    for(let f=0; f<FRETS; f++){
      const note = SHARP_NOTES[(openIndex+f)%12];
      const circle=document.createElementNS(svgNS,'circle');
      circle.setAttribute('cx', f*fretGap + fretGap/2);
      circle.setAttribute('cy', y);
      circle.setAttribute('r', 10);
      circle.setAttribute('fill','white');
      circle.setAttribute('stroke','#000');
      circle.dataset.note = USE_FLATS ? toFlat(note) : note;
      fretboardSVG.appendChild(circle);
    }
  }

  // Fret numbers (starts at 1; nut is visual only, not numbered)
  const markerFrets=[1,3,5,7,9,12];
  const markerY = 10 + (STRINGS.length-1)*stringGap + 24;
  markerFrets.forEach(f=>{
    const text=document.createElementNS(svgNS,'text');
    text.setAttribute('x', f*fretGap + fretGap/2 );
    text.setAttribute('y', markerY);
    text.setAttribute('text-anchor','middle');
    text.setAttribute('font-size','14');
    text.setAttribute('fill','#000');
    text.textContent=f;
    fretboardSVG.appendChild(text);
  });
}

// --- Highlight notes based on selected mode/radio ---
function updateHighlights(){
  const selectedParent = parentKeySelect.value;
  const selectedMode = modeSelect.value;
  const scaleNotes = generateScaleNotes(selectedParent, selectedMode);

  const tonicRadios = document.querySelectorAll('input[name="tonic-radio"]');
  const selectedDegree = Array.from(tonicRadios).find(r=>r.checked)?.value;

  const circles = fretboardSVG.querySelectorAll('circle');
  circles.forEach(c=>{
    const note = c.dataset.note;
    if(viewToggle.checked){ // Chord view
      c.setAttribute('fill', note === selectedDegree ? 'gold' : 'white');
    } else { // Mode view
      c.setAttribute('fill', scaleNotes.includes(note) ? 'lightblue' : 'white');
    }
  });
}

// --- Event Listeners ---
parentKeySelect.addEventListener('change',()=>{
  renderTonicRadios();
  renderStringNames();
  renderFretboard();
  updateHighlights();
});

modeSelect.addEventListener('change', updateHighlights);
viewToggle.addEventListener('change', ()=>{
  viewLabel.textContent = viewToggle.checked ? 'Chord' : 'Mode';
  updateHighlights();
});
tonicContainer.addEventListener('change', updateHighlights);

// --- Initialize ---
renderTonicRadios();
renderStringNames();
renderFretboard();
updateHighlights();
