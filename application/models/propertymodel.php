<?php
/*
 * This class will do all the general work for property data
 */
class Propertymodel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_premium_properties()
    {
        $this->db->select('*');
        $this->db->from('properties');
        $this->db->where('properties.user_subscription_type', '3');
        $this->db->order_by('user_sub_expire_date', 'desc');
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    /**
     * @param $limit - takes an integer
     * @return mixed
     * USAGE: Limits the amount of records to be displayed on the frontend in a Random Order
     */
    public function get_premium_properties_limit($limit)
    {
        $this->db->select('*');
        $this->db->from('properties');
        $this->db->order_by('id', 'RANDOM');
        $this->db->where('user_subscription_type', '3');
        $this->db->limit($limit); //test, otherwise remove RANDOM and think of some other method
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function get_headliner_properties()
    {
        $this->db->select('*');
        $this->db->from('properties');
        $this->db->where('properties.user_subscription_type', '4');
        $this->db->order_by('user_sub_expire_date', 'desc');
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    /**
     * @param $limit - takes an integer
     * @return mixed
     * USAGE: Limits the amount of records to be displayed on the frontend in a Random Order
     */
    public function get_headliner_properties_limit($limit)
    {
        $this->db->select('*');
        $this->db->from('properties');
        $this->db->order_by('id', 'RANDOM');
        $this->db->where('user_subscription_type', '4');
        $this->db->limit($limit); //test, otherwise remove RANDOM and think of some other method
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    /*
     * SUDO:
     * THIS FEATURED BIT WILL BE FOR THE SEARCH RESULTS PAGE
     * SO IN A WAY, I NEED TO REPLACE RANDOM VALUES WITH SEARCH KEYWORD ON TOWN
     * THEN IN THE FUTURE WE'LL BE USING GEO LOCATION
     * UPDATE: ADDED SOME BASIC FUNCTIONALITY, QUICK N EASY FOR NOW
     *
     */
    public function get_featured_properties_limit_onsearch($limit, $keyword, $rent)
    {
        //check to see if user has entered the rent, if not then assign max 1800
        if ($rent == 0) { $rent = 1800; } // simular to assigning default params in a way!

        $this->db->select('*');
        $this->db->from('properties');
        //$this->db->order_by('id', 'RANDOM');
        $this->db->like('title', $keyword);
        $this->db->or_like('title',$keyword);
        $this->db->or_like('address_1',$keyword);
        $this->db->where('user_subscription_type', '2');

        $this->db->where('properties.rent <', $rent);
        $this->db->limit($limit); //test, otherwise remove RANDOM and think of some other method
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function get_featured_properties_limit_onrefine($limit, $keyword)
    {
        $this->db->select('*');
        $this->db->from('properties');
        //$this->db->order_by('id', 'RANDOM');
        $this->db->like('title', $keyword);
        $this->db->or_like('title',$keyword);
        $this->db->or_like('address_1',$keyword);
        $this->db->where('user_subscription_type', '2');

        $this->db->limit($limit); //test, otherwise remove RANDOM and think of some other method
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function get_property($id = false, $slug = false)
    {
        /* Get all data and images for an individual property*/
        $this->db->select('*');
        $this->db->from('properties');
        if (!$id && $slug) {
            // Get the record by it's slug
            $this->db->where('slug', $slug);
        } else if ($id && !$slug) {
            // Get the record by it's ID
            $this->db->where('id', $id);
        } else {
            // No param passed, shouldn't happen so just bomb out
            exit('No parameter passed to get_property in propsmodel');
        }

        $query = $this->db->get();
        $data = $query->row_array();
        return $data;
    }

    public function get_property_string_slug($slug)
    {
        /* Get all data and images for an individual property*/
        $this->db->select('*');
        $this->db->from('properties');
        $this->db->where('slug', $slug);

        $query = $this->db->get();
        $data = $query->row_array();
        return $data;
    }

    public function get_landlord_properties($id, $active = false)
    {
        if (!$id) {
            return false;
        }

        $this->db->select('*');
        $this->db->from('properties');
        $this->db->where('properties.user_id', $id);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function get_landlord_draft_properties($id, $active = false)
    {
        if (!$id) {
        return false;
    }

        $this->db->select('*');
        $this->db->from('properties');
        $this->db->where('properties.user_id', $id);
        $this->db->where('properties.user_subscription_type', 0);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function get_landlord_property_by_id($prop_id)
    {
        $this->db->select('*');
        $this->db->from('properties');
        $this->db->where('properties.id', $prop_id);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function get_overall_property_count()
    {
        $this->db->from('properties');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }

    public function add_viewing($data)
    {
        $data['new'] = 1;
        $data['recieved'] = date('Y-m-d');
        $this->db->insert('viewings', $data);
    }

    public function get_property_gallery($prop_id)
    {
        $this->db->select('*');
        $this->db->from('property_gallery');
        $this->db->where('property_id', $prop_id);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function get_prop_reference($id)
    {
        $this->db->select('*');
        $this->db->from('properties');
        $this->db->where('id', $id);
        return $this->db->get()->row()->prop_id;
    }

    public function get_property_views($prop_id, $range)
    {
        if ($range == 'all') {
            $this->db->select('*');
            $this->db->from('property_views');
            $this->db->where('property_views_property_id', $prop_id);
            $query = $this->db->get();
            $data = $query->num_rows();
        } else {

            $today = date('Y-m-d');
            $last_day = $today;

            $c = 0;
            $data = array();

            while ($c < $range) {

                if ($c == 0) {
                    $day = $today;
                } else {
                    $day = date('Y-m-d', strtotime('-1 day', strtotime($last_day)));
                }

                $this->db->select('*');
                $this->db->from('property_views');
                $this->db->where('property_views_property_id', $prop_id);
                $this->db->where('property_views_date', $day);
                $query = $this->db->get();
                $data[$day] = $query->num_rows();
                $last_day = $day;
                $c++;
            }
        }

        return $data;
    }

    public function get_property_saves($prop_id, $range)
    {
        if ($range == 'all') {
            $this->db->select('*');
            $this->db->from('property_saves');
            $this->db->where('property_saves_property_id', $prop_id);
            $query = $this->db->get();
            $data = $query->num_rows();
        } else {
            $today = date('Y-m-d');
            $last_day = $today;

            $c = 0;
            $data = array();

            while ($c < $range) {

                if ($c == 0) {
                    $day = $today;
                } else {
                    $day = date('Y-m-d', strtotime('-1 day', strtotime($last_day)));
                }

                $this->db->select('*');
                $this->db->from('property_saves');
                $this->db->where('property_saves_property_id', $prop_id);
                $this->db->where('property_saves_date', $day);
                $query = $this->db->get();
                $data[$day] = $query->num_rows();
                $last_day = $day;
                $c++;
            }

        }
        return $data;
    }

    public function get_property_shares($prop_id, $range)
    {
        if ($range == 'all') {
            $this->db->select('*');
            $this->db->from('property_shares');
            $this->db->where('property_shares_property_id', $prop_id);
            $query = $this->db->get();
            $data = $query->num_rows();

        } else {
            $today = date('Y-m-d');
            $last_day = $today;

            $c = 0;
            $data = array();

            while ($c < $range) {

                if ($c == 0) {
                    $day = $today;
                } else {
                    $day = date('Y-m-d', strtotime('-1 day', strtotime($last_day)));
                }

                $this->db->select('*');
                $this->db->from('property_shares');
                $this->db->where('property_shares_property_id', $prop_id);
                $this->db->where('property_shares_date', $day);
                $query = $this->db->get();
                $data[$day] = $query->num_rows();
                $last_day = $day;
                $c++;
            }

        }
        return $data;
    }

    public function get_prop_id_by_slug($prop_id)
    {
        /* Get all data and images for an individual property*/
        $this->db->select('*');
        $this->db->from('properties');
        $this->db->where('slug', $slug);

        $query = $this->db->get();
        $data = $query->row_array();
        return $data['id'];
    }

//    public function get_last_record_id()
//    {
//        $this->db->insert(property, $data);
//        $query = $this->db->query('SELECT LAST_INSERT_ID()');
//        $row = $query->row_array();
//        return $row['LAST_INSERT_ID()'];
//    }

    public function get_type_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('property_type');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['type'];
    }

    public function get_rent_type_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('rent_types');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['name'];
    }

    public function get_property_main_image($prop_id)
    {
        $query = $this->db->get_where('property_gallery', array('property_id' => $prop_id, 'main_image' => '1'));
        $data = $query->row_array();

        if (empty($data)) {

            // The tenant hasn't set a main image so just get the first one
            $this->db->select('*');
            $this->db->from('property_gallery');
            $this->db->where('property_id', $prop_id);
            $this->db->order_by('id');
            $this->db->limit('1');
            $query = $this->db->get();
            $data = $query->row_array();
        }
        return $data;
    }

}