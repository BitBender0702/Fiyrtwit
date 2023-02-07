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

	require_once(cl_full_path("core/apps/wallet/app_ctrl.php"));

	if ($cl['config']['stripe_method_status'] == 'on') {	
		$cl["app_statics"] = array(
			"scripts" => array(
				cl_js_template("statics/js/libs/Stripe/stripe")
			)
		);
	}

	$cl["page_title"]     = cl_translate("Wallet");
	$cl["page_desc"]      = $cl["config"]["description"];
	$cl["page_kw"]        = $cl["config"]["keywords"];
	$cl["pn"]             = "wallet";
	$cl["sbr"]            = true;
	$cl["sbl"]            = true;
	$cl["wallet_history"] = cl_get_account_wallet_history();
	$cl["http_res"]       = cl_template("wallet/content");
}