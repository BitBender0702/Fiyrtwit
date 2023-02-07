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

if (empty($cl['is_logged'])) {
	$data         = array(
		'code'    => 401,
		'data'    => array(),
		'message' => 'Unauthorized Access'
	);
}
else {
	$message_id = fetch_or_get($_POST['message_id'], 0);
	
    if (is_posnum($message_id) != true) {
        $data['code']    = 400;
        $data['message'] = "Message ID is missing or invalid";
        $data['data']    = array();
    }

    else {
        $msg_data = cl_db_get_item(T_MSGS, array("id" => $message_id));

        if (empty($msg_data) || ($msg_data['sent_by'] != $me['id'] && $msg_data['sent_to'] != $me['id'])) {
            $data['code']    = 400;
            $data['message'] = "A message with this ID was not found. Please check your details!";
            $data['data']    = array();
        }

        else {
            $data["code"]    = 200;
            $data["message"] = "Message deleted successfully";
            $data["data"]    = array();

            if ($msg_data['sent_by'] == $me['id']) {
                if ($msg_data['deleted_fs2'] == 'Y') {
                    cl_db_delete_item(T_MSGS, array(
                        'id' => $message_id
                    ));

                    if (not_empty($msg_data['media_file'])) {
                        cl_delete_media($msg_data['media_file']);
                    }
                }
                else {
                    $db = $db->where('id', $message_id);
                    $qr = $db->update(T_MSGS, array(
                        'deleted_fs1' => 'Y'
                    ));
                }
            }

            else{
                if ($msg_data['deleted_fs1'] == 'Y') {
                    cl_db_delete_item(T_MSGS, array(
                        'id' => $message_id
                    ));

                    if (not_empty($msg_data['media_file'])) {
                        cl_delete_media($msg_data['media_file']);
                    }
                }
                else{
                    $db = $db->where('id', $message_id);
                    $qr = $db->update(T_MSGS, array(
                        'deleted_fs2' => 'Y'
                    ));
                }
            } 
        }
    }
}