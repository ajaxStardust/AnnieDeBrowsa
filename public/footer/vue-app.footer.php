<?php

namespace P2u2\Public\Footer;

?>
<footer id="footer" class="content">
<p class="pseudocite">Footer</p>

</footer>
<!-- $  id:pagewidth    $ -->

<script src="assets/js/showme-hideme.js">
		</script>
<script src="assets/js/addlistener.js">
		</script>
<script src="assets/js/dynamicdrop.js"></script>
    
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
    <script>
window.addEventListener("load", () => {
  const radios = document.querySelectorAll("input[type='radio']");

  setTimeout(() => {
    radios.forEach((r, i) => {
      setTimeout(() => {
        r.classList.add("radio-highlight");
        setTimeout(() => r.classList.remove("radio-highlight"), 600);
      }, i * 300);
    });
  }, 3000);
});
</script>

        <script src="assets/js/vue/vue.global.js"></script>
    <script src="assets/js/vue/app.js"></script>


</body>
</html>
