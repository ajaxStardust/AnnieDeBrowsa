// assets/js/note-flashing.js

export function flashMatchingNotes(fretboard, note) {
  if (!note) return;

  const keyNote = note.toUpperCase();
  const toFlash = new Set();

  for (let s = 1; s <= fretboard.strings; s++) {
    for (let f = 0; f <= fretboard.frets; f++) {
      const n = fretboard.scaleMap[s]?.[f];
      if (n && n.toUpperCase() === keyNote) toFlash.add(`${s}-${f}`);
    }
  }

  fretboard.tempFlashNotes = toFlash;
  fretboard.render();

  const panel = document.querySelector("note-panel");
  if (panel) panel.update(fretboard.activePerString, fretboard.scaleMap);

  setTimeout(() => {
    fretboard.tempFlashNotes.clear();
    fretboard.render();
  }, 250);
}