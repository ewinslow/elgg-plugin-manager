<?php
	function plugin_manager_init() {
		global $CONFIG;
		
	    if (get_context() == 'admin') {
	    	extend_view('metatags', 'links/admin/plugins');
	    	extend_view('metatags', 'scripts/admin/plugins');
	    	extend_view('metatags', 'links/jquery/ui');
	    }
	    
		elgg_view_register_simplecache('js/admin/plugins');
	    
		register_action('admin/plugins/save', false, $CONFIG->pluginspath."plugin_manager/actions/admin/plugins/save.php" );
	}
	
	register_elgg_event_handler('init', 'system', 'plugin_manager_init');
		
