<div id="app">
    <h2 class="text-white" id="appHeading">Transformative.Click</h2>

    <div class="card pa4 mt3">
        <label class="b red mb2 f3">Resulting URL</label>
        <input type="text" v-model="selectedUrl" placeholder="Type or select a URL..." class="w-100 pa2 mt2 ba b--gray br2">

        <div class="mt2">
            <p>Powered by <span class="bg-lightest-blue">Vue3 v-bind</span>. Edit the URL if necessary.</p>
            <p><strong class="bg-yellow">Choose a radio-button</strong> from the available results to place that URL here.</p>
            <p><strong><a target="_blank" v-bind:href="selectedUrl">{{ selectedUrl }}</a></strong></p>
            <div class="mt2">
                <details>
                    <summary>Details</summary>
                    <p>Edit <code class="bg-near-white br2">./src/View/Main.page.php</code> to customize this <mark>View</mark>. E.g. MVC</p>
                    <p>Modify the logic in the PHP <code class="bg-near-white br2">./src/Model/P2u2.php</code> to <mark>Model</mark> the URL based on your specific development environment.</p>
                    <p>Experiment with <mark class="bg-lightest-blue">Vue.js</mark> to dynamically transform the resulting URL, based on events or other conditions.</p>
                </details>
            </div>
        </div>
    </div>
</div>