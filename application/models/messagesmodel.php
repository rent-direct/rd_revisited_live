<?php
class Messagesmodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function add_new_message($data)
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

    public function add_message($message_data) {
        $message_data['message_seen_landlord'] = '0';
        $message_data['message_seen_tenant'] = '0';
        $this->db->insert('messages', $message_data);
    }

    public function refresh_viewing_messages($viewing_id) {
        $now = date('Y-m-d H:i:s');
        $this->db->select('*');
        $this->db->from('messages');
        $this->db->where('message_viewing_id', $viewing_id);
        $this->db->order_by('message_datetime', 'asc');
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function contact_us($data)
    {
        $data['new'] = 1;
        $data['datetime_received'] = date('Y-m-d H:i:s');
        $this->db->insert('contactus_inbox', $data);
    }

    public function send_quick_contact($data)
    {
        //$data['new'] = 1;
        $data['datetime_received'] = date('Y-m-d H:i:s');
        $this->db->insert('messages_quickcontact', $data);
    }

    function send_quick_contact_ajax($name, $phone, $email, $body, $prop_id, $landlord_id, $tenant_id)
    {
        $query = "INSERT INTO messages_quickcontact (name, phone, email, message, prop_id, landlord_id, tenant_id, datetime_received) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $datetime_received = date('Y-m-d H:i:s');

        $this->db->query($query, array($name, $phone, $email, $body, $prop_id, $landlord_id, $tenant_id,$datetime_received));
    }

    function get_all_inbox_messages($id)
    {
        // todo: needs security so grab user_id and use if statement

        $this->db->select('*');
        $this->db->from('messages_quickcontact');
        $this->db->where('landlord_id', $id);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function get_landlord_nav_messages($id,$limit)
    {
        $this->db->select('*');
        $this->db->from('messages_quickcontact');
        $this->db->order_by('datetime_received', 'DESC');
        $this->db->where('landlord_id', $id);
        $this->db->limit($limit); //test, otherwise remove RANDOM and think of some other method
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function grab_single_message($msg_id,$user_id='default')
    {
        $this->db->select('*');
        $this->db->from('messages_quickcontact');
        //$this->db->where('landlord_id', $user_id);
        $this->db->where('message_id', $msg_id);
        $query = $this->db->get();
        $data = $query->row_array();
        return $data;
    }

    public function get_overall_message_count($user_id)
    {
        $this->db->select('*');
        $this->db->from('messages_quickcontact');
        $this->db->where('landlord_id', $user_id);
        $query = $this->db->get();
        $data = $query->num_rows();
        return $data;
    }


}