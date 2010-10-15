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

<form action="<?php echo $vars['url']; ?>action/admin/plugins/save" method="post">
	<?php echo elgg_view('input/securitytoken'); ?>
	<div class="contentWrapper">
		<div class="plugins_mass_controls">
			<a class="enableallplugins"><?php echo elgg_echo('enableall') ?></a>
			<a class="disableallplugins"><?php echo elgg_echo('disableall') ?></a>
			<?php echo elgg_view('input/button', array('type'=>'button','class'=>'extensiontestplugins submit_button','value' => elgg_echo('admin:plugins:extension'))); ?>
                        <?php echo elgg_view('input/submit', array('value' => elgg_echo('save'))); ?>
                        
		</div>
		<span class="contentIntro">
			<?php echo elgg_view('output/longtext', array('value' => elgg_echo('admin:plugins:description'))); ?>
		</span>
		<div class="clearfloat"></div>

	<?php
		// Get the installed plugins
		$installed_plugins = $vars['installed_plugins'];
		$count = count($installed_plugins);
		
		$plugin_list = get_plugin_list();
		$max = 0;
		foreach($plugin_list as $key => $foo) {
			if ($key > $max) $max = $key;
		}

                $plugins_list = get_input('plugins_list');
                print_r($plugins_list);
                // prepare string of active plugin
                $plugins_list = array();
                foreach ($installed_plugins as $plugin => $data) {
                    if ($data['active']){
                        $plugins_list[] = $plugin;
                    }
                }
                $plugins_string = implode(", ",$plugins_list);
                

	?>
	<div class="pluginsettings" id="extensionTestBox"><label
		for="plugins_list"><?php echo elgg_echo('admin:plugins:plugins_name_list') ?>:
	</label><br>
	
			<?php echo elgg_view('input/plaintext', array('internalid'=>"plugins_list",'internalname'=>"plugins_list",'value' => $plugins_string)); ?>
	<br>
			<?php echo elgg_view('input/button', array('type'=>'submit','internalid'=>"extension_test_button",'class'=>'submit_button','value' => elgg_echo('admin:plugins:apply'))); ?>
			<?php echo elgg_view('input/button', array('type'=>'button','internalid'=>"extension_test_clear",'class'=>'submit_button','value' => elgg_echo('admin:plugins:clear_list'))); ?>
			<?php echo elgg_view('input/button', array('type'=>'reset','internalid'=>"extension_test_reset",'class'=>'submit_button','value' => elgg_echo('admin:plugins:reset_list'))); ?>
			<?php echo elgg_view('input/button', array('type'=>'button','internalid'=>"extension_test_copy",'class'=>'submit_button','value' => elgg_echo('admin:plugins:select_list'))); ?>
	
	</div>
</div>
    <?php
		// Display list of plugins
		echo "<ul id='plugins'>";
		foreach ($installed_plugins as $plugin => $data) {
			echo "<li>".elgg_view("admin/plugins_opt/plugin", array('plugin' => $plugin, 'details' => $data, 'maxorder' => $max, 'order' => array_search($plugin, $plugin_list)))."</li>";
		}
		echo "</ul>";
	?>
</form>