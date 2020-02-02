<?php


/**
 * Postback Routes
 */




/**
 * Rewrite EndPoints Routes
 */

add_action('init', 'rafflepress_lite_add_rules');

function rafflepress_lite_add_rules()
{
    add_rewrite_rule(

      '^rafflepress/([0-9]+)/?',
        'index.php?rafflepress_page=rafflepress_render&rafflepress_id=$matches[1]',
      'top'
  );
    add_rewrite_rule(
    '^rp/([0-9]+)/?',
      'index.php?rafflepress_page=rafflepress_render&rafflepress_id=$matches[1]',
    'top'
);
}


function rafflepress_lite_add_custom_slug($slug)
{
    if (!empty($slug)) {
        add_rewrite_rule(
        '^'.$slug.'/([0-9]+)/?',
        'index.php?rafflepress_page=rafflepress_render&rafflepress_id=$matches[1]',
        'top'
    );
        flush_rewrite_rules();
    }
}

// Add the vars so that WP recognizes it
add_filter('query_vars', 'rafflepress_lite_add_query_var');

function rafflepress_lite_add_query_var($vars)
{
    $vars[] = 'rafflepress_page';
    $vars[] = 'rafflepress_id';
    return $vars;
}

add_action('template_redirect', 'rafflepress_lite_routes');

function rafflepress_lite_routes()
{
    $rafflepress_id = get_query_var('rafflepress_id');
    if (!empty($rafflepress_id)) {
        //$rafflepress_id = get_query_var('rafflepress_id');
        if (ob_get_contents()){
          ob_end_clean();
        }
        nocache_headers();

        require_once(RAFFLEPRESS_PLUGIN_PATH.'resources/views/rafflepress-giveaway.php');
        exit();
    }
}


/**
 * Admin Menu Routes
 */

add_action('admin_menu', 'rafflepress_lite_create_menus');

function rafflepress_lite_create_menus()
{
    add_menu_page(
    'RafflePress', 
    'RafflePress', 
    'edit_others_posts',
    'rafflepress_lite',
    'rafflepress_lite_dashboard_page',
    RAFFLEPRESS_PLUGIN_URL . 'public/img/menu-logo.png',
    200
  );

    add_submenu_page(
    'rafflepress_lite',
    __("Giveaways", 'rafflepress'),
    __("Giveaways", 'rafflepress'),
    'edit_others_posts',
    'rafflepress_lite',
    'rafflepress_lite_dashboard_page'
  );


    add_submenu_page(
    'rafflepress_lite',
    __("Add New", 'rafflepress'),
    __("Add New", 'rafflepress'),
    'edit_others_posts',
    'rafflepress_lite_add_new',
    'rafflepress_lite_add_new_page'
  );

    add_submenu_page(
    'rafflepress_lite',
    __("Settings", 'rafflepress'),
    __("Settings", 'rafflepress'),
    'edit_others_posts',
    'rafflepress_lite_settings',
    'rafflepress_lite_settings_page'
  );

    add_submenu_page(
    'rafflepress_lite',
    __("About Us", 'rafflepress'),
    __("About Us", 'rafflepress'),
    'read',
    'rafflepress_lite_about_us',
    'rafflepress_lite_about_us_page'
  );


    if (RAFFLEPRESS_BUILD == 'lite') {
        add_submenu_page(
    'rafflepress_lite',
    __("Get Pro", 'rafflepress'),
    '<span style="color:#ff845b">'.__("Get Pro", 'rafflepress').'</span>',
    'read',
    'rafflepress_lite_get_pro',
    'rafflepress_lite_get_pro_page'
  );
    }


    add_submenu_page(
    'rafflepress_lite',
    __("Builder", 'rafflepress'),
    __("Builder", 'rafflepress'),
    'read',
    'rafflepress_lite_builder',
    'rafflepress_lite_builder_page'
  );
}

add_action('admin_head', 'rafflepress_lite_remove_menus');

function rafflepress_lite_remove_menus()
{
    remove_submenu_page('rafflepress_lite', 'rafflepress_lite_builder');
}

function rafflepress_lite_dashboard_page()
{
    require_once(RAFFLEPRESS_PLUGIN_PATH.'resources/views/dashboard.php');
}


function rafflepress_lite_builder_page()
{
    require_once(RAFFLEPRESS_PLUGIN_PATH.'resources/views/builder.php');
}

/* Short circuit new request */

add_action('admin_init', 'rafflepress_lite_new_giveaway', 1);


/* Redirect to SPA */

add_action('admin_init', 'rafflepress_lite_redirect_to_site', 1);

function rafflepress_lite_redirect_to_site()
{
    // settings page
    if (isset($_GET['page']) && $_GET['page'] == 'rafflepress_lite_settings') {
        wp_redirect('admin.php?page=rafflepress_lite#/settings');
        exit();
    }
    // add new page
    if (isset($_GET['page']) && $_GET['page'] == 'rafflepress_lite_add_new') {
        wp_redirect('admin.php?page=rafflepress_lite_builder&id=0#/template');
        exit();
    }

    //  about us page
    if (isset($_GET['page']) && $_GET['page'] == 'rafflepress_lite_about_us') {
        wp_redirect('admin.php?page=rafflepress_lite#/aboutus');
        exit();
    }

    // getpro page
    if (isset($_GET['page']) && $_GET['page'] == 'rafflepress_lite_get_pro') {
        wp_redirect(rafflepress_lite_upgrade_link('wp-sidebar-menu'));
        exit();
    }
}

