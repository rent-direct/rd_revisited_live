<?php

class Landlordmodel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    //Get the properties ALL
    public function get_props()
    {
        $query = $this->db->get('properties');
        return $query->result_array();
    }

    //---------MAIN PROP INSERT----------
    public function insert($row)
    {
        $this->db->insert('properties',$row);
//        $prop_id = $this->db->insert_id();
//        return $prop_id;
        $query = $this->db->query('SELECT LAST_INSERT_ID()');
        $row = $query->row_array();
        return $row['LAST_INSERT_ID()'];
    }

    public function get_id()
    {
        $id = $this->db->insert_id();
        return $id;
    }

    //gets the user id
    public function get_user_id()
    {
       // $users_id = $this->db->field_data('users');
        $userId = $this->ion_auth->get_user_id();
        return $userId;
    }

    //Viewing Function for landlord backend
    public function add_viewing($data)
    {
        $data['new'] = 1;
        $data['recieved'] = date('Y-m-d');
        $this->db->insert('viewings', $data);
    }

    /**
     * @param $prop_id
     * @param $filename
     * @param $thumb
     * Used on the main add prop form
     */
    function primary_prop_image($id, $filename, $thumb){
        $this->db->where('id', $id);
        $arr = array(
            'main_image'=> $filename,
            'thumb_file_name' => $thumb
        );
        $this->db->update('properties', $arr);
    }

    /**
     * @param $prop_id
     * @param $filename
     * Updates where the prop image will take place
     */
    function headliner_prop_image($id, $filename){
        $this->db->where('id', $id);
        $arr = array(
            'headliner_file_name'=> $filename
        );
        $this->db->update('properties', $arr);
    }

    /**
     * @param $row
     * @param $prop_id
     * @return mixed
     * Used for adding property form data
     */
    public function update($row,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('properties',$row);
        return $this->db->insert_id();
    }

    /**
     * Generates a 15 char random key - alphanumerical
     * Using to make generic id's for props, maybe images, etc for the database
     */
    public function randKey()
    {
        $randKey = substr(sha1(mt_rand()),17,15);
        return $randKey;
    }

    public function get_prop_id($id)
    {
        $this->db->select('*');
        $this->db->from('properties');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['prop_id'];
    }

    public function get_prop_slug($id)
    {
        $this->db->select('*');
        $this->db->from('properties');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['slug'];
    }

    public function insert_gallery_images($prop_id, $filename)
    {
        $data = array(
            'property_id' => $prop_id,
            'main_image' => 0,
            'file_name' => $filename
        );
        $this->db->insert('property_gallery', $data);
    }

    public function get_all_gallery_images($id)
    {
        $this->db->select('*');
        $this->db->from('property_gallery');
        $this->db->where('property_id =', $id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function get_viewing_requests($user_id)
    {
        // Get new requests first
        $this->db->select('viewings.id AS viewing_id, property_id, name, email, phone, time_from, time_to, new, recieved, properties.address_1, properties.address_2, properties.city, properties.county, properties.postcode, properties.thumb_file_name, properties.title');
        $this->db->from('viewings');
        $this->db->where('viewings.user_id', $user_id);
        $this->db->join('properties', 'properties.id = viewings.property_id');
        $this->db->where('viewings.new', '1');
        $this->db->where('viewings.deleted', '0');
        $query = $this->db->get();
        $data['new'] = $query->result_array();
        // Now the seen ones$this->data['request_data']
        $this->db->select('viewings.id AS viewing_id, property_id, name, email, phone, time_from, time_to, new, recieved, properties.address_1, properties.address_2, properties.city, properties.county, properties.postcode');
        $this->db->from('viewings');
        $this->db->where('viewings.user_id', $user_id);
        $this->db->join('properties', 'viewings.property_id = properties.id');
        $this->db->where('viewings.new', '0');
        $this->db->where('viewings.deleted', '0');
        $query = $this->db->get();
        $data['seen'] = $query->result_array();
        return $data;
    }

    public function get_viewing_request($request_id)
    {
        $this->db->select('viewings.id AS viewing_id, property_id, tenant_id, viewings.user_id AS landlord_id, name, email, phone, time_from, time_to, view_mon, view_tues, view_wed, view_thurs, view_fri, view_sat, view_sun, new, recieved, properties.address_1, properties.address_2, properties.city, properties.county, properties.postcode, properties.term_type, properties.term_length_number, properties.rent, properties.rent_type, properties.bond, properties.country, properties.address_3');
        $this->db->from('viewings');
        $this->db->where('viewings.id', $request_id);
        $this->db->join('properties', 'properties.id = viewings.property_id');
        $query = $this->db->get();
        $data = $query->row_array();
        // Check if there is a message thread associated with this viewing and get it if so
        $data['messages'] = $this->_get_viewing_messages($request_id);
        return $data;
    }

    protected function _get_viewing_messages($viewing_id)
    {
        $this->db->select('*');
        $this->db->from('messages');
        $this->db->where('message_viewing_id', $viewing_id);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function get_user_details($id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

    public function add_landlord_prop_count($id)
    {
        // TODO: WHAT ABOUT DELETION???
        $this->db->where('id', $id);
        $this->db->set('prop_count', 'prop_count+1', FALSE);
        $this->db->update('users');
    }

    public function set_expire_date($id)
    {
        $this->db->where('id', $id);
        $date =  $datetime_end = date('Y-m-d H:i:s', strtotime("+30 days -1 hour"));
        $this->db->set('user_sub_expire_date', $date);
        $this->db->update('properties');
    }

    public function get_listed_properties_count($user_id)
    {
        $this->db->select('*');
        $this->db->from('properties');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        $data = $query->num_rows();
        return $data;
    }

    public function get_overall_viewing_req_count($user_id)
    {
        $this->db->select('*');
        $this->db->from('viewings');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        $data = $query->num_rows();
        return $data;
    }






}