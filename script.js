const SHARP_NOTES = ['C','C#','D','D#','E','F','F#','G','G#','A','A#','B'];
const FLAT_NOTES  = ['C','Db','D','Eb','E','F','Gb','G','Ab','A','Bb','B'];

const STRINGS = ['E','B','G','D','A','E']; // 6th to 1st
const FRETS = 12;

let USE_FLATS = false;
let FLASH_INTERVAL = 500;
let guessModeActive = true;

// --- Elements ---
const parentKeySelect = document.getElementById('parent-key-select');
const modeSelect = document.getElementById('mode-select');
const viewToggle = document.getElementById('view-toggle');
const viewLabel = document.getElementById('view-label');
const tonicRadiosDiv = document.getElementById('tonic-radios');
const fretboardSvg = document.getElementById('fretboard');
const stringNamesDiv = document.getElementById('string-names');

// --- Helpers ---
const noteIndex = n => SHARP_NOTES.indexOf(n);
const toFlat = n => FLAT_NOTES[noteIndex(n)] || n;

const MODE_INTERVALS = {
  'Ionian':    [0,2,4,5,7,9,11],
  'Dorian':    [0,2,3,5,7,9,10],
  'Phrygian':  [0,1,3,5,7,8,10],
  'Lydian':    [0,2,4,6,7,9,11],
  'Mixolydian':[0,2,4,5,7,9,10],
  'Aeolian':   [0,2,3,5,7,8,10],
  'Locrian':   [0,1,3,5,6,8,10]
};

const MODE_TO_DEGREE = {
  'Ionian': 1,
  'Dorian': 2,
  'Phrygian':3,
  'Lydian': 4,
  'Mixolydian':5,
  'Aeolian':6,
  'Locrian':7
};

// --- Generate mode scale based on parent key ---
function generateModeScale(parentKey, mode) {
  const parentIndex = noteIndex(parentKey);
  const majorIntervals = [0,2,4,5,7,9,11];
  const parentScale = majorIntervals.map(i => SHARP_NOTES[(parentIndex + i)%12]);
  const degree = MODE_TO_DEGREE[mode] - 1;
  const modeRoot = parentScale[degree];
  const intervals = MODE_INTERVALS[mode];
  const rootIndex = noteIndex(modeRoot);
  return intervals.map(i => SHARP_NOTES[(rootIndex + i)%12]);
}

// --- Compute minimum fret per string based on mode root ---
function computeFretFloor(parentKey, mode) {
  const modeScale = generateModeScale(parentKey, mode);
  const degree = MODE_TO_DEGREE[mode] - 1;
  const parentIndex = noteIndex(parentKey);
  const parentScale = [0,2,4,5,7,9,11].map(i => SHARP_NOTES[(parentIndex + i)%12]);
  const modeRoot = parentScale[degree];

  const floorPerString = STRINGS.map(s => {
    const stringRootIndex = noteIndex(s);
    let fret = 0;
    for(let f=0; f<=FRETS; f++){
      const note = SHARP_NOTES[(stringRootIndex + f)%12];
      if(note === modeRoot){
        fret = f;
        break;
      }
    }
    return fret; // min fret for this string
  });
  return floorPerString;
}

// --- Render string names ---
function renderStringNames() {
  stringNamesDiv.innerHTML = '';
  STRINGS.forEach(s => {
    const div = document.createElement('div');
    div.textContent = s;
    stringNamesDiv.appendChild(div);
  });
}

// --- Render tonic radios ---
function renderTonicRadios() {
  tonicRadiosDiv.innerHTML = '';
  const scale = generateModeScale(parentKeySelect.value, 'Ionian');
  scale.forEach(note => {
    const label = document.createElement('label');
    label.innerHTML = `<input type="radio" name="tonic" value="${note}"> ${note}`;
    tonicRadiosDiv.appendChild(label);
  });
}

// --- Render fretboard ---
function renderFretboard() {
  const fretGap = 60;
  const stringGap = 24;
  const svgWidth = FRETS * fretGap;
  const fretMarkerFrets = [3,5,7,9,12];
  const floor = computeFretFloor(parentKeySelect.value, modeSelect.value);

  fretboardSvg.innerHTML = '';

  STRINGS.forEach((s, sIdx) => {
    const y = 10 + sIdx * stringGap;
    const openIdx = noteIndex(s);

    // string line
    const line = document.createElementNS("http://www.w3.org/2000/svg","line");
    line.setAttribute('x1',0);
    line.setAttribute('y1',y);
    line.setAttribute('x2',svgWidth);
    line.setAttribute('y2',y);
    line.setAttribute('stroke','#000');
    line.setAttribute('stroke-width',1.5);
    fretboardSvg.appendChild(line);

    // circles for frets
    for(let f=1; f<=FRETS; f++){
      const note = SHARP_NOTES[(openIdx + f)%12];
      const circle = document.createElementNS("http://www.w3.org/2000/svg","circle");
      circle.setAttribute('cx', f*fretGap - fretGap/2);
      circle.setAttribute('cy', y);
      circle.setAttribute('r',10);
      circle.dataset.note = note;

      // --- Guess mode logic ---
      if(guessModeActive){
        // hide dot if below per-string floor
        if(f < floor[sIdx]){
          circle.setAttribute('fill','transparent');
          circle.style.pointerEvents = 'none';
        } else {
          circle.setAttribute('fill','transparent');
          circle.addEventListener('click', () => {
            const allowedNotes = generateModeScale(parentKeySelect.value, modeSelect.value);
            if(allowedNotes.includes(note)){
              flashCircle(circle, 'gold');
            } else {
              flashCircle(circle, 'red');
            }
          });
        }
      } else {
        circle.setAttribute('fill','white');
        circle.addEventListener('click', () => {
          flashCircle(circle, 'gold');
        });
      }

      fretboardSvg.appendChild(circle);
    }
  });

  // fret markers
  fretMarkerFrets.forEach(f => {
    const x = f * fretGap - fretGap/2;
    const marker = document.createElementNS("http://www.w3.org/2000/svg","circle");
    marker.setAttribute('cx', x);
    marker.setAttribute('cy', STRINGS.length * stringGap + 20);
    marker.setAttribute('r',5);
    marker.setAttribute('fill','#888');
    fretboardSvg.appendChild(marker);
  });
}

// --- Flash helper ---
function flashCircle(circle, color) {
  const original = circle.getAttribute('fill');
  circle.setAttribute('fill', color);
  setTimeout(()=>circle.setAttribute('fill', guessModeActive ? 'transparent' : 'white'), FLASH_INTERVAL);
}

// --- Event listeners ---
parentKeySelect.addEventListener('change', () => { renderTonicRadios(); renderFretboard(); });
modeSelect.addEventListener('change', renderFretboard);
viewToggle.addEventListener('change', () => { viewLabel.textContent = viewToggle.checked ? 'Chord' : 'Mode'; renderFretboard(); });
tonicRadiosDiv.addEventListener('change', renderFretboard);

// --- Initialize ---
renderStringNames();
renderTonicRadios();
renderFretboard();
