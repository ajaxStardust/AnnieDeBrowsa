// public/assets/js/vue/app.js

// CONTRACT: lightweight Vue result binding
//
// ROLE:
// - Mount a small Vue app on #app for the live transform page.
// - Mirror the selected radio result into selectedUrl.
//
// INVARIANTS:
// - Mount target MUST remain #app unless Main.page.php changes in the same edit.
// - Radio selector contract is input[name="selectedUrl"].
// - selectedUrl is the canonical reactive field consumed by v-model and v-bind.
// - This file is intentionally small; do not silently turn it into a larger SPA.

const app = Vue.createApp({
    data() {
        return {
            selectedUrl: '' // bind this to your input
        };
    },
    methods: {
        initSelectedUrl() {
            // Optional: pick initial radio selection from page
            const selectedRadio = document.querySelector('input[name="selectedUrl"]:checked');
            if (selectedRadio) {
                this.selectedUrl = selectedRadio.value;
            }
        },
        watchRadioButtons() {
            const that = this;
            document.querySelectorAll('input[name="selectedUrl"]').forEach((input) => {
                input.addEventListener('change', function () {
                    that.selectedUrl = this.value;
                });
            });
        }
    },
    mounted() {
        this.initSelectedUrl();
        this.watchRadioButtons();
    }
});

app.mount('#app');
