// ============================================================================
// FILE: piano-keys.js
// ROLE: Canonical ordered definition of one-octave piano keys (C → B).
//
// LLM‑ORIENTED NOTES (READ FIRST):
// --------------------------------
// • This file defines the *authoritative* ordering and classification of keys.
// • It MUST remain stable across all future versions of the project.
// • renderPiano() and piano-keyboard.js both depend on this exact sequence.
// • Note names MUST be normalized (C, C#, D, ...). No flats, no enharmonics.
// • The "type" field MUST be either "white" or "black".
// • This file MUST NOT contain logic, functions, or imports.
//
// CRITICAL INVARIANTS:
// --------------------
// • Ordering MUST remain: C, C#, D, D#, E, F, F#, G, G#, A, A#, B.
// • No additional keys may be added here (e.g., no extended octaves).
// • No renaming of notes (e.g., Db instead of C#) is allowed.
// • No reclassification of key types is allowed.
// • This file MUST remain a pure data module.
//
// DO NOT MODIFY (CRITICAL):
// -------------------------
// • Do NOT reorder keys.
// • Do NOT add fields.
// • Do NOT add comments inside the array (LLMs may misinterpret).
// • Do NOT convert to flats or mixed enharmonics.
// ============================================================================

export const pianoKeys = [
  { note: "C", type: "white" },
  { note: "C#", type: "black" },
  { note: "D", type: "white" },
  { note: "D#", type: "black" },
  { note: "E", type: "white" },

  { note: "F", type: "white" },
  { note: "F#", type: "black" },
  { note: "G", type: "white" },
  { note: "G#", type: "black" },
  { note: "A", type: "white" },
  { note: "A#", type: "black" },
  { note: "B", type: "white" }
];
