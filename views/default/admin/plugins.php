<?php
/**
 * Elgg administration plugin main screen
 *
 * @package Elgg
 * @subpackage Core
 * @author Curverider Ltd
 * @link http://elgg.org/
 */

global $CONFIG;

?>

<form id="elgg-reorder-plugins" action="<?php echo $vars['url']; ?>action/admin/plugins/save" method="post">
	<?php echo elgg_view('input/securitytoken'); ?>
	<div class="contentWrapper">
		<span class="contentIntro">
			<?php echo elgg_view('input/submit', array('value' => elgg_echo('save'))); ?>
			<?php echo elgg_view('output/longtext', array('value' => elgg_echo('admin:plugins:description'))); ?>
		</span>
		<div class="clearfloat"></div>
	</div>
	<div class="plugins_mass_controls">
		<a class="enableallplugins"><?php echo elgg_echo('enableall') ?></a>
		<a class="disableallplugins"><?php echo elgg_echo('disableall') ?></a>
	</div>
</form>
<ul id="plugin_list">
<?php
	// Get the installed plugins
	$installed_plugins = $vars['installed_plugins'];
	$count = count($installed_plugins);
	
	$plugin_list = get_plugin_list();
	$max = 0;
	foreach($plugin_list as $key => $foo) {
		if ($key > $max) $max = $key;
	}
	
	// Display list of plugins
	foreach ($installed_plugins as $plugin => $data) {
		echo '<li>'.elgg_view("admin/plugins_opt/plugin", array('plugin' => $plugin, 'details' => $data, 'maxorder' => $max, 'order' => array_search($plugin, $plugin_list))).'</li>';
	}
?>
</ul>