<?php 
/*
 * A Design by W3layouts
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
 *
 */
include "app/config.php";
include "app/detect.php";

if ($page_name=='') {
	include $browser_t.'/index.html';
	}
elseif ($page_name=='index.html') {
	include $browser_t.'/index.html';
	}
elseif ($page_name=='carlights.html') {
	include $browser_t.'/carlights.html';
	}
elseif ($page_name=='carwheels.html') {
	include $browser_t.'/carwheels.html';
	}
elseif ($page_name=='carbumpers.html') {
	include $browser_t.'/carbumpers.html';
	}
elseif ($page_name=='caradsystem.html') {
	include $browser_t.'/caradsystem.html';
	}
elseif ($page_name=='truckbumpers.html') {
	include $browser_t.'/truckbumpers.html';
	}
elseif ($page_name=='contact-post.html') {
	include 'app/contact.php';
	}
else
	{
		include $browser_t.'/404.html';
	}

?>
