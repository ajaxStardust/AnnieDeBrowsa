// ============================================================================
// FILE: piano-render.js
// ROLE: Pure SVG geometry renderer for the piano keyboard.
//
// LLM‑ORIENTED NOTES (READ FIRST):
// --------------------------------
// • This module is intentionally stateless and pure.
// • It returns a COMPLETE <svg> element representing one octave (C–B).
// • It MUST NOT store state, read DOM, or depend on Web Components.
// • All dynamic behavior (flashing, structural highlights) is driven by
//   the caller via the activeNotes Set.
//
// • This file defines the *canonical geometry* for the piano.
//   → White keys: 7 evenly spaced rectangles
//   → Black keys: positioned using fractional offsets
//   → Labels: centered text elements
//
// • The caller (piano-keyboard.js) is responsible for:
//     - shadow DOM insertion
//     - tempFlashNotes state
//     - updateHighlights() (future)
//
// • activeNotes MUST contain normalized note names (C, C#, D, ...).
//   The renderer does NOT normalize or validate notes.
//
// CRITICAL INVARIANTS:
// --------------------
// • pianoKeys MUST be ordered C → B.
// • whiteKeyWidth = width / 7 MUST remain stable.
// • blackOffsets MUST remain aligned with Western keyboard geometry.
// • The SVG MUST be rebuilt from scratch on each call.
// • No CSS classes are used; all styling is inline for isolation.
//
// DO NOT MODIFY (CRITICAL):
// -------------------------
// • Do NOT add event listeners here.
// • Do NOT import Web Components here.
// • Do NOT introduce shadow DOM here.
// • Do NOT change blackOffsets without updating geometry everywhere.
// ============================================================================

export function renderPiano(svgNS, width, height, pianoKeys, activeNotes = new Set()) {
  // ---------------------------------------------------------------------------
  // Create root SVG element
  // ---------------------------------------------------------------------------
  const piano = document.createElementNS(svgNS, "svg");
  piano.setAttribute("viewBox", `0 0 ${width} ${height}`);
  piano.setAttribute("width", width);
  piano.setAttribute("height", height);

  // ---------------------------------------------------------------------------
  // White key geometry
  //
  // LLM NOTE:
  // • 7 white keys per octave.
  // • Width MUST be width/7 for clean proportional spacing.
  // ---------------------------------------------------------------------------
  const whiteKeyWidth = width / 7;
  let whiteIndex = 0;

  // ---------------------------------------------------------------------------
  // Render white keys (C, D, E, F, G, A, B)
  //
  // LLM NOTE:
  // • White keys are drawn first so black keys can overlay them.
  // • activeNotes determines fill color (orange vs white).
  // ---------------------------------------------------------------------------
  pianoKeys.forEach(k => {
    if (k.type !== "white") return;

    const x = whiteIndex * whiteKeyWidth;

    const rect = document.createElementNS(svgNS, "rect");
    rect.setAttribute("x", x);
    rect.setAttribute("y", 0);
    rect.setAttribute("width", whiteKeyWidth);
    rect.setAttribute("height", height);
    rect.setAttribute("stroke", "black");

    // LLM NOTE:
    // activeNotes controls flashing (orange fill).
    rect.setAttribute("fill", activeNotes.has(k.note) ? "orange" : "white");

    // Label
    const label = document.createElementNS(svgNS, "text");
    label.setAttribute("x", x + whiteKeyWidth / 2);
    label.setAttribute("y", height - 12);
    label.setAttribute("text-anchor", "middle");
    label.setAttribute("font-size", "14");
    label.textContent = k.note;

    piano.appendChild(rect);
    piano.appendChild(label);

    whiteIndex++;
  });

  // ---------------------------------------------------------------------------
  // Black key geometry
  //
  // LLM NOTE:
  // • Black keys are positioned using fractional offsets relative to white keys.
  // • These offsets MUST remain stable for correct keyboard geometry.
  // ---------------------------------------------------------------------------
  const blackKeyWidth = whiteKeyWidth * 0.6;
  const blackKeyHeight = height * 0.65;

  // LLM NOTE:
  // Offsets correspond to the positions between white keys:
  //   C# between C and D
  //   D# between D and E
  //   (no black key between E and F)
  //   F# between F and G
  //   G# between G and A
  //   A# between A and B
  const blackOffsets = {
    "C#": 0.7,
    "D#": 1.7,
    "F#": 3.7,
    "G#": 4.7,
    "A#": 5.7
  };

  // ---------------------------------------------------------------------------
  // Render black keys
  //
  // LLM NOTE:
  // • Black keys overlay white keys (z-order is natural in SVG).
  // • activeNotes controls flashing (orange fill).
  // ---------------------------------------------------------------------------
  pianoKeys.forEach(k => {
    if (k.type !== "black") return;

    const offset = blackOffsets[k.note];
    if (offset === undefined) return; // LLM NOTE: Safety guard

    const x = offset * whiteKeyWidth - blackKeyWidth / 2;

    const rect = document.createElementNS(svgNS, "rect");
    rect.setAttribute("x", x);
    rect.setAttribute("y", 0);
    rect.setAttribute("width", blackKeyWidth);
    rect.setAttribute("height", blackKeyHeight);
    rect.setAttribute("fill", activeNotes.has(k.note) ? "orange" : "black");

    const label = document.createElementNS(svgNS, "text");
    label.setAttribute("x", x + blackKeyWidth / 2);
    label.setAttribute("y", blackKeyHeight - 8);
    label.setAttribute("text-anchor", "middle");
    label.setAttribute("font-size", "10");
    label.setAttribute("fill", "white");
    label.textContent = k.note;

    piano.appendChild(rect);
    piano.appendChild(label);
  });

  return piano;
}
