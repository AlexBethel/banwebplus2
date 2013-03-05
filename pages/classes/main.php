<?php
require_once(dirname(__FILE__)."/../../resources/globals.php");
require_once(dirname(__FILE__)."/../../resources/common_functions.php");
my_session_start();
require_once(dirname(__FILE__)."/../../resources/check_logged_in.php");
require_once(dirname(__FILE__)."/../../tabs/tabs_functions.php");

function draw_logout_bar() {
	global $global_user;
	$s_retval = array();
	$s_retval[] = "<table class='logout_bar'><tr><td>";
	$s_retval[] = "Logged in: <font class='logout_label username_label'>".$global_user->get_name()."</font>";
	$s_retval[] = '<font class="logout_button" onmouseover="$(this).addClass(\'mouse_hover\');" onmouseout="$(this).removeClass(\'mouse_hover\');">Logout</font>';
	$s_retval[] = "</td></tr></table>";
	return implode("\n", $s_retval);
}

if ($global_user) {
		if ($global_user->exists_in_db()) {
				$s_drawval = array();
				$s_drawval[] = draw_page_head();
				$s_drawval[] = '<script src="/js/table_functions.js"></script>';
				$s_drawval[] = '<script src="/js/jslists201330.js"></script>';
				$s_drawval[] = '<script src="/js/use_course_list.js"></script>';
				$s_drawval[] = '<script src="/js/course_list.js"></script>';
				$s_drawval[] = '<script src="/js/conflicts.js"></script>';
				$s_drawval[] = '<script src="/js/common_functions.js"></script>';
				$s_drawval[] = '<script src="/js/tab_functions.js"></script>';
				$s_drawval[] = '<script src="/js/schedule.js"></script>';
				$s_drawval[] = '<script src="/js/lists.js"></script>';
				$s_drawval[] = '<link href="/css/auto_table.css" rel="stylesheet" type="text/css">';
				$s_drawval[] = '<link href="/css/tabs.css" rel="stylesheet" type="text/css">';
				$s_drawval[] = '<link href="/css/select.css" rel="stylesheet" type="text/css">';
				$s_drawval[] = draw_logout_bar();
				$s_drawval[] = "<br /><br /><dev id='content'>";
				$s_drawval[] = draw_tabs();
				$s_drawval[] = "</dev>";
				$s_drawval[] = draw_page_foot();
				echo implode("\n", $s_drawval);
		}
} else {
		logout_session();
}
?>