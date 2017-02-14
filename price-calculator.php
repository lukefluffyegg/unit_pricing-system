<?php
/* Price Calculator Template  */

 function testform() {
    echo "
        <form action='' method=''>
          <input type='text'>
        </form>
    ";
 }

 add_action('woocommerce_before_single_product_summary', 'testform', 20);

