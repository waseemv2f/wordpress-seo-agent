<?php
/*
 * WordPress SEO Agent - expose Yoast SEO fields through REST.
 * Install as an MU plugin or normal plugin.
 */
add_action('init', function () {
    foreach (['page', 'post'] as $post_type) {
        register_post_meta($post_type, '_yoast_wpseo_title', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'string',
            'auth_callback' => function () {
                return current_user_can('edit_posts');
            },
        ]);

        register_post_meta($post_type, '_yoast_wpseo_metadesc', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'string',
            'auth_callback' => function () {
                return current_user_can('edit_posts');
            },
        ]);
    }
});