/**
 * Ajax Request Routes
 */

if (defined('DOING_AJAX')) {
    add_action('wp_ajax_rafflepress_lite_dismiss_settings_lite_cta', 'rafflepress_lite_dismiss_settings_lite_cta');
    add_action('wp_ajax_rafflepress_lite_save_settings', 'rafflepress_lite_save_settings');
    add_action('wp_ajax_rafflepress_lite_save_api_key', 'rafflepress_lite_save_api_key');
    add_action('wp_ajax_rafflepress_lite_save_template', 'rafflepress_lite_save_template');
    add_action('wp_ajax_rafflepress_lite_save_giveaway', 'rafflepress_lite_save_giveaway');
    add_action('wp_ajax_rafflepress_lite_save_slug', 'rafflepress_lite_save_slug');
    add_action('wp_ajax_rafflepress_lite_get_utc_offset', 'rafflepress_lite_get_utc_offset');
    add_action('wp_ajax_rafflepress_lite_save_publish', 'rafflepress_lite_save_publish');
    add_action('wp_ajax_rafflepress_lite_giveaway_datatable', 'rafflepress_lite_giveaway_datatable');
    add_action('wp_ajax_rafflepress_lite_duplicate_giveaway', 'rafflepress_lite_duplicate_giveaway');
    add_action('wp_ajax_rafflepress_lite_get_giveaway_list', 'rafflepress_lite_get_giveaway_list');
    add_action('wp_ajax_rafflepress_lite_archive_selected_giveaways', 'rafflepress_lite_archive_selected_giveaways');
    add_action('wp_ajax_rafflepress_lite_unarchive_selected_giveaways', 'rafflepress_lite_unarchive_selected_giveaways');
    add_action('wp_ajax_rafflepress_lite_delete_archived_giveaways', 'rafflepress_lite_delete_archived_giveaways');
    add_action('wp_ajax_rafflepress_lite_end_giveaway', 'rafflepress_lite_end_giveaway');
    add_action('wp_ajax_rafflepress_lite_start_giveaway', 'rafflepress_lite_start_giveaway');
    add_action('wp_ajax_rafflepress_lite_enable_disable_giveaway', 'rafflepress_lite_enable_disable_giveaway');

    add_action('wp_ajax_rafflepress_lite_ps_results_datatable', 'rafflepress_lite_ps_results_datatable');
    add_action('wp_ajax_rafflepress_lite_entries_datatable', 'rafflepress_lite_entries_datatable');
    add_action('wp_ajax_rafflepress_lite_valid_selected_entries', 'rafflepress_lite_valid_selected_entries');
    add_action('wp_ajax_rafflepress_lite_invalid_selected_entries', 'rafflepress_lite_invalid_selected_entries');
    add_action('wp_ajax_rafflepress_lite_delete_invalid_entries', 'rafflepress_lite_delete_invalid_entries');
    add_action('wp_ajax_rafflepress_lite_pick_winners', 'rafflepress_lite_pick_winners');


    add_action('wp_ajax_rafflepress_lite_contestants_resend_email', 'rafflepress_lite_contestants_resend_email');
    add_action('wp_ajax_rafflepress_lite_contestants_datatable', 'rafflepress_lite_contestants_datatable');
    add_action('wp_ajax_rafflepress_lite_confirm_selected_contestants', 'rafflepress_lite_confirm_selected_contestants');
    add_action('wp_ajax_rafflepress_lite_unconfirm_selected_contestants', 'rafflepress_lite_unconfirm_selected_contestants');
    add_action('wp_ajax_rafflepress_lite_invalid_selected_contestants', 'rafflepress_lite_invalid_selected_contestants');
    add_action('wp_ajax_rafflepress_lite_delete_invalid_contestants', 'rafflepress_lite_delete_invalid_contestants');

    add_action('wp_ajax_rafflepress_lite_get_font', 'rafflepress_lite_get_font');
    add_action('wp_ajax_rafflepress_lite_get_plugins_list', 'rafflepress_lite_get_plugins_list');

    add_action('wp_ajax_rafflepress_lite_install_addon', 'rafflepress_lite_install_addon');
    add_action('wp_ajax_rafflepress_lite_activate_addon', 'rafflepress_lite_activate_addon');
    add_action('wp_ajax_rafflepress_lite_deactivate_addon', 'rafflepress_lite_deactivate_addon');

    add_action('wp_ajax_rafflepress_lite_install_addon', 'rafflepress_lite_install_addon');
    add_action('wp_ajax_rafflepress_lite_deactivate_addon', 'rafflepress_lite_deactivate_addon');
    add_action('wp_ajax_rafflepress_lite_activate_addon', 'rafflepress_lite_activate_addon');
    add_action('wp_ajax_rafflepress_lite_plugin_nonce', 'rafflepress_lite_plugin_nonce');

    add_action('wp_ajax_rafflepress_lite_giveaway_api', 'rafflepress_lite_giveaway_api');
    add_action('wp_ajax_nopriv_rafflepress_lite_giveaway_api', 'rafflepress_lite_giveaway_api');

    add_action('wp_ajax_nopriv_rafflepress_lite_run_one_click_upgrade', 'rafflepress_lite_run_one_click_upgrade');
    add_action('wp_ajax_rafflepress_lite_upgrade_license', 'rafflepress_lite_upgrade_license');
}

