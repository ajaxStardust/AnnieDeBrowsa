// fretboard-config.js
export const STRINGS = 6;
export const DEFAULT_FRETS = 12;

export const SCALE_MAP = {
  6: {0:"E",1:"F",2:"F#",3:"G",4:"G#",5:"A",6:"A#",7:"B",8:"C",9:"C#",10:"D",11:"D#",12:"E"},
  5: {0:"A",1:"A#",2:"B",3:"C",4:"C#",5:"D",6:"D#",7:"E",8:"F",9:"F#",10:"G",11:"G#",12:"A"},
  4: {0:"D",1:"D#",2:"E",3:"F",4:"F#",5:"G",6:"G#",7:"A",8:"A#",9:"B",10:"C",11:"C#",12:"D"},
  3: {0:"G",1:"G#",2:"A",3:"A#",4:"B",5:"C",6:"C#",7:"D",8:"D#",9:"E",10:"F",11:"F#",12:"G"},
  2: {0:"B",1:"C",2:"C#",3:"D",4:"D#",5:"E",6:"F",7:"F#",8:"G",9:"G#",10:"A",11:"A#",12:"B"},
  1: {0:"E",1:"F",2:"F#",3:"G",4:"G#",5:"A",6:"A#",7:"B",8:"C",9:"C#",10:"D",11:"D#",12:"E"}
};

export const PIANO_KEYS = [
  { note: "C", type: "white" }, { note: "C#", type: "black" }, { note: "D", type: "white" },
  { note: "D#", type: "black" }, { note: "E", type: "white" }, { note: "F", type: "white" },
  { note: "F#", type: "black" }, { note: "G", type: "white" }, { note: "G#", type: "black" },
  { note: "A", type: "white" }, { note: "A#", type: "black" }, { note: "B", type: "white" }
];