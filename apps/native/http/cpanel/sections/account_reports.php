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

require_once(cl_full_path("core/apps/cpanel/account_reports/app_ctrl.php"));

$cl['total_reports']   = cl_admin_get_total_profile_reports();
$cl['account_reports'] = cl_admin_get_profile_reports();
$cl['http_res']        = cl_template("cpanel/assets/account_reports/content");