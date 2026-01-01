<div id="app">
  <h2>Domain Configuration</h2>

  <div class="card pa4 mt3">
    <label>Resulting URL</label>
    <input type="text" v-model="selectedUrl" placeholder="Type or select a URL..." class="w-100 pa2 ba b--gray br1">

    <div class="mt2">
      <strong>Preview:</strong> {{ selectedUrl }}
    </div>

    <div class="mt3 grid-3-ns gap3">
      <div class="card pa2 br2 ba b--light-gray" v-for="url in urlOptions" :key="url.name" @click="selectUrl(url.value)" :class="{'bg-highlight': highlightUrl === url.value}">
        <p>{{ url.name }}</p>
        <p class="mono">{{ url.value }}</p>
      </div>
    </div>


  </div>
</div>

<!-- div class="mb4">
    <h2 class="section-title f3 fw7 mv3">Navigation Traversal</h2>
    <div class="card pa4 mt3">
        <h3 class="mt0 mb3 f6 fw6">Parent Directory Navigation</h3>
        <p class="mb3 f6 gray">The "go up" URL should appear as the first navigation item:</p>
        <ol id="navgoup_demo" class="db pa0 ml3">
            <?php /*
                $goUpArray = $Functions->process_goup();
                foreach ($goUpArray as $goUpKey => $goUpVal) {
                    echo '<li class="navgoup_item todo-item mb2">goUp[' . $goUpKey . "]: " . $goUpVal . "</li>";
                }
                    */
            ?>
        </ol>
    </div>
</div -->

 <script>
window.onload = function() {
    const blockA = document.querySelector('#url_buildByComp').closest('.card');
    const blockB = document.querySelector('#url_concatThis').closest('.card');
    const blockC = document.querySelector('#url_concatSwitch').closest('.card');

    setTimeout(() => {
        blockC.classList.add('bg-highlight');
    }, 200);
    setTimeout(() => blockC.classList.remove('bg-highlight'), 300);

    setTimeout(() => blockB.classList.add('bg-highlight'), 400);
    setTimeout(() => blockB.classList.remove('bg-highlight'), 500);

    setTimeout(() => blockA.classList.add('bg-highlight'), 600);
    setTimeout(() => blockA.classList.remove('bg-highlight'), 700);

    updateTwerkinPath();
};
    // Auto-populate Twerkin path field when URL selection changes
    function updateTwerkinPath() {
        const selectedRadio = document.querySelector('input[name="selectedUrl"]:checked');
        if (selectedRadio) {
            document.getElementById('dataHref01').value = selectedRadio.value;
        }
    }

    // Initialize on page load with default selection
    document.addEventListener('DOMContentLoaded', function() {
        updateTwerkinPath();
    });
    </script>
