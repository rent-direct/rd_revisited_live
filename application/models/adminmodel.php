<?php
class Adminmodel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $id
     * @return mixed
     * USAGE: gets the price of the payment on residential
     */
    function get_price($id)
    {
        $this->db->select('*');
        $this->db->from('payment_fees_res');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['price'];
    }

    function get_prices()
    {
        $this->db->select('*');
        $this->db->from('payment_fees_res');
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

    public function insert_prices($row) // TO BE COMPLETE
    {
        $this->db->insert('properties',$row);
        $prop_id = $this->db->insert_id();
        return $prop_id;
    }

    /*
     * get the description of the payment plan
     */
    function get_description($id)
    {
        $this->db->select('*');
        $this->db->from('payment_fees_res');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['description'];
    }

    public function get_staff_profiles()
    {

        $this->db->select('*');
        $this->db->from('staff_profiles');
        //$this->db->where('properties.user_id', $id);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function get_frontend_data()
    {
        $this->db->select('*');
        $this->db->from('frontend_data');
        //$this->db->where('properties.user_id', $id);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    function insert_price($id,$data)
    {
        $this->db->where('id', $id);
        $update = array('price' => $data);
        $this->db->update('payment_fees_res', $update);
    }

    function insert_description($id,$data)
    {
        $this->db->where('id', $id);
        $update = array('description' => $data);
        $this->db->update('payment_fees_res', $update);
    }

}
