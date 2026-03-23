// fretboard-utils.js
export function flashNotes(fretboard, notesSet, scaleMap, strings) {
  notesSet.clear();
  for (let s = 1; s <= strings; s++) {
    for (let f = 0; f <= 12; f++) { // assuming 12 frets max
      if (scaleMap[s]?.[f] && notesSet.has(scaleMap[s][f])) {
        notesSet.add(`${s}-${f}`);
      }
    }
  }
}

export function detectChord(activePerString, scaleMap, tonic, type="major") {
  const chromatic = ["C","C#","D","D#","E","F","F#","G","G#","A","A#","B"];
  const tonicIndex = chromatic.indexOf(tonic);
  if (tonicIndex === -1) return false;

  let intervals;
  if (type === "major") intervals = [0, 4, 7];
  else if (type === "minor") intervals = [0, 3, 7];
  else return false;

  const chordNotes = intervals.map(i => chromatic[(tonicIndex + i) % 12]);

  const activeNotes = new Set();
  for (let s = 1; s <= 6; s++) {
    activePerString.get(s).forEach(f => {
      const n = scaleMap[s]?.[f];
      if (n) activeNotes.add(n);
    });
  }

  return chordNotes.every(n => activeNotes.has(n));
}