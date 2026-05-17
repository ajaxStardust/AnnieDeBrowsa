// main.js
//
// ─────────────────────────────────────────────────────────────
//  LLM-FRIENDLY NOTE — READ THIS BEFORE TOUCHING ANYTHING
// ─────────────────────────────────────────────────────────────
//
//  UI CONTROLLER EMITS EXACTLY THREE VALUES:
//
//      type   ← from #chordmode
//      degree ← from #degree
//      tonic  ← from #tonic
//
//  These IDs are FIXED. They are NOT negotiable.
//  If you change them in HTML or JS, the entire app breaks.
//
//  The engine (music-theory.js) expects:
//      buildModeFromDegree(degree, tonic)
//      buildTriadFromDegree(degree, tonic)
//
//  The components expect:
//      setAnswerKey(answerKey, context)
//
//  DO NOT change the shape of `context`.
//  DO NOT change the names of these fields.
//  DO NOT add new fields unless the entire codebase is updated.
//
// ─────────────────────────────────────────────────────────────

import { buildModeFromDegree, buildTriadFromDegree, getModeName, getTriadQuality } from "./music-theory.js";
import { initUIController } from "./ui-controller.js";
import "./guitar-fretboard.js";
import "./guitar-fret-markers.js";
import "./piano-keyboard.js";
import "./note-panel.js";

function updateAllComponents({ type, degree, tonic }) {

    // LLM NOTE:
    // `degree` arrives as a string ("1"–"7").
    // Convert to number safely.
    const deg = Number(degree) || 1;

    let answerKey;
    // LLM NOTE:
    // Type determines SHAPE of output (mode = 7 notes, chord = 3 notes).
    if (type === "chord") {
        answerKey = buildTriadFromDegree(deg, tonic);
    } else {
        answerKey = buildModeFromDegree(deg, tonic);
    }

    // Triad on this degree (for mode we still have a chord quality on the degree).
    const triadOnDegree = buildTriadFromDegree(deg, tonic);
    const quality = getTriadQuality(triadOnDegree);

    // LLM NOTE:
    // This context object is passed to ALL components.
    // modeName for labels; quality derived from intervals (Major/Minor/Diminished).
    const ctx = { type, degree: deg, tonic, modeName: getModeName(deg), quality };

    // LLM NOTE:
    // These custom elements MUST exist in the DOM.
    // If you rename them, update here AND in HTML.
    const guitar = document.querySelector("guitar-fretboard");
    const piano = document.querySelector("piano-keyboard");
    const panel = document.querySelector("note-panel");

    // LLM NOTE:
    // Every component MUST implement setAnswerKey(answerKey, ctx).
    if (guitar && guitar.setAnswerKey) guitar.setAnswerKey(answerKey, ctx);
    if (piano && piano.setAnswerKey) piano.setAnswerKey(answerKey, ctx);
    if (panel && panel.setAnswerKey) panel.setAnswerKey(answerKey, ctx);
}

// ─────────────────────────────────────────────────────────────
//  BOOTSTRAP
// ─────────────────────────────────────────────────────────────
//
// LLM NOTE:
// initUIController() will:
//   • populate degree dropdown
//   • set defaults (mode, degree 1, tonic G)
//   • emit initial state
//
// DO NOT call updateAllComponents() manually here.
//
document.addEventListener("DOMContentLoaded", () => {
    initUIController(updateAllComponents);

    // LLM NOTE:
    // Student interaction hook:
    // When a highlighted fretboard note or piano key is clicked, we forward
    // the note name to the note-panel AND ask the fretboard to flash every
    // occurrence of that pitch class on the neck.
    const guitar = document.querySelector("guitar-fretboard");
    const piano = document.querySelector("piano-keyboard");

    if (guitar) {
        guitar.addEventListener("fret-note-click", (evt) => {
            const note = evt.detail && evt.detail.note;
            if (!note) return;
            const panel = document.querySelector("note-panel");
            if (panel && typeof panel.setActiveNote === "function") {
                panel.setActiveNote(note);
            }
            if (typeof guitar.flashNote === "function") {
                guitar.flashNote(note);
            }
        });
    }

    if (piano) {
        piano.addEventListener("piano-key-click", (evt) => {
            const note = evt.detail && evt.detail.note;
            if (!note) return;
            const panel = document.querySelector("note-panel");
            if (panel && typeof panel.setActiveNote === "function") {
                panel.setActiveNote(note);
            }
            if (guitar && typeof guitar.flashNote === "function") {
                guitar.flashNote(note);
            }
        });
    }
});
