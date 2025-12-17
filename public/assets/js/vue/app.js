// public/assets/js/vue/app.js

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
