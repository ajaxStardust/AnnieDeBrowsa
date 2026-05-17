import { JSDOM } from "jsdom";

const dom = new JSDOM(`<!DOCTYPE html><body></body>`, { url: "http://localhost" });
global.window = dom.window;
global.document = dom.window.document;
global.HTMLElement = dom.window.HTMLElement;
global.customElements = dom.window.customElements;
global.CustomEvent = dom.window.CustomEvent;

const { GuitarFretboard } = await import("./guitar-fretboard.js");

const el = new GuitarFretboard();
document.body.appendChild(el);
console.log("Custom element created:", el);