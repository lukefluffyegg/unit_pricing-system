<?php
/* Price Calculator Template  */
wp_enqueue_script('jquery-number', get_template_directory() . '/js/jquery.number.min.js');
wp_enqueue_script('simple-calc', get_template_directory() . './js/simplepricecalc.js');

 function testform() {
    echo "
        <form id='priceForm' class='fixed-total'>
          <h2> Product Type </h2>
            <select>
                <option data-price='0'> Wood </option> 
                <option data-price='50' data-label='Ash'>Ash</option>
                <option data-price='100' data-label='Oak'> Oak </option>
                <option data-price='150' data-label='Walnut'> Walnut </option>
            </select> 

        <br />

        <h4> Features </h4>
        <input type='checkbox' name='feat1' value='10' data-label='Feature 1' >Optional Feature 1
        <input type='checkbox' name='feat2' value='20' data-label='Feature 2' >Optional Feature 2  
        <input type='checkbox' name='feat3' value='15' data-label='Feature 3' >Optional Feature 3 
        <br />

        <h4> Width: </h4> <input type='text' data-price='0' id='features' data-label='Product Width' />
        <h4> Length: </h4> <input type='text' data-price='0' data-label='Product Height' id='features2' />
        <h4> Total SQMM: </h4> <input type='text' data-price='1' data-merge='features,features2' data-label='Total SQFT Cost' disabled />

        <h2> QUN</h2>
        <input type='text' data-mult='1' data-label='Quantity' />

        <br />

        </form>
    ";
 }

 add_action('woocommerce_before_single_product_summary', 'testform', 20);

