<?php
class Tenantmodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_number_of_viewing_requests($user_id) {
        $query = $this->db->get_where('viewings', array('tenant_id'=>$user_id, 'deleted'=>'0'));
        $count = $query->num_rows();
        return $count;
    }

    public function get_viewing_requests($user_id) {
        // Get new requests first
        $this->db->select('viewings.id AS viewing_id, viewings.property_id AS viewing_property_id, name, email, phone, time_from, time_to, new, recieved, properties.address_1, properties.address_2, properties.city, properties.county, properties.postcode, property_images.file_name');
        $this->db->from('viewings');
        $this->db->where('viewings.tenant_id', $user_id);
        $this->db->where('viewings.deleted', '0');
        $this->db->join('properties', 'properties.id = viewings.property_id');
        $this->db->join('property_images', 'properties.id = property_images.property_id');
        //$this->db->where('property_images.main_image', '1');
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function get_viewing_request($request_id) {
        $this->db->select('viewings.id AS viewing_id, viewings.user_id AS landlord_id, property_id, name, email, phone, time_from, time_to, view_mon, view_tues, view_wed, view_thurs, view_fri, view_sat, view_sun, new, recieved, properties.address_1, properties.address_2, properties.city, properties.county, properties.postcode');
        $this->db->from('viewings');
        $this->db->where('viewings.id', $request_id);
        $this->db->join('properties', 'properties.id = viewings.property_id');
        $query = $this->db->get();
        $data = $query->row_array();
        // Check if there is a message thread associated with this viewing and get it if so
        $data['messages'] = $this->_get_viewing_messages($request_id);
        return $data;
    }

    public function get_saved_properties($user_id) {
        $this->db->select('user_properties.*, property_images.file_name, properties.*');
        $this->db->from('user_properties');
        $this->db->join('properties', 'user_properties.user_properties_property_id = properties.id');
        $this->db->join('property_images', 'user_properties.user_properties_property_id = property_images.property_id');
        $this->db->where('user_properties.user_properties_user_id', $user_id);
        //$this->db->where('property_images.main_image', '1');
        $query = $this->db->get();
        $data = $query->result_array();
        //exit($this->db->last_query());
        return $data;
    }

    public function get_number_of_saved_properties($user_id) {
        $this->db->select('*');
        $this->db->from('user_properties');
        $this->db->where('user_properties_user_id', $user_id);
        $query = $this->db->get();
        $count = $query->num_rows();
        return $count;
    }

    protected function _get_viewing_messages($viewing_id) {
        $this->db->select('*');
        $this->db->from('messages');
        $this->db->where('message_viewing_id', $viewing_id);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

}