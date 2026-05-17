// note-change-listener.js
window.addEventListener("notechange", (e) => {
  const { activePerString, scaleMap, strings } = e.detail || {};
  if (!activePerString || !scaleMap) return;

  const out = [];
  for (let s = strings; s >= 1; s--) {
    const frets = activePerString[s] || [];
    const notes = frets.map(f => scaleMap[s]?.[f] || "-");
    out.push(`${s}  ${notes.join(", ")}`);
  }

  const target = document.getElementById("note-panel-content");
  if (target) target.innerHTML = out.join("<br>");
});