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

require_once(cl_full_path("core/apps/cpanel/langs/app_ctrl.php"));

$cl["app_statics"] = array(
	"scripts" => array(
		cl_static_file_path("apps/cpanel/statics/js/libs/bootstrap-select-v1.13.9.min.js"),
		cl_static_file_path("statics/js/libs/jquery-plugins/jquery.form-v4.2.2.min.js")
	),
	"styles" => array(
		cl_static_file_path("apps/cpanel/statics/css/libs/bootstrap-select-v1.13.9.min.css")
	)
);

$cl["ui_langs"] = cl_admin_get_ui_langs();
$cl['http_res'] = cl_template("cpanel/assets/languages/content");