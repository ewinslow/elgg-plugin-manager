<?php ?>

.plugin_manager_move_plugin {
	display: inline-block;
	width: 14px;
	height: 14px;
	background: url("<?php echo $vars['url']; ?>mod/plugin_manager/_graphics/reorder.png") no-repeat 50px 0;	
}

.plugin_manager_move_plugin.move_top{
	background-position: 0 -14px;
	cursor: pointer;
}

.plugin_manager_move_plugin.move_top:hover{
	background-position: 0 0;
	cursor: pointer;
}

.plugin_manager_move_plugin.move_up{
	background-position: -14px -14px;
	cursor: pointer;
}

.plugin_manager_move_plugin.move_up:hover{
	background-position: -14px 0;
	cursor: pointer;
}

.plugin_manager_move_plugin.move_down{
	background-position: -28px -14px;
	cursor: pointer;
}

.plugin_manager_move_plugin.move_down:hover{
	background-position: -28px 0;
	cursor: pointer;
}

.plugin_manager_move_plugin.move_bottom{
	background-position: -42px -14px;
	cursor: pointer;
}

.plugin_manager_move_plugin.move_bottom:hover{
	background-position: -42px 0;
	cursor: pointer;
}

.plugin_reordering {
	float: right;
	margin-top: 5px;
}

.plugin_details {
	margin: 0 10px 2px;
}

.plugin_details h3{
	display: inline;
}

.plugin_details.not-active {
	border-color: transparent;
}

.plugin_details:hover {
	border-color: #333333;
}

.plugin_details.not-active .manifest_file{
	background-color: white;
}
.admin_plugin_reorder a{
	padding: 0px;
}

.manifest_version {
	color: transparent;
}

.plugin_details:hover .manifest_version{
	color: #4690D6;
}

.plugin_details form {
	display: inline;
}

.plugin_details input[type='checkbox'] {
	cursor: pointer;
	border: none;
}

.plugin_details a.pluginsettings_link {
	font-weight: bold;
}

.plugin_details a.manifest_details {
	color: gray;
}