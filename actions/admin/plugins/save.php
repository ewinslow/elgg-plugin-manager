<?php
admin_gatekeeper();

$enabled_plugins = get_input('enabled_plugins');
$plugins = get_input('plugins');

foreach($plugins as $p) {
	// Enable
	if (in_array($p, $enabled_plugins)) {
		if (!is_plugin_enabled($p)) {
			if (enable_plugin($p)) {
				system_message(sprintf(elgg_echo('admin:plugins:enable:yes'), $p));
			} else {
				register_error(sprintf(elgg_echo('admin:plugins:enable:no'), $p));
			}
		}
	} else { //Disable
		if(is_plugin_enabled($p)) {
			if (disable_plugin($p)) {
				system_message(sprintf(elgg_echo('admin:plugins:disable:yes'), $p));
			} else {
				register_error(sprintf(elgg_echo('admin:plugins:disable:no'), $p));
			}
		}
	}
}

if (regenerate_plugin_list($plugins)) {
	system_message(elgg_echo('admin:plugins:reorder:yes'));
} else {
	register_error(elgg_echo('admin:plugins:reorder:no'));
}

elgg_view_regenerate_simplecache();
elgg_filepath_cache_reset();

forward($_SERVER['HTTP_REFERER']);