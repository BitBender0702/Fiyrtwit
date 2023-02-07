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

function cl_admin_get_ui_langs() {
	global $db;

    $qr = $db->get(T_UI_LANGS);

    if (cl_queryset($qr)) {
        $langs = array();

        foreach($qr as $lang_data) {
        	$lang_data["usage"]        = cl_admin_get_ui_lang_usage($lang_data["slug"]);
            $langs[$lang_data["slug"]] = $lang_data;
        }

        return $langs;
    }

    return array();
}

function cl_admin_get_ui_lang_usage($lang_name = false) {
	global $db;

	$db = $db->where("active", "1");
	$db = $db->where("language", $lang_name);
    $qr = $db->getValue(T_USERS, "count(*)");

    if (is_posnum($qr)) {
    	return $qr;
    }

    return 0;
}