<?php

class Auditmodel extends CI_Model
{


    function __construct()
    {
        parent::__construct();
    }

    public function log_property_view($property_id) {
        $data = array('property_views_property_id'=>$property_id, 'property_views_date'=>date('Y-m-d'));
        $this->db->insert('property_views', $data);
    }

    public function get_property_views($property_id) {
        $this->db->select('property_views_id');
        $this->db->from('property_views');
        $this->db->where('property_views_property_id', $property_id);
        $query = $this->db->get();
        $num_views = $query->num_rows();
        return $num_views;
    }

    public function get_property_saves($property_id) {
        $this->db->select('user_properties_id');
        $this->db->from('user_properties');
        $this->db->where('user_properties_property_id', $property_id);
        $query = $this->db->get();
        $num_saves = $query->num_rows();
        return $num_saves;
    }

    public function add_property_share($share_data) {
        $data['property_shares_property_id'] = $share_data['property_id'];
        $data['property_shares_type'] = $share_data['share_type'];
        $data['property_shares_date'] = date('Y-m-d');
        $this->db->insert('property_shares', $data);
        return true;
    }

    public function get_property_shares($property_id) {
        $this->db->select('property_shares_id');
        $this->db->from('property_shares');
        $this->db->where('property_shares_property_id', $property_id);
        $query = $this->db->get();
        $num_saves = $query->num_rows();
        return $num_saves;
    }

    public function add_audit_item($data) {
        $this->db->insert('audit', $data);
    }

    public function fetch_audit_items() {
        $query = $this->db->get_where('audit', array('audit_item_fetched'=>'0'));
        $data = $query->result_array();
        if (!empty($data)) {

            // Mark each audit item as fetched
            $update_data = array('audit_item_fetched'=>'1');
            $this->db->where('audit_item_fetched', '0');
            $this->db->update('audit', $update_data);
        }

        return $data;
    }

    public function add_brochure_download($property_id) {
        $data['brochure_downloads_property_id'] = $property_id;
        $data['brochure_downloads_date'] = date('Y-m-d');
        $this->db->insert('brochure_downloads', $data);
        return true;
    }

    public function add_saved_property($property_id) {
        $data['property_saves_property_id'] = $property_id;
        $data['property_saves_date'] = date('Y-m-d');
        $this->db->insert('property_saves', $data);
        return true;
    }
}
