<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Modal Fretboard Engine</title>
    <style>
    body {
        font-family: sans-serif;
        padding: 20px;
        background: #f4f4f4;
    }

    #controller {
        margin-bottom: 20px;
    }

    label {
        margin-right: 12px;
    }

    select {
        margin-right: 12px;
    }

    guitar-fretboard {
        display: block;
        margin-top: 20px;
        border: 1px solid #ccc;
    }

    #info {
        margin-top: 12px;
        font-weight: bold;
    }
    </style>
</head>

<body>

    <h2>Relative Modal Fretboard</h2>

    <div id="controller">

        <!-- Study Type -->
        <label><input type="radio" name="study" value="mode" checked> Mode Study</label>

        <br><br>

        <!-- Parent Key -->
        <label>Parent Key:
            <select id="key-select"></select>
        </label>

        <br><br>

        <!-- Derivation Type -->
        <label><input type="radio" name="derive" value="degree" checked> By Degree</label>
        <label><input type="radio" name="derive" value="modeName"> By Mode Name</label>

        <br><br>

        <!-- Degree Selector -->
        <select id="degree-select"></select>

        <!-- Mode Selector -->
        <select id="mode-select" style="display:none;"></select>

    </div>

    <div id="info"></div>

    <guitar-fretboard frets="12"></guitar-fretboard>

    <script type="module">
    /* ===========================
   THEORY ENGINE
=========================== */

    const CHROMATIC = ['C', 'C#', 'D', 'D#', 'E', 'F', 'F#', 'G', 'G#', 'A', 'A#', 'B'];
    const MAJOR_PATTERN = [2, 2, 1, 2, 2, 2, 1];
    const MODE_NAMES = [
        "Ionian",
        "Dorian",
        "Phrygian",
        "Lydian",
        "Mixolydian",
        "Aeolian",
        "Locrian"
    ];

    function buildMajorScale(root) {
        let scale = [root];
        let idx = CHROMATIC.indexOf(root);
        MAJOR_PATTERN.forEach(step => {
            idx = (idx + step) % 12;
            scale.push(CHROMATIC[idx]);
        });
        scale.pop();
        return scale;
    }

    function rotate(arr, n) {
        return [...arr.slice(n), ...arr.slice(0, n)];
    }

    /* ===========================
       STATE
    =========================== */

    const state = {
        parentKey: 'C',
        degree: 0
    };

    /* ===========================
       UI SETUP
    =========================== */

    const keySelect = document.getElementById('key-select');
    const degreeSelect = document.getElementById('degree-select');
    const modeSelect = document.getElementById('mode-select');
    const info = document.getElementById('info');

    CHROMATIC.forEach(note => {
        const opt = document.createElement('option');
        opt.value = note;
        opt.textContent = note;
        keySelect.appendChild(opt);
    });

    MODE_NAMES.forEach((name, i) => {
        const opt = document.createElement('option');
        opt.value = i;
        opt.textContent = name;
        modeSelect.appendChild(opt);

        const degOpt = document.createElement('option');
        degOpt.value = i;
        degOpt.textContent = `Degree ${i+1}`;
        degreeSelect.appendChild(degOpt);
    });

    /* ===========================
       CUSTOM ELEMENT
    =========================== */

    class GuitarFretboard extends HTMLElement {
        constructor() {
            super();
            this.attachShadow({
                mode: 'open'
            });
            this.strings = ['E', 'B', 'G', 'D', 'A', 'E'].reverse();
            this.frets = parseInt(this.getAttribute('frets')) || 12;
            this.svgNS = "http://www.w3.org/2000/svg";
            this.allowedNotes = [];
            this.rootNote = null;
            this.render();
        }

        setScale(notes, root) {
            this.allowedNotes = notes;
            this.rootNote = root;
            this.updateHighlights();
        }

        render() {
            const svg = document.createElementNS(this.svgNS, 'svg');
            svg.setAttribute('width', '520');
            svg.setAttribute('height', '180');

            const fretGap = 40;
            const stringGap = 24;
            const numberedFrets = [0, 3, 5, 7, 9, 12];

            // --- strings & circles ---
            for (let s = 0; s < this.strings.length; s++) {
                const visualIndex = this.strings.length - 1 - s; // top=high E
                const y = 30 + visualIndex * stringGap;

                // string line
                const line = document.createElementNS(this.svgNS, 'line');
                line.setAttribute('x1', 0);
                line.setAttribute('y1', y);
                line.setAttribute('x2', this.frets * fretGap);
                line.setAttribute('y2', y);
                line.setAttribute('stroke', '#000');
                line.setAttribute('stroke-width', 1.5);
                svg.appendChild(line);

                // open string label
                const text = document.createElementNS(this.svgNS, 'text');
                text.setAttribute('x', -10);
                text.setAttribute('y', y + 5);
                text.setAttribute('text-anchor', 'end');
                text.setAttribute('font-size', '12');
                text.setAttribute('fill', '#000');
                text.textContent = this.strings[s];
                svg.appendChild(text);

                // circles for frets
                let openIndex = CHROMATIC.indexOf(this.strings[s]);
                for (let f = 0; f < this.frets; f++) {
                    const note = CHROMATIC[(openIndex + f) % 12];
                    const circle = document.createElementNS(this.svgNS, 'circle');
                    circle.setAttribute('cx', f * fretGap + fretGap / 2);
                    circle.setAttribute('cy', y);
                    circle.setAttribute('r', 9);
                    circle.setAttribute('fill', 'white');
                    circle.setAttribute('stroke', '#000');
                    circle.dataset.note = note;
                    svg.appendChild(circle);
                }
            }

            // --- fret markers ---
            numberedFrets.forEach(f => {
                const x = f * fretGap + fretGap / 2;
                const text = document.createElementNS(this.svgNS, 'text');
                text.setAttribute('x', x);
                text.setAttribute('y', 20);
                text.setAttribute('text-anchor', 'middle');
                text.setAttribute('font-size', '12');
                text.setAttribute('fill', '#000');
                text.textContent = f === 0 ? '' : f; // skip 0 for nut
                svg.appendChild(text);
            });

            // --- nut line ---
            const nut = document.createElementNS(this.svgNS, 'line');
            nut.setAttribute('x1', 0);
            nut.setAttribute('y1', 30 - stringGap / 2);
            nut.setAttribute('x2', 0);
            nut.setAttribute('y2', 30 + (this.strings.length - 1) * stringGap + stringGap / 2);
            nut.setAttribute('stroke', '#000');
            nut.setAttribute('stroke-width', 4);
            svg.appendChild(nut);

            this.shadowRoot.innerHTML = '';
            this.shadowRoot.appendChild(svg);
        }



        updateHighlights() {
            const svg = this.shadowRoot.querySelector('svg');
            svg.querySelectorAll('circle').forEach(c => {
                const note = c.dataset.note;
                if (note === this.rootNote) {
                    c.setAttribute('fill', 'red');
                } else if (this.allowedNotes.includes(note)) {
                    c.setAttribute('fill', 'gold');
                } else {
                    c.setAttribute('fill', 'white');
                }
            });
        }
    }

    customElements.define('guitar-fretboard', GuitarFretboard);

    const gf = document.querySelector('guitar-fretboard');

    /* ===========================
       CALCULATION
    =========================== */

    function recalc() {
        const majorScale = buildMajorScale(state.parentKey);
        const modalRoot = majorScale[state.degree];
        const modalScale = rotate(majorScale, state.degree);

        gf.setScale(modalScale, modalRoot);

        info.innerHTML = `
    Parent Key: ${state.parentKey} <br>
    Degree: ${state.degree+1} <br>
    Mode: ${MODE_NAMES[state.degree]} <br>
    Root: ${modalRoot}
  `;
    }

    /* ===========================
       EVENT LISTENERS
    =========================== */

    keySelect.addEventListener('change', () => {
        state.parentKey = keySelect.value;
        recalc();
    });

    degreeSelect.addEventListener('change', () => {
        state.degree = parseInt(degreeSelect.value);
        modeSelect.value = state.degree;
        recalc();
    });

    modeSelect.addEventListener('change', () => {
        state.degree = parseInt(modeSelect.value);
        degreeSelect.value = state.degree;
        recalc();
    });

    document.querySelectorAll('input[name="derive"]').forEach(r => {
        r.addEventListener('change', () => {
            if (r.value === 'degree' && r.checked) {
                degreeSelect.style.display = 'inline';
                modeSelect.style.display = 'none';
            }
            if (r.value === 'modeName' && r.checked) {
                degreeSelect.style.display = 'none';
                modeSelect.style.display = 'inline';
            }
        });
    });

    /* ===========================
       INIT
    =========================== */

    keySelect.value = 'C';
    degreeSelect.value = 0;
    modeSelect.value = 0;
    recalc();
    </script>
</body>

</html>