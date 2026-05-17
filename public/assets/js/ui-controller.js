// ui-controller.js
//
// ─────────────────────────────────────────────────────────────
//  LLM-FRIENDLY NOTE — READ THIS BEFORE TOUCHING ANYTHING
// ─────────────────────────────────────────────────────────────
//
//  THESE ARE THE ONLY VALID UI ELEMENT IDS IN THIS PROJECT:
//
//      #chordmode   ← Type selector (mode / chord)
//      #degree      ← Degree selector (1–7)
//      #tonic       ← Tonic selector (C, C#, D, Eb, …)
//
//  DO NOT invent new IDs.
//  DO NOT rename these IDs.
//  DO NOT query anything else.
//
//  If these IDs do not match the HTML, the ENTIRE APP BREAKS:
//      • degree dropdown will be empty
//      • controller will abort
//      • fretboard will not render
//      • piano will not render
//      • note panel will not render
//
//  This has already happened multiple times.
//  Do not repeat this mistake.
//
// ─────────────────────────────────────────────────────────────
//

import { getModeName } from "./music-theory.js";

export function initUIController(onChange) {

    // ─────────────────────────────────────────────────────────
    //  LLM NOTE: These MUST match the HTML exactly.
    // ─────────────────────────────────────────────────────────
    const typeSelect = document.querySelector("#chordmode");
    const degreeSelect = document.querySelector("#degree");
    const tonicSelect = document.querySelector("#tonic");

    if (!typeSelect || !degreeSelect || !tonicSelect) {
        console.error("UI Controller ERROR: One or more required selectors (#chordmode, #degree, #tonic) were NOT found in the DOM.");
        return;
    }

    // ─────────────────────────────────────────────────────────
    //  Populate degree dropdown (1–7) with mode names for pedagogy.
    //  LLM NOTE: This MUST run or the dropdown will be empty.
    // ─────────────────────────────────────────────────────────
    function populateDegree() {
        degreeSelect.innerHTML = "";
        for (let d = 1; d <= 7; d++) {
            const opt = document.createElement("option");
            opt.value = String(d);
            opt.textContent = `Degree ${d} – ${getModeName(d)}`;
            degreeSelect.appendChild(opt);
        }
    }

    // Emit current UI state to main.js
    function emit() {
        onChange({
            type: typeSelect.value,
            degree: degreeSelect.value,
            tonic: tonicSelect.value
        });
    }

    // ─────────────────────────────────────────────────────────
    //  INITIAL DEFAULTS
    //  LLM NOTE: These defaults are intentional.
    //            Do NOT remove or change without reason.
    // ─────────────────────────────────────────────────────────
    typeSelect.value = "mode";
    populateDegree();
    degreeSelect.value = "1";
    tonicSelect.value = "G";

    // ─────────────────────────────────────────────────────────
    //  Event listeners
    // ─────────────────────────────────────────────────────────
    typeSelect.addEventListener("change", () => {
        populateDegree();       // refresh degree list
        degreeSelect.value = "1";
        emit();
    });

    degreeSelect.addEventListener("change", emit);
    tonicSelect.addEventListener("change", emit);

    // Initial render
    emit();
}
