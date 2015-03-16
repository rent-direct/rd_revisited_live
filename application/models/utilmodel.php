<?php
/**
 *
 * THIS MODEL IS FOR SMALL UTILS USED AROUND RD SITE, CLOCK STUFF, HIT COUNTERS, VARIOUS COUNTERS ETC
 * STARTED BY JAMIE @ RD 24.02.15
 *
 */

class Utilmodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function add_prop_hit($prop_id)
    {
        //test if there isnt any rows first
        $this->db->select('*');
        $this->db->from('hit_counter_prop');
        $this->db->where('prop_id', $prop_id);
        $query = $this->db->get();
        $data = $query->result_array();

        if (empty($data)) { // insert

        $data['prop_id'] = $prop_id;
        $data['count'] = 1;
        $this->db->insert('hit_counter_prop', $data);

        } else { // or update

        $this->db->where('prop_id', $prop_id);
        $this->db->set('count', 'count+1', FALSE);
        $this->db->update('hit_counter_prop');
        }
    }

    function get_prop_hit($prop_id)
    {
        //test if there isnt any rows first
        $this->db->select('*');
        $this->db->from('hit_counter_prop');
        $this->db->where('prop_id', $prop_id);
        $query = $this->db->get();
        $data = $query->result_array();

        return $data[0]['count'];
    }

    function set_user_has_paid($prop_id)
    {
        $this->db->where('prop_id', $prop_id);
        $this->db->set('has_paid', 1);
        $this->db->update('properties');
    }

    function set_user_sub_type($prop_id,$sub_type)
    {
        $this->db->where('prop_id', $prop_id);
        $this->db->set('user_subscription_type', $sub_type);
        //SET THE EXPIRE DATE TO
        $expire = date('Y-m-d H:i:s', strtotime("+30 days -1 hour")); // THE -1 HOUR MATCHES OUR TIME (LONDON GMT)
        $this->db->set('user_sub_expire_date', $expire);
        $this->db->update('properties');
    }

    function set_cross_reference($prop_id,$cross_reference)
    {
        $this->db->where('prop_id', $prop_id);
        $this->db->set('wp_cross_reference', $cross_reference);
        $this->db->update('properties');
    }

    function get_prop_data_by_cross_reference($cross_reference)
    {

    }

    /*
     * INC RAW SQL TO UK DATE CONVERSION
     */
    function get_prop_expire_date($CrossReference)
    {
        $this->db->select('*');
        $this->db->from('properties');
        $this->db->where('wp_cross_reference', $CrossReference);
        $raw_date = $this->db->get()->row()->user_sub_expire_date;
        return date('d/m/Y',strtotime($raw_date));


    }

    /*
     * A DUPLICATE FROM LANDLORDMODEL BUT PART OF A UTIL I GUESS
     */
    public function get_prop_slug($id)
    {
        $this->db->select('*');
        $this->db->from('properties');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['slug'];
    }





}
