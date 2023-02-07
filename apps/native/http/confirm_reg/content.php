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

if (not_empty($cl['is_logged'])) {
	cl_redirect('404');
}

else if(empty($_COOKIE["vud_id"])) {
	cl_redirect('404');
}

else{
	$vud_id  = fetch_or_get($_COOKIE["vud_id"], false);
	$vu_data = cl_db_get_item(T_ACC_VALIDS, array(
		"hash" => $vud_id
	));

	if (empty($vu_data)) {
		cl_redirect('404');
	}
}

$cl["page_title"] = cl_translate("Confirm registration");
$cl["page_desc"]  = $cl["config"]["description"];
$cl["page_kw"]    = $cl["config"]["keywords"];
$cl["pn"]         = "confirm_reg";
$cl["sbr"]        = true;
$cl["sbl"]        = true;
$cl["http_res"]   = cl_template("confirm_reg/content");
