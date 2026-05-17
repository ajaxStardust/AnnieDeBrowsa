<?php

namespace P2u2\Public\Footer;

/*
 * CONTRACT: base footer layout closer
 *
 * ROLE:
 * - Closes pages that were opened by a public/doctype layout file.
 * - Owns shared footer markup and the closing </body></html> tags.
 *
 * INVARIANTS:
 * - Files using public/doctype/doctype-base.php should normally pair with a
 *   footer include that closes the document once.
 * - Do not duplicate closing body/html tags elsewhere in the same route.
 */

?>
<footer id="footer" class="container">
<p class="pseudocite">Base Footer</p>

</footer>
<!-- $  id:pagewidth    $ -->

<!-- § ============= SHOWME-HIDEME ========== § -->
<script src="assets/js/showme-hideme.js"></script>

<!-- § ============= ADDLISTENER ========== § -->
<script src="assets/js/addlistener.js"></script>
 


</body>
</html>
