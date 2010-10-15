<?php
/**
 * reorder plugins list from comma separated string
 */

$plugins = get_input('plugins');

$plugins_list = get_input('plugins_list', '');
$plugins_list = explode(",", $plugins_list);

// whitespace stripped from the beginning and end of element's value
foreach ($plugins_list as $key => $value){
	$plugins_list[$key] = trim($value);
	if (empty($plugins_list[$key])) {
		unset($plugins_list[$key]);
	}
}

//Removes duplicate values from an array
$plugins_list = array_unique($plugins_list);

//disabled all plugins
foreach($plugins as $p) {
	if (is_plugin_enabled($p) && !in_array($p, $plugins_list)) {
		if (disable_plugin($p)){
			system_message(sprintf(elgg_echo('admin:plugins:disable:yes'), $p));
		} else {
			register_error(sprintf(elgg_echo('admin:plugins:disable:no'), $p));
		}
	}
}

//enabled plugins from list
foreach ($plugins_list as $p){
	if (in_array($p, $plugins) && !is_plugin_enabled($p)){
		if (enable_plugin($p)){
			system_message(sprintf(elgg_echo('admin:plugins:enable:yes'), $p));
		} else {
			register_error(sprintf(elgg_echo('admin:plugins:enable:no'), $p));
		}
	}
}

// generate new plugins array with orders from list
$new_plugins_list = array_merge($plugins_list, array_diff($plugins, $plugins_list));

if (regenerate_plugin_list($new_plugins_list)) {
	system_message(elgg_echo('admin:plugins:reorder:yes'));
} else {
	register_error(elgg_echo('admin:plugins:reorder:no'));
}

elgg_view_regenerate_simplecache();
elgg_filepath_cache_reset();

forward(REFERER);