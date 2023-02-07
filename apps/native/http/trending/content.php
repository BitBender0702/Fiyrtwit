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

$cl["page_title"] = cl_translate("Hot topics");
$cl["page_desc"]  = $cl["config"]["description"];
$cl["page_kw"]    = $cl["config"]["keywords"];
$cl["pn"]         = "trending";
$cl["sbr"]        = true;
$cl["sbl"]        = true;
$cl["htags"]      = cl_get_hot_topics(30);
$cl["http_res"]   = cl_template("trending/content");
