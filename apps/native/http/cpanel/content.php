<?php 
# @*************************************************************************@
# @ Software author: TWT                           @
# @ Author_url 1: TWT                       @
# @ Author_url 2: TWT                      @
# @ Author E-mail: demo@mail.com                                    @
# @*************************************************************************@
# @ TWIT - Social Media Platform           @
# @ Copyright (c) All rights reserved.               @
# @*************************************************************************@

if (empty($cl["is_logged"])) {
	cl_redirect("404");
}

else if(empty($cl['is_admin'])) {
	cl_redirect("404");
}

$cl["page_title"] = cl_translate("Control panel");
$cl["page_desc"]  = $cl["config"]["description"];
$cl["page_kw"]    = $cl["config"]["keywords"];
$cl["pn"]         = "cpanel";
$cl["cp_section"] = fetch_or_get($_GET['section'], 'dashboard');
$section_handler  = cl_full_path(cl_strf('apps/native/http/cpanel/sections/%s.php', $cl["cp_section"]));

if (file_exists($section_handler)) {
	require_once($section_handler);

	echo cl_template("cpanel/content");
	exit();
}
else {
	cl_redirect("404");
}

