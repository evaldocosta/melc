<?php
//------------------------------------------------------------------------------
umask(002); // Added to make created files/dirs group writable
//------------------------------------------------------------------------------
require "./.include/init.php";	// Init
//------------------------------------------------------------------------------
switch($GLOBALS["action"]) {		// Execute action
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
// DELETE FILE(S)/DIR(S)
case "delete":
	require "./.include/fun_del.php";
	del_items($GLOBALS["dir"]);
break;
//------------------------------------------------------------------------------
// DOWNLOAD FILE
case "download":
	ob_start(); // prevent unwanted output
	require "./.include/fun_down.php";
	ob_end_clean(); // get rid of cached unwanted output
	download_item($GLOBALS["dir"], $GLOBALS["item"]);
	ob_start(false); // prevent unwanted output
	exit;
break;
//------------------------------------------------------------------------------
// DEFAULT: LIST FILES & DIRS
case "list":
default:
	require "./.include/fun_list.php";
	list_dir($GLOBALS["dir"]);
//------------------------------------------------------------------------------
}				// end switch-statement
//------------------------------------------------------------------------------
//show_footer();
//------------------------------------------------------------------------------
?>
