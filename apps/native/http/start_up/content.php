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

else if($me["start_up"] == "done") {
	cl_redirect("home");
}

else {
	$rand_number = rand(1, 15);

	cl_update_user_data($me["id"], array(
		"avatar" => cl_strf("upload/default/avatar-%d.png", $rand_number),
		"cover" => cl_strf("upload/default/cover-%d.png", $rand_number),
		"cover_orig" => cl_strf("upload/default/cover-%d.png", $rand_number)
	));

	$me["avatar"]      = cl_get_media(cl_strf("upload/default/avatar-%d.png", $rand_number));
	$cl["page_title"]  = cl_translate("Completion of registration");
	$cl["page_desc"]   = $cl["config"]["description"];
	$cl["page_kw"]     = $cl["config"]["keywords"];
	$cl["pn"]          = "start_up";
	$cl["sbr"]         = true;
	$cl["sbl"]         = true;
	$cl["suggestions"] = cl_get_follow_suggestions(20);;
	$cl["http_res"]    = cl_template("start_up/content");
}