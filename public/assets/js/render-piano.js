function renderPiano(svgNS, width, height) {
  const piano = document.createElementNS(svgNS,"svg");
  piano.setAttribute("viewBox", `0 0 ${width} ${height}`);
  piano.setAttribute("width", width);
  piano.setAttribute("height", height);

  const whiteKeyWidth = width / 7;
  let whiteIndex = 0;

  // White keys
  this.pianoKeys.forEach(k=>{
    if(k.type!=="white") return;
    const x = whiteIndex*whiteKeyWidth;
    const rect = document.createElementNS(svgNS,"rect");
    rect.setAttribute("x",x);
    rect.setAttribute("y",0);
    rect.setAttribute("width",whiteKeyWidth);
    rect.setAttribute("height",height);
    rect.setAttribute("stroke","black");
    rect.setAttribute("fill",this.tempFlashPitches.has(k.note)?"orange":"white");
    piano.appendChild(rect);

    const label = document.createElementNS(svgNS,"text");
    label.setAttribute("x",x+whiteKeyWidth/2);
    label.setAttribute("y",height-12);
    label.setAttribute("text-anchor","middle");
    label.setAttribute("font-size","14");
    label.textContent = k.note;
    piano.appendChild(label);

    whiteIndex++;
  });

  // Black keys
  const blackKeyWidth = whiteKeyWidth*0.6;
  const blackKeyHeight = height*0.65;
  const blackOffsets = {"C#":0.7,"D#":1.7,"F#":3.7,"G#":4.7,"A#":5.7};

  this.pianoKeys.forEach(k=>{
    if(k.type!=="black") return;
    const x = blackOffsets[k.note]*whiteKeyWidth - blackKeyWidth/2;
    const rect = document.createElementNS(svgNS,"rect");
    rect.setAttribute("x",x);
    rect.setAttribute("y",0);
    rect.setAttribute("width",blackKeyWidth);
    rect.setAttribute("height",blackKeyHeight);
    rect.setAttribute("fill",this.tempFlashPitches.has(k.note)?"orange":"black");
    piano.appendChild(rect);

    const label = document.createElementNS(svgNS,"text");
    label.setAttribute("x",x+blackKeyWidth/2);
    label.setAttribute("y",blackKeyHeight-8);
    label.setAttribute("text-anchor","middle");
    label.setAttribute("font-size","10");
    label.setAttribute("fill","white");
    label.textContent = k.note;
    piano.appendChild(label);
  });

  return piano;
}
