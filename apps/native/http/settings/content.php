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

$cl["page_title"]    = cl_translate("Account settings");
$cl["page_desc"]     = $cl["config"]["description"];
$cl["page_kw"]       = $cl["config"]["keywords"];
$cl["pn"]            = "settings";
$cl["sbr"]           = true;
$cl["sbl"]           = true;
$cl["blocked_users"] = cl_get_blocked_users();
$cl["settings_app"]  = fetch_or_get($_GET["sapp"], false);
$cl["settings_app"]  = (not_empty($cl["settings_app"])) ? cl_text_secure($cl["settings_app"]) : 0;
$cl["settings_apps"] = array("name", "email", "siteurl", "bio", "gender", "password", "language", "country", "city", "verification", "privacy", "notifications", "blocked", "delete", "information", "email_notifs");

if (not_empty($cl["settings_app"]) && in_array($cl["settings_app"], $cl["settings_apps"])) {

	if ($cl["settings_app"] == "email_notifs" && $cl["config"]["email_notifications"] == "off") {
		cl_redirect("404");
	}
	else{
		$cl["http_res"] = cl_template(cl_strf("settings/includes/%s", $cl["settings_app"]));
	}
}

else{
	$cl["http_res"] = cl_template("settings/content");
}


