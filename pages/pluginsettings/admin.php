<?php

set_context('admin');

$plugin = get_input('plugin');

$title = "$plugin settings";

$area2 = elgg_view_title($title);

$area2 .= elgg_view('object/plugin', array('plugin' => $plugin, 'entity' => find_plugin_settings($plugin)));

$body = elgg_view_layout('two_column_left_sidebar', $area1, $area2);

page_draw($title, $body);