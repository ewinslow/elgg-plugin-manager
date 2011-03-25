<?php
/**
 * @uses $vars['js']
 */

if(isset($vars['src'])) {
	$src = $vars['src'];
} else {
	$lastcache = $vars['config']->lastcache;
	$view = urlencode($vars['js']);
	$viewtype = isset($vars['viewtype']) ? $vars['viewtype'] : 'default';
	
	$src = "{$vars['url']}_css/js.php?js=$view&amp;viewtype=$viewtype&amp;lastcache=$lastcache";
}
?>
<script type="text/javascript" src="<?php echo $src; ?>"></script>