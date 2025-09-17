<?php

/**
 * Add at the bottom of your theme's functions.php file
 */

/**
 * Counslar Archive
 */
 
 function create_consular_cpt() {
    register_post_type('consular',
        array(
            'labels' => array(
                'name' => __('Consularissen'),
                'singular_name' => __('Consular')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'specializations'),
            'supports' => array('title', 'thumbnail'),
            'menu_icon' => 'dashicons-businessman',
            'menu_position' => 4 // Set position here
        )
    );
    
/**
 * Add options page for Consulars under the Consulars menu
 */
function add_consulars_archive_settings_page() {
    add_submenu_page(
        'edit.php?post_type=consular', // Parent menu slug (Consulars)
        'Archive Settings', // Page title
        'Archive Settings', // Menu title
        'manage_options', // Capability required
        'consulars-archive-settings', // Menu slug
        'consulars_archive_settings_page_content' // Callback function
    );
}
add_action('admin_menu', 'add_consulars_archive_settings_page');

/**
 * Content for the archive settings page
 */
function consulars_archive_settings_page_content() {
    // Save data if form was submitted
    if (isset($_POST['consulars_archive_description'])) {
        update_option('consulars_archive_description', wp_kses_post($_POST['consulars_archive_description']));
        echo '<div class="notice notice-success"><p>Settings saved successfully!</p></div>';
    }
    
    // Get current value
    $description = get_option('consulars_archive_description', '');
    ?>
    <div class="wrap">
        <h1>Consulars Archive Page Settings</h1>
        <form method="post">
            <?php wp_nonce_field('consulars_archive_nonce', 'consulars_nonce'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="consulars_archive_description">Archive Page Description</label>
                    </th>
                    <td>
                        <?php
                        // Settings for the WYSIWYG editor
                        $editor_settings = array(
                            'textarea_name' => 'consulars_archive_description',
                            'textarea_rows' => 10,
                            'media_buttons' => true, // Show media upload button
                            'teeny' => false, // Show full editor
                            'quicktags' => true,
                        );
                        wp_editor($description, 'consulars_archive_description', $editor_settings);
                        ?>
                        <p class="description">This content will appear at the top of the Consulars archive page.</p>
                    </td>
                </tr>
            </table>
            <?php submit_button('Save Settings'); ?>
        </form>
    </div>
    <?php
}

/**
 * Security: Verify nonce before saving
 */
function verify_consulars_archive_nonce() {
    if (isset($_POST['consulars_nonce']) && !wp_verify_nonce($_POST['consulars_nonce'], 'consulars_archive_nonce')) {
        wp_die('Security check failed');
    }
}
add_action('admin_init', 'verify_consulars_archive_nonce');
    
     // TEMPORARY: Flush rewrite rules on init
    // flush_rewrite_rules();
}
add_action('init', 'create_consular_cpt');







