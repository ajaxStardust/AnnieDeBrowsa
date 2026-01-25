const SHARP_NOTES = ['C','C#','D','D#','E','F','F#','G','G#','A','A#','B'];
const FLAT_NOTES  = ['C','Db','D','Eb','E','F','Gb','G','Ab','A','Bb','B'];
const STRINGS = ['E','B','G','D','A','E'].reverse();
const FRETS = 12;

let USE_FLATS = false;

// --- Elements ---
const parentKeySelect = document.getElementById('parent-key-select');
const modeSelect = document.getElementById('mode-select');
const viewToggle = document.getElementById('view-toggle');
const viewLabel = document.getElementById('view-label');
const tonicRadiosDiv = document.getElementById('tonic-radios');
const fretboardSvg = document.getElementById('fretboard');
const stringNamesDiv = document.getElementById('string-names');

// --- Helper Functions ---
function toFlat(note) {
  const index = SHARP_NOTES.indexOf(note);
  return FLAT_NOTES[index] || note;
}

// --- Render String Names (Nut area) ---
function renderStringNames() {
  stringNamesDiv.innerHTML = '';
  STRINGS.forEach(s => {
    const div = document.createElement('div');
    div.textContent = s;
    stringNamesDiv.appendChild(div);
  });
}

// --- Generate tonic scale based on whole/half steps (Ionian) ---
function generateScale(root) {
  const W = 2, H = 1;
  const intervals = [W, W, H, W, W, W, H];
  let scale = [root];
  let idx = SHARP_NOTES.indexOf(root);
  intervals.forEach(step => {
    idx = (idx + step) % 12;
    scale.push(SHARP_NOTES[idx]);
  });
  return scale;
}

// --- Render Tonic Radios ---
function renderTonicRadios() {
  tonicRadiosDiv.innerHTML = '';
  const parentKey = parentKeySelect.value;
  const scale = generateScale(parentKey);
  scale.forEach(note => {
    const label = document.createElement('label');
    label.innerHTML = `<input type="radio" name="tonic" value="${note}"> ${note}`;
    tonicRadiosDiv.appendChild(label);
  });
}

// --- Render Fretboard ---
function renderFretboard() {
  const fretGap = 60;
  const stringGap = 24;
  const svgWidth = FRETS * fretGap;
  const svgHeight = STRINGS.length * stringGap + 40;

  fretboardSvg.innerHTML = '';

  STRINGS.forEach((s, sIdx) => {
    const y = 10 + sIdx * stringGap;
    // String line
    const line = document.createElementNS("http://www.w3.org/2000/svg","line");
    line.setAttribute('x1',0); line.setAttribute('y1',y);
    line.setAttribute('x2',svgWidth); line.setAttribute('y2',y);
    line.setAttribute('stroke','#000'); line.setAttribute('stroke-width',1.5);
    fretboardSvg.appendChild(line);

    // Fret circles
    let openIdx = SHARP_NOTES.indexOf(s);
    for(let f=1; f<=FRETS; f++){
      const note = SHARP_NOTES[(openIdx+f)%12];
      const circle = document.createElementNS("http://www.w3.org/2000/svg","circle");
      circle.setAttribute('cx', f*fretGap - fretGap/2);
      circle.setAttribute('cy', y);
      circle.setAttribute('r',10);
      circle.setAttribute('fill','white');
      circle.setAttribute('stroke','#000');
      circle.dataset.note = note;
      fretboardSvg.appendChild(circle);
    }
  });
}

// --- Highlights based on view/tonic/mode ---
function updateHighlights() {
  const radios = document.querySelectorAll('input[name="tonic"]');
  const selectedTonic = Array.from(radios).find(r => r.checked)?.value || parentKeySelect.value;
  const circles = fretboardSvg.querySelectorAll('circle');

  const scale = generateScale(parentKeySelect.value);

  circles.forEach(c => {
    const note = USE_FLATS ? toFlat(c.dataset.note) : c.dataset.note;
    c.setAttribute('fill', scale.includes(note) ? 'gold' : 'white');
  });
}

// --- Event Listeners ---
parentKeySelect.addEventListener('change', () => { renderTonicRadios(); updateHighlights(); });
modeSelect.addEventListener('change', updateHighlights);
viewToggle.addEventListener('change', () => { viewLabel.textContent = viewToggle.checked ? 'Chord' : 'Mode'; updateHighlights(); });
tonicRadiosDiv.addEventListener('change', updateHighlights);

// --- Initialize ---
renderStringNames();
renderTonicRadios();
renderFretboard();
updateHighlights();
