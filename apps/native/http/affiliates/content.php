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
	cl_redirect("guest");
}

else {
	$cl["page_title"] = cl_translate('Affiliates');
	$cl["page_desc"]  = $cl["config"]["description"];
	$cl["page_kw"]    = $cl["config"]["keywords"];
	$cl["pn"]         = "affiliates";
	$cl["sbr"]        = true;
	$cl["sbl"]        = true;

	if ($cl['config']['affiliates_system'] == 'off') {
		$cl["http_res"] = cl_template("affiliates/includes/systemoff");
	}

	else {

		require_once(cl_full_path("core/apps/affiliates/app_ctrl.php"));

		$cl["payout_history"] = cl_get_affiliate_payouts();
		$cl["http_res"]       = cl_template("affiliates/content");
	}
}