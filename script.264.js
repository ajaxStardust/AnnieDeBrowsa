// ============================================================
// Fretboard with nut and separate string-name column
// Rules enforced:
// - No mode dropdown alters geometry
// - Nut is the left endpoint; nothing musical left of nut
// - Open-string / fret-0 markers are NOT drawn on fretboard
// - String names are a separate component aligned visually
// ============================================================

/* ---------- constants & state ---------- */
const SHARP = ['C','C#','D','D#','E','F','F#','G','G#','A','A#','B'];
const FLAT  = ['C','Db','D','Eb','E','F','Gb','G','Ab','A','Bb','B'];

const MODE_INTERVALS = {
  Ionian:     [0,2,4,5,7,9,11],
  Dorian:     [0,2,3,5,7,9,10],
  Phrygian:   [0,1,3,5,7,8,10],
  Lydian:     [0,2,4,6,7,9,11],
  Mixolydian: [0,2,4,5,7,9,10],
  Aeolian:    [0,2,3,5,7,8,10],
  Locrian:    [0,1,3,5,6,8,10]
};

let parentKey = 'G';
let tonic = 'G';
let mode = 'Ionian';
let viewMode = 'mode'; // 'mode' or 'chord'
let useFlats = false;

/* ---------- DOM refs ---------- */
const svg = document.getElementById('fretboard');
const namesCol = document.getElementById('string-names');
const parentKeySel = document.getElementById('parent-key-select');
const modeSel = document.getElementById('mode-select');
const viewToggle = document.getElementById('view-toggle');
const viewLabel = document.getElementById('view-label');
const tonicRadios = document.getElementById('tonic-radios');
const keyboard = document.getElementById('keyboard');

/* ---------- guitar layout (top -> bottom = high -> low) ---------- */
const stringsTopToBottom = ['E','B','G','D','A','E']; // top is high E
const FRETS = 12;

/* ---------- helpers ---------- */
function noteArray() { return useFlats ? FLAT : SHARP; }
function noteIndex(note) { return noteArray().indexOf(note); }
function transpose(root, interval) { return noteArray()[(noteIndex(root) + interval) % 12]; }
function getModeNotes(root, modeName) { return MODE_INTERVALS[modeName].map(i => transpose(root, i)); }

/* ---------- build string-name column (separate component) ---------- */
function buildStringNames() {
  namesCol.innerHTML = '';
  // top-to-bottom order must match SVG string top-to-bottom
  stringsTopToBottom.forEach(s => {
    const div = document.createElement('div');
    div.className = 'sname';
    div.textContent = s;
    namesCol.appendChild(div);
  });
}

/* ---------- build fretboard geometry (nut at left) ---------- */
let fretDots = []; // array of circle elements
function buildFretboard() {
  svg.innerHTML = '';
  fretDots = [];

  const svgNS = 'http://www.w3.org/2000/svg';
  const nutWidth = 18;
  const fretGap = 60;
  const stringGap = 24;
  const topOffset = 12;

  // draw nut (leftmost physical visual)
  const nut = document.createElementNS(svgNS,'rect');
  nut.setAttribute('x',0);
  nut.setAttribute('y', topOffset - 6);
  nut.setAttribute('width', nutWidth);
  nut.setAttribute('height', stringsTopToBottom.length*stringGap + 6);
  nut.setAttribute('fill', '#222');
  svg.appendChild(nut);

  // draw fret lines for frets 1..FRETS
  for(let f=1; f<=FRETS; f++){
    const x = nutWidth + f * fretGap;
    const line = document.createElementNS(svgNS,'line');
    line.setAttribute('x1', x);
    line.setAttribute('y1', topOffset - 6);
    line.setAttribute('x2', x);
    line.setAttribute('y2', topOffset - 6 + stringsTopToBottom.length*stringGap);
    line.setAttribute('stroke', '#999');
    line.setAttribute('stroke-width', 1);
    svg.appendChild(line);
  }

  // draw strings + fret dots (only frets 1..FRETS; no fret-0/open dots)
  for(let s=0; s<stringsTopToBottom.length; s++){
    const y = topOffset + s * stringGap;
    // string line from nut rightwards
    const sline = document.createElementNS(svgNS,'line');
    sline.setAttribute('x1', nutWidth);
    sline.setAttribute('y1', y);
    sline.setAttribute('x2', nutWidth + (FRETS+1) * fretGap);
    sline.setAttribute('y2', y);
    sline.setAttribute('stroke','#333');
    sline.setAttribute('stroke-width', 1.6);
    svg.appendChild(sline);

    // open string name is NOT drawn on fretboard; dot loop starts at fret=1
    const openNoteSharpIndex = SHARP.indexOf(stringsTopToBottom[s]);
    for(let fret=1; fret<=FRETS; fret++){
      const x = nutWidth + (fret - 0.5) * fretGap; // center between frets
      const noteName = noteArray()[(openNoteSharpIndex + fret) % 12];
      const circle = document.createElementNS(svgNS,'circle');
      circle.setAttribute('cx', x);
      circle.setAttribute('cy', y);
      circle.setAttribute('r', 9);
      circle.setAttribute('fill', '#fff');
      circle.setAttribute('stroke', '#333');
      circle.classList.add('fret-dot','visible');
      circle.dataset.note = noteName;
      circle.addEventListener('click', () => blinkForNote(noteName));
      svg.appendChild(circle);
      fretDots.push(circle);
    }
  }
}

/* ---------- tonic radios (Whole-Whole-Half derived) ---------- */
function renderTonicRadios() {
  tonicRadios.innerHTML = '';
  const scaleNotes = getModeNotes(parentKey, 'Ionian'); // full key
  scaleNotes.forEach((n, idx) => {
    const label = document.createElement('label');
    const input = document.createElement('input');
    input.type = 'radio';
    input.name = 'tonic';
    input.value = n;
    if (n === tonic) input.checked = true;
    input.addEventListener('change', () => {
      tonic = n;
      // tonic change rebuilds geometry (per rules)
      buildFretboard();
      applyHighlights();
    });
    label.appendChild(input);
    label.appendChild(document.createTextNode(' ' + n + ' '));
    tonicRadios.appendChild(label);
  });
}

/* ---------- highlighting (mode = filter only) ---------- */
function applyHighlights() {
  // key notes: full key (Ionian) based on parentKey
  const keyNotes = getModeNotes(parentKey, 'Ionian');

  // modeNotes is subset (filter); computing with current tonic & mode
  const modeNotes = getModeNotes(tonic, mode);

  // chord view in this system is rsync-style subset: include only notes in modeNotes that equal tonic (E-form), per rule
  const notesToHighlight = viewMode === 'mode' ? modeNotes : (modeNotes.includes(tonic) ? [tonic] : []);

  // apply classes; do not remove visibility — dots always present
  fretDots.forEach(dot => {
    dot.classList.remove('active','mode','chord','blink');
    const note = dot.dataset.note;
    if ( keyNotes.includes(note) && notesToHighlight.includes(note) ) {
      dot.classList.add('active', viewMode === 'mode' ? 'mode' : 'chord');
      blinkDotElement(dot);
    }
  });

  // update keyboard
  updateKeyboard(notesToHighlight);

  // update view label text
  viewLabel.textContent = viewMode === 'mode' ? 'Mode' : 'Chord';
}

/* ---------- keyboard ---------- */
function buildKeyboard() {
  keyboard.innerHTML = '';
  (useFlats ? FLAT : SHARP).forEach(n => {
    const d = document.createElement('div');
    d.className = 'key';
    d.dataset.note = n;
    d.textContent = n;
    d.addEventListener('click', () => blinkForNote(n));
    keyboard.appendChild(d);
  });
}

function updateKeyboard(activeNotes) {
  document.querySelectorAll('.key').forEach(k => {
    k.classList.toggle('active', activeNotes.includes(k.dataset.note));
  });
}

/* ---------- blink helpers (3 cycles) ---------- */
function blinkDotElement(el) {
  let count = 0;
  const max = 3;
  const interval = setInterval(() => {
    el.classList.toggle('blink');
    count++;
    if (count >= max * 2) {
      el.classList.remove('blink');
      clearInterval(interval);
    }
  }, 220);
}

function blinkForNote(note) {
  // blink all matching dots + keyboard keys (3 cycles)
  const targets = Array.from(fretDots).filter(d => d.dataset.note === note);
  const keyTargets = Array.from(document.querySelectorAll('.key')).filter(k => k.dataset.note === note);
  const all = [...targets, ...keyTargets];
  let count = 0;
  const max = 3;
  const interval = setInterval(() => {
    all.forEach(t => t.classList && t.classList.toggle('blink'));
    count++;
    if (count >= max * 2) {
      all.forEach(t => t.classList && t.classList.remove('blink'));
      clearInterval(interval);
    }
  }, 220);
}

/* ---------- UI wiring ---------- */
parentKeySel.value = parentKey;
parentKeySel.addEventListener('change', e => {
  parentKey = e.target.value;
  renderTonicRadios();
  buildFretboard();
  applyHighlights();
});

modeSel.addEventListener('change', e => {
  mode = e.target.value;
  applyHighlights(); // must NOT rebuild geometry
});

viewToggle.addEventListener('change', e => {
  viewMode = e.target.checked ? 'chord' : 'mode';
  applyHighlights();
});

document.addEventListener('keydown', (e) => {
  // quick debug: press 'f' to force refresh
  if(e.key === 'f') {
    buildFretboard();
    applyHighlights();
  }
});

/* ---------- init ---------- */
(function init(){
  buildStringNames();
  buildFretboard();
  renderTonicRadios();
  buildKeyboard();
  applyHighlights();
})();
