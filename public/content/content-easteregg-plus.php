
    <h1 class="text-2xl mb-4">Unicode Dashboard</h1>

    <!-- Historical Easter Egg Carousel -->
    <div id="easter-egg" class="fade-carousel mb-6"></div>

    <!-- Unicode Controls -->
    <div class="mb-4">
        <div class="input-group">
            <label for="unicode-blocks" class="font-bold mr-2">Select Unicode Block:</label>
            <select id="unicode-blocks" class="border rounded p-1">
                <option value="0x1F300-0x1F5FF">Misc Symbols & Pictographs</option>
                <option value="0x1F600-0x1F64F">Emoticons</option>
                <option value="0x1F680-0x1F6FF">Transport & Map</option>
                <option value="0x1F700-0x1F77F">Alchemical Symbols</option>
                <option value="0x2600-0x26FF">Misc Symbols</option>
            </select>
            <button id="render-block" class="ml-2 p-1 border rounded bg-blue-200">
                Render Selected
            </button>
        </div>

        <div class="input-group">
            <input id="custom-start" type="text" placeholder="Custom Start (hex, e.g., 1F300)"
                class="border rounded p-1 mr-1">
            <input id="custom-end" type="text" placeholder="Custom End (hex, e.g., 1F5FF)"
                class="border rounded p-1 mr-1">
            <button id="render-custom" class="p-1 border rounded bg-green-200">
                Render Custom
            </button>
            <button id="save-custom" class="p-1 border rounded bg-yellow-200">
                Save Custom Block
            </button>
        </div>
    </div>

    <!-- Unicode Display -->
    <div id="unicode-container" class="details-container flex flex-wrap gap-4"></div>
<script>
    /**
 * javascript for the easter egg fader thing
 */


        /* =============================
           Utilities
        ============================= */

        async function loadJSON(url) {
            const res = await fetch(url);
            if (!res.ok) throw new Error(`Failed to load ${url}`);
            return res.json();
        }

        /* =============================
           Historical Carousel
        ============================= */

        const epochFile = '/public/assets/json/human_epochs.json';

        async function loadEpochSlides() {
            const data = await loadJSON(epochFile);
            return data.slides || [];
        }

        async function initEasterEggCarousel() {
            const container = document.getElementById('easter-egg');
            const slidesData = await loadEpochSlides();
            const slides = [];

            function makeSlide(item) {
                const div = document.createElement('div');
                div.className = 'fade-item epoch-slide';

                div.innerHTML = `
                    <div class="text-sm text-gray-500">
                        ${item.period} — ${item.date}
                    </div>
                    <div class="font-bold">
                        ${item.headline}
                    </div>
                    <div class="text-sm mt-1">
                        ${item.core_concept}
                    </div>
                    <div class="text-xs mt-2 italic text-gray-600">
                        ${item.transition_marker}
                    </div>
                `;

                container.appendChild(div);
                slides.push(div);
            }

            slidesData.forEach(makeSlide);

            let index = 0;

            function showNext() {
                slides.forEach(s => s.classList.remove('show'));
                if (slides.length) slides[index].classList.add('show');
                index = (index + 1) % slides.length;
            }

            showNext();
            setInterval(showNext, 5000);
        }

        /* =============================
           Unicode Rendering
        ============================= */

        function renderUnicodeRange(start, end) {
            const container = document.getElementById('unicode-container');
            container.innerHTML = '';

            for (let cp = start; cp <= end; cp++) {
                const glyph = String.fromCodePoint(cp);
                const hex = cp.toString(16).toUpperCase().padStart(4, '0');

                const details = document.createElement('details');
                details.className = 'border rounded-lg p-2';

                details.innerHTML = `
                    <summary>${glyph} U+${hex}</summary>
                    <div class="mt-2 font-mono text-sm text-gray-600">
                        <div>Code: U+${hex}</div>
                        <div>
                            <span>${glyph}</span>
                            <button class="copy-btn ml-2" data-copy="${glyph}">Copy</button>
                        </div>
                    </div>
                `;

                container.appendChild(details);
            }
        }

        document.getElementById('render-block').addEventListener('click', () => {
            const select = document.getElementById('unicode-blocks');
            const range = select.value.split('-').map(v => parseInt(v));
            renderUnicodeRange(range[0], range[1]);
        });

        document.getElementById('render-custom').addEventListener('click', () => {
            const start = parseInt(document.getElementById('custom-start').value, 16);
            const end = parseInt(document.getElementById('custom-end').value, 16);
            renderUnicodeRange(start, end);
        });

        document.getElementById('save-custom').addEventListener('click', () => {
            const start = document.getElementById('custom-start').value;
            const end = document.getElementById('custom-end').value;
            const name = prompt('Enter a name for this custom block:');

            if (name) {
                let blocks = JSON.parse(localStorage.getItem('customBlocks') || '[]');
                blocks.push({ start, end, name });
                localStorage.setItem('customBlocks', JSON.stringify(blocks));
                alert('Custom block saved! Refresh to see in dropdown.');
            }
        });

        /* =============================
           Clipboard
        ============================= */

        document.addEventListener('click', e => {
            if (!e.target.classList.contains('copy-btn')) return;

            const text = e.target.dataset.copy;

            navigator.clipboard.writeText(text).then(() => {
                e.target.textContent = 'Copied!';
                setTimeout(() => (e.target.textContent = 'Copy'), 1000);
            });
        });

        /* =============================
           Boot
        ============================= */

        initEasterEggCarousel(); 
        </script>
