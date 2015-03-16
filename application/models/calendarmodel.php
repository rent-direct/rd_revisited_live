<?php
class Calendarmodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function add_calendar_note($data)
    {
        $insert_data = array();
        if (isset($data['viewing_id'])) {
            $insert_data['message_viewing_id'] = $data['viewing_id'];
        }
        if (isset($data['enquiry_id'])) {
            $insert_data['message_enquiry_id'] = $data['enquiry_id'];
        }
        $insert_data['message_landlord_id'] = $data['user_id'];
        $insert_data['message_tenant_id'] = $data['tenant_id'];
        $insert_data['message'] = $data['message'];
        $insert_data['message_datetime'] = date('Y-m-d H:i:s');
        $insert_data['message_seen_landlord'] = '0';
        $insert_data['message_seen_tenant'] = '0';
        $this->db->insert('messages', $insert_data);
    }

}