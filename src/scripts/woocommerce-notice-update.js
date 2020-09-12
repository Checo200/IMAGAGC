/* Trigger AJAX request to save state when the WooCommerce notice is dismissed */
'use strict';

jQuery(document).on( 'click', '.imagagc-woocommerce-notice .notice-dismiss', function() {

    jQuery.ajax({
        url: ajaxurl,
        data: {
            action: 'imagagc_dismiss_woocommerce_notice',
        },
    })

})
