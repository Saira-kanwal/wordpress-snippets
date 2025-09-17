<?php


function add_ppom_cards_script() {
    if (is_product()) { // Only load on product pages
        ?>
        <script type="text/javascript">
        // Paste your entire JavaScript code here
        jQuery(document).ready(function($) {
    // Handle PPOM checkbox card interactions
    function initPPOMCards() {
        $('.ppom-wrapper .form-check-inline').each(function() {
            var $card = $(this);
            var $checkbox = $card.find('input[type="checkbox"]');
            var optionId = $checkbox.data('optionid');
            var price = $checkbox.data('price');
            
            // Add data attribute for easier targeting
            $card.attr('data-optionid', optionId);
            
            // Add custom checkbox element in top-right
            // if (!$card.find('.custom-checkbox').length) {
            //     $card.prepend('<div class="custom-checkbox"></div>');
            // }
            
            // Add image container if it doesn't exist
            if (!$card.find('.option-image').length) {
                $card.find('.form-check-label').prepend('<div class="option-image"></div>');
            }
            
            // Add description element if it doesn't exist
            if (!$card.find('.option-description').length) {
                var description = getOptionDescription(optionId);
                $card.find('.ppom-input-option-label').append('<div class="option-description">' + description + '</div>');
            }
            
            // Create price content area if it doesn't exist
            if (!$card.find('.price-content').length) {
                // Remove the original price span
                $card.find('.ppom-option-label-price').remove();
                
                // Create new price structure
                var priceHtml = 
                    '<div class="price-content">' +
                    '   <span class="main-price">$' + price + '</span>' + '   <span class="price-label">add per order</span>' +
                    '</div>';
                
                $card.find('.form-check-label').append(priceHtml);
            }
            
            // Set initial state
            if ($checkbox.is(':checked')) {
                $card.addClass('checked');
            }
            
            // Handle click on entire card
            $card.on('click', function(e) {
                if (!$(e.target).is('input[type="checkbox"]')) {
                    $checkbox.prop('checked', !$checkbox.prop('checked')).trigger('change');
                }
            });
            
            // Handle checkbox change
            $checkbox.on('change', function() {
                $card.toggleClass('checked', $(this).is(':checked'));
            });
        });
    }
    
    // Function to get descriptions for each option
    function getOptionDescription(optionId) {
        var descriptions = {
            'fireplace_composite': 'You will add fire to indoor and outdoor fireplaces or fire pits.',
            'sky_replacement': 'You will replace the original sky to create a more visually appealing composition.',
            'tv_screen_replacement': 'You will correct or replace the image or reflection on TV screens.',
            'minor_blemish_removal': 'You will correct small lawn or driveway blemishes, edit lens flares, and other similar minor retouches.'
        };
        return descriptions[optionId] || 'Additional service option';
    }
    
    // Initialize on page load
    initPPOMCards();
    
    // Re-initialize if PPOM fields are loaded dynamically
    $(document).on('ppom_fields_loaded', function() {
        setTimeout(initPPOMCards, 100);
    });
});
        </script>
        <?php
    }
}
add_action('wp_footer', 'add_ppom_cards_script');


// Convert WooCommerce variation dropdowns to radio buttons (front-end only)

add_action('wp_footer', function () {
    if ( ! is_product() ) return; ?>
    <script>
    jQuery(function ($) {
        const $form = $('.variations_form');

        $form.find('select[name^="attribute_"]').each(function () {
            const $select = $(this);
            if ($select.data('converted')) return;

            const name   = $select.attr('name');
            const id     = $select.attr('id') || ('attr-' + Math.random().toString(36).slice(2));
            const $wrap  = $('<div class="dw-radio-variations" />');

            // Build radios for each option
            $select.find('option').each(function () {
                const val = this.value;
                if (!val) return; // skip "Choose an option"
                const text = $(this).text();
                const rid  = id + '-' + Math.random().toString(36).slice(2);

                // Parse the text to separate name and price
                const pattern = /(.+?)\s*\((.+?)\)/;
                const matches = text.match(pattern);
                
                let namePart = text;
                let pricePart = '';
                
                if (matches && matches.length === 3) {
                    namePart = matches[1].trim();
                    pricePart = matches[2].trim();
                }

                // Create the label with separate spans
                $wrap.append(
                    '<label>' +
                      '<input type="radio" id="'+rid+'" name="'+name+'" value="'+val+'"> ' +
                      '<span class="variation-name">'+namePart+'</span>' +
                      '<span class="variation-price">'+pricePart+'</span>' +
                    '</label>'
                );
            });

            // Hide select, insert radios after
            $select.hide().after($wrap).data('converted', true);

            // When user clicks a radio → update the select + trigger Woo events
            $wrap.on('change', 'input[type=radio]', function () {
                $select.val(this.value).trigger('change');
                $form.trigger('woocommerce_variation_select_change');
                $form.trigger('check_variations');
                
                // Add selected class for styling
                $wrap.find('label').removeClass('selected');
                $(this).closest('label').addClass('selected');
            });

            // Sync: if Woo updates select (like reset), clear radios
            $form.on('reset_data', function () {
                $wrap.find('input[type=radio]').prop('checked', false);
                $wrap.find('label').removeClass('selected');
            });
            
            // Initialize selected state based on default selection
            if ($select.val()) {
                $wrap.find('input[type=radio][value="' + $select.val() + '"]')
                     .prop('checked', true)
                     .closest('label').addClass('selected');
            }
        });
    });
    </script>
<?php });