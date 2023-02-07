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

if (empty($cl['is_logged'])) {
	cl_redirect("guest");
}

else {
	require_once(cl_full_path("core/apps/bookmarks/app_ctrl.php"));

	$cl["page_title"] = cl_translate("Bookmarks");
	$cl["page_desc"]  = $cl["config"]["description"];
	$cl["page_kw"]    = $cl["config"]["keywords"];
	$cl["pn"]         = "bookmarks";
	$cl["sbr"]        = true;
	$cl["sbl"]        = true;
	$cl["bookmarks"]  = cl_get_bookmarks($me['id'], 30);
	$cl["http_res"]   = cl_template("bookmarks/content");
}