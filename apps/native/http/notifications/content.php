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

require_once(cl_full_path("core/apps/notifications/app_ctrl.php"));

$cl["page_tab"]   = fetch_or_get($_GET["page"],"notifs");
$cl["page_title"] = cl_translate("Notifications");
$cl["page_desc"]  = $cl["config"]["description"];
$cl["page_kw"]    = $cl["config"]["keywords"];
$cl["pn"]         = "notifications";
$cl["sbr"]        = true;
$cl["sbl"]        = true;
$cl["notifs"]     = cl_get_notifications(array(
	"type"        => $cl["page_tab"],
	"limit"       => 50
));

$cl["total_notifs"] = cl_get_total_notifications($cl["page_tab"]);
$cl["http_res"]     = cl_template("notifications/content");

