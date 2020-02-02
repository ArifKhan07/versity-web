<?php

if (is_admin()) {
    // Admin Only
    require_once(RAFFLEPRESS_PLUGIN_PATH.'app/settings.php');
    require_once(RAFFLEPRESS_PLUGIN_PATH.'app/giveaway.php');
    require_once(RAFFLEPRESS_PLUGIN_PATH.'app/entry.php');
    require_once(RAFFLEPRESS_PLUGIN_PATH.'app/contestant.php');
    if(RAFFLEPRESS_BUILD == 'lite'){
        require_once(RAFFLEPRESS_PLUGIN_PATH.'app/review.php');
    }
} else {
    // Public only
}
  
  
// Load on Public and Admin
require_once(RAFFLEPRESS_PLUGIN_PATH.'app/license.php');
require_once(RAFFLEPRESS_PLUGIN_PATH.'app/rafflepress.php');
require_once(RAFFLEPRESS_PLUGIN_PATH.'app/functions-utils.php');
require_once(RAFFLEPRESS_PLUGIN_PATH.'app/cron.php');
if (function_exists('register_block_type')) {
    require_once(RAFFLEPRESS_PLUGIN_PATH.'app/gblock.php');
}
require_once(RAFFLEPRESS_PLUGIN_PATH.'app/classic-editor.php');
require_once(RAFFLEPRESS_PLUGIN_PATH.'app/standalone.php');
//if (RAFFLEPRESS_BUILD == 'lite') {
    require_once(RAFFLEPRESS_PLUGIN_PATH.'app/includes/upgrade.php');
//}

