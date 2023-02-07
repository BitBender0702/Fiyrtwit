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

require_once(cl_full_path("core/apps/cpanel/affiliate_payouts/app_ctrl.php"));

$cl['total_requests'] = cl_get_affiliate_payouts_total();
$cl['requests']       = cl_get_affiliate_payouts();
$cl['http_res']       = cl_template("cpanel/assets/affiliate_payouts/content");