<?php

function rafflepress_lite_standalone_redirect()
{
    try {
        global $wpdb;
        $wpdb->suppress_errors = true;
        $tablename = $wpdb->prefix .  'rafflepress_giveaways';
        $path = rtrim(ltrim($_SERVER['REQUEST_URI'], '/'), '/');
        $path = preg_replace('/\?.*/', '', $path);



        $url = home_url();

        $r = array_intersect(explode('/', $path), explode('/', $url));

        $path = str_replace($r, '', $path);

        $path = str_replace('/', '', $path);

        if (!empty($path)) {
            $sql = "SELECT id FROM $tablename WHERE slug = %s";
            $safe_sql = $wpdb->prepare($sql, $path);
            $giveaway_id =$wpdb->get_var($safe_sql);

            if (!empty($giveaway_id)) {
                $rafflepress_id = $giveaway_id;
                if (ob_get_contents()){
                    ob_end_clean();
                }
                nocache_headers();
                header("HTTP/1.1 200 OK");
                require_once(RAFFLEPRESS_PLUGIN_PATH.'resources/views/rafflepress-giveaway.php');
                exit();
            }
        }
    } catch (Exception $e) {
        //echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}
add_action('template_redirect', 'rafflepress_lite_standalone_redirect');