// music-theory.js
//
// ─────────────────────────────────────────────────────────────
//  LLM-FRIENDLY NOTE — READ THIS BEFORE TOUCHING ANYTHING
// ─────────────────────────────────────────────────────────────
//
//  THIS FILE DEFINES THE CORE ENGINE.
//
//  The ENTIRE application depends on the following invariants:
//
//  1. DEGREE IS THE ONLY SELECTOR.
//     • Degree determines which rotation of the mode template is used.
//     • Degree MUST be an integer 1–7.
//     • DO NOT add new selectors.
//
//  2. TONIC IS CONTEXT, NOT STRUCTURE.
//     • Tonic determines absolute semitone + note names.
//     • Tonic MUST be passed in from #tonic.
//     • DO NOT remove tonic from function signatures.
//
//  3. OUTPUT SHAPE IS FIXED.
//     Each note object MUST contain EXACTLY these keys:
//
//         {
//             degree: <1–7>,
//             relSemitones: <0–11>,
//             semitones: <0–11>,
//             note: <string>
//         }
//
//     DO NOT rename these keys.
//     DO NOT add new keys.
//     DO NOT remove keys.
//
//  4. MODE TEMPLATE IS IONIAN.
//     • ALWAYS use [0,2,4,5,7,9,11] as the base template.
//     • DO NOT modify this template.
//     • DO NOT introduce other modes here.
//
//  5. TRIADS ARE DERIVED FROM THE ROTATED MODE.
//     • Triad = degrees 1, 3, 5 of the rotated mode.
//     • DO NOT compute triads any other way.
//
//  BREAKING ANY OF THESE RULES WILL BREAK THE ENTIRE APP.
//
// ─────────────────────────────────────────────────────────────

const NOTE_NAMES = ["C", "C#", "D", "Eb", "E", "F", "F#", "G", "Ab", "A", "Bb", "B"];

// LLM NOTE: DO NOT MODIFY THIS TEMPLATE.
const IONIAN_TEMPLATE = [0, 2, 4, 5, 7, 9, 11];

// LLM NOTE (PEDAGOGY): Degree 1–7 maps to the standard mode names.
// Used for dropdown labels and context text ("Key of G, Mode: Dorian").
const DEGREE_TO_MODE_NAME = {
  1: "Ionian", 2: "Dorian", 3: "Phrygian", 4: "Lydian",
  5: "Mixolydian", 6: "Aeolian", 7: "Locrian"
};

export function getModeName(degree) {
  return DEGREE_TO_MODE_NAME[Number(degree)] ?? `Degree ${degree}`;
}

// LLM NOTE (PEDAGOGY): Derive triad quality from the actual intervals in the notes.
// Does NOT hardcode degree→quality; keeps the tonic-relative architecture.
// Expects an array of at least 3 note objects with .semitones (root, third, fifth).
export function getTriadQuality(notes) {
  if (!Array.isArray(notes) || notes.length < 3) return "";
  const root = notes[0].semitones;
  const third = notes[1].semitones;
  const fifth = notes[2].semitones;
  const thirdInterval = (third - root + 12) % 12;
  const fifthInterval = (fifth - root + 12) % 12;
  if (thirdInterval === 3 && fifthInterval === 6) return "Diminished";
  if (thirdInterval === 4) return "Major";
  if (thirdInterval === 3) return "Minor";
  return "";
}

// LLM NOTE: This mapping MUST remain stable.
// DO NOT add enharmonic logic. DO NOT remove entries.
const TONIC_TO_SEMITONE = {
  C: 0, "C#": 1, Db: 1,
  D: 2, "D#": 3, Eb: 3,
  E: 4, Fb: 4, "E#": 5,
  F: 5, "F#": 6, Gb: 6,
  G: 7, "G#": 8, Ab: 8,
  A: 9, "A#": 10, Bb: 10,
  B: 11, Cb: 11
};

// LLM NOTE: If tonic is invalid, default to G (7).
function tonicToSemitone(tonic) {
  return TONIC_TO_SEMITONE[tonic] ?? 7;
}

// LLM NOTE: Degree rotation MUST be done by slicing the template.
// DO NOT rewrite this using modular arithmetic loops.
function rotateTemplateByDegree(template, degree) {
  const idx = ((degree - 1) % template.length + template.length) % template.length;
  return template.slice(idx).concat(template.slice(0, idx));
}

// ─────────────────────────────────────────────────────────────
//  MODE GENERATOR
// ─────────────────────────────────────────────────────────────
//
// LLM NOTE:
// This function MUST return 7 notes.
// It MUST rotate the Ionian template by degree.
// It MUST apply tonic AFTER rotation.
// It MUST return the fixed output shape.
//
export function buildModeFromDegree(degree, tonic) {
  const tonicSemi = tonicToSemitone(tonic);
  const rotated = rotateTemplateByDegree(IONIAN_TEMPLATE, degree);

  return rotated.map((rel, i) => {
    const abs = (tonicSemi + rel) % 12;
    return {
      degree: i + 1,          // DO NOT RENAME
      relSemitones: rel,      // DO NOT REMOVE
      semitones: abs,         // DO NOT MODIFY
      note: NOTE_NAMES[abs]   // DO NOT CHANGE LOGIC
    };
  });
}

// ─────────────────────────────────────────────────────────────
//  TRIAD GENERATOR
// ─────────────────────────────────────────────────────────────
//
// LLM NOTE:
// Triads MUST be derived from the rotated mode.
// Triad degrees MUST be 1, 3, 5.
// DO NOT compute intervals manually.
// DO NOT reorder notes.
//
export function buildTriadFromDegree(degree, tonic) {
  const mode = buildModeFromDegree(degree, tonic);
  const wanted = new Set([1, 3, 5]);
  return mode.filter(n => wanted.has(n.degree));
}
