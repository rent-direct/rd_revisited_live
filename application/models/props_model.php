<?php

class Props_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_all_counties()
    {

        $this->db->select('id, county');
        $this->db->from('uk_towns');
        $this->db->distinct();
        $this->db->group_by('county');
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function get_all_countries()
    {

        $this->db->select('id, country');
        $this->db->from('uk_towns');
        $this->db->distinct();
        $this->db->group_by('country');
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function get_all_main_property_types()
    {
        $query = $this->db->get('property_types');
        $data = $query->result_array();
        return $data;
    }

    public function get_all_resedential_property_types()
    {
        $query = $this->db->get('residential_property_type');
        $data = $query->result_array();
        return $data;
    }

    public function get_all_commercial_property_types()
    {
        $query = $this->db->get('commercial_property_type');
        $data = $query->result_array();
        return $data;
    }

    public function get_all_rooms_types()
    {
        $query = $this->db->get('room_types');
        $data = $query->result_array();
        return $data;
    }

    public function get_all_holiday_types()
    {
        $query = $this->db->get('holiday_types');
        $data = $query->result_array();
        return $data;

    }

    public function get_measurement_units_data()
    {
        // Used to populate the dropdown allowing selection of measurement units type,
        // i.e feet and inches or meters etc.
        $query = $this->db->get('measurement_units');
        $data = $query->result_array();
        return $data;
    }

    public function get_parking_types()
    {
        // Used to populate the dropdown allowing selection of parking types,
        // e.g. driveway, garage etc.
        $query = $this->db->get('properties_parking');
        $data = $query->result_array();
        return $data;
    }

    public function get_property_categories()
    {

        // Used to populate the letting type dropdown
        $query = $this->db->get('property_categories');
        $data = $query->result_array();
        return $data;
    }

    public function get_property_status()
    {

        // Used to populate the property status type dropdown, e.g. let, to let etc.
        $query = $this->db->get('property_status');
        $data = $query->result_array();
        return $data;
    }

    public function get_rent_types()
    {

        // Used to populate the rent frequency, e.g. monthly, weekly etc.
        $query = $this->db->get('rent_types');
        $data = $query->result_array();
        return $data;
    }

    public function get_property_epcs($property_id)
    {

        $this->db->select('*');
        $this->db->from('properties_epc');
        $this->db->where('property_id', $property_id);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function get_property_brochures($property_id)
    {
        $this->db->select('*');
        $this->db->from('properties_brochures');
        $this->db->where('property_id', $property_id);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function get_property_floor_plans($property_id)
    {
        $this->db->select('*');
        $this->db->from('properties_floor_plans');
        $this->db->where('property_id', $property_id);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function search($criteria)
    {

        /* Main property search function */
        $mode = $this->uri->segment(3);

        switch ($mode) {
            case 'residential':
                $type = "1";
                break;

            case 'commercial':
                $type = "2";
                break;

            case 'rooms':
                $type = "3";
                break;

            case 'holiday':
                $type = "4";
                break;
        }

        $data = array();
        //exit(print_r($criteria));
        if (!$criteria) {
            return false;
        }

        //$criteria['radius'] = 5;
        //$criteria['unit'] = 'miles';
        if (isset($criteria['radius']) && !empty($criteria['radius']) && $criteria['radius'] !='0') {
            if (isset($criteria['postcode']) && !empty($criteria['postcode'])) {
                $lat_long = $this->get_gps_coordinates_of_street_address($criteria['postcode']);
            } else if (isset($criteria['town']) && !empty($criteria['town'])) {
                $lat_long = $this->get_gps_coordinates_of_street_address($criteria['town']);
            } else {
                return false;
            }

            $not_radius = false;

            $tmp = explode(',', $lat_long);
            $lat = $tmp[0];
            $lng = $tmp[1];
            $this->_do_radius_search($lat, $lng, $criteria['radius'], $criteria['unit']);
        } else {
            $not_radius = true;
            $this->db->select('*');
        }


        $this->db->from('properties');
        //$this->db->join('property_images', 'property_images.property_id = properties.id');

        // Set the master property type
        $this->db->where('properties.type_id', $type);
        //$this->db->where('property_images.main_image', '1');

        // Construct the WHERE clauses according to the available search criteria

        if ($not_radius) {
            if (isset($criteria['postcode']) && !empty($criteria['postcode'])) {
                $first_part = get_uk_postcode_first_part($criteria['postcode']);
                $this->db->like('postcode', $first_part, 'after');

            }
        }


        if (isset($criteria['sub_type_id']) && !empty($criteria['sub_type_id'])) {
            $this->db->where('sub_type_id', $criteria['sub_type_id']);
        }

        if ($not_radius) {
            if (isset($criteria['town']) && !empty($criteria['town'])) {
                $criteria['town'] = format_town($criteria['town']);
                $this->db->like('city', $criteria['town']);
            }
        }

        if (isset($criteria['rent_from']) && !empty($criteria['rent_from'])) {
            $this->db->where('rent >', $criteria['rent_from']);
        }

        if (isset($criteria['rent_to']) && !empty($criteria['rent_to'])) {
            $this->db->where('rent <', $criteria['rent_to']);
        }

        if (isset($criteria['property_county']) && !empty($criteria['property_county'])) {
            $this->db->where('county', $criteria['property_county']);
        }

        if (isset($criteria['property_country']) && !empty($criteria['property_country'])) {
            $this->db->where('country', $criteria['property_country']);
        }

        if (isset($criteria['residential_type']) && !empty($criteria['residential_type'])) {
            $this->db->where('sub_type_id', $criteria['residential_type']);
        }

        if (isset($criteria['furnished']) && !empty($criteria['furnished'])) {
            $this->db->where('furnished', $criteria['furnished']);
        }

        if (isset($criteria['bedrooms']) && !empty($criteria['bedrooms']) && $criteria['bedrooms'] != 'Any') {
            $this->db->where('bedrooms >=', $criteria['bedrooms']);
        }

        if (isset($criteria['bathrooms']) && !empty($criteria['bathrooms']) && $criteria['bathrooms'] != 'Any') {
            $this->db->where('bathrooms >=', $criteria['bathrooms']);
        }

        if (isset($criteria['pets_allowed']) && !empty($criteria['pets_allowed'])) {

            $this->db->where('pets_allowed', $criteria['pets_allowed']);
        }

        if (isset($criteria['smoking_allowed']) && !empty($criteria['smoking_allowed'])) {
            $this->db->where('smoking_allowed', $criteria['smoking_allowed']);
        }

        if (isset($criteria['dhss_allowed']) && !empty($criteria['dhss_allowed'])) {
            $this->db->where('dhss_allowed',$criteria['dhss_allowed']);
        }

        //$this->db->where('archived', '0');

        $query = $this->db->get();
        $data = $query->result_array();

        // Store the last query in a session var for going back to search results page
        $query_array = array('last_query', $this->db->last_query());
        $this->session->set_userdata($query_array);
        //echo($this->db->last_query());
        //print_r($data['props']);
        //exit();
        foreach ($data as $key=>$value) {
            $data[$key]['image_data'] = $this->get_property_main_image($value['id']);
        }

        return $data;
    }

    public function get_property($id = false, $slug = false)
    {

        /* Get all data and images for an individual property*/

        // Data
        $data = array();
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

    public function get_type_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('property_types');
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

    public function check_prop_stub($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('details_completed', '0');
        $query = $this->db->get('properties');
        if ($query->num_rows() > 0) {

            // There's already an incomplete property listing
            $prop_data = $query->row_array();
            return $prop_data['id'];
        } else {

            // Create stub
            $data = array(
                'user_id' => $user_id,
                'details_completed' => 0,
                'date_added' => date('Y-m-d')
            );
            $this->db->insert('properties', $data);
            return $this->db->insert_id();
        }
    }

    public function add_property_image($prop_id, $file_name)
    {
        $data = array(
            'property_id' => $prop_id,
            'main_image' => 0,
            'file_name' => $file_name
        );
        $this->db->insert('property_images', $data);
    }

    public function add_property_floor_plan($prop_id, $file_name)
    {
        $data = array(
            'property_id' => $prop_id,
            'filename' => $file_name
        );
        $this->db->insert('properties_floor_plans', $data);
    }

    public function add_property_epc($prop_id, $original_name, $file_name)
    {
        $data = array(
            'property_id' => $prop_id,
            'name' => $original_name,
            'filename' => $file_name
        );
        $this->db->insert('properties_epc', $data);
    }

    public function add_property_brochure($prop_id, $original_name, $file_name)
    {
        $data = array(
            'property_id' => $prop_id,
            'name' => $original_name,
            'filename' => $file_name
        );
        $this->db->insert('properties_brochures', $data);
    }

    public function get_property_images($prop_id)
    {
        $query = $this->db->get_where('property_images', array('property_id' => $prop_id));
        $data = $query->result_array();
        return $data;
    }

    public function get_property_main_image($prop_id)
    {
        $query = $this->db->get_where('property_images', array('property_id' => $prop_id, 'main_image' => '1'));
        $data = $query->row_array();

        if (empty($data)) {

            // The tenant hasn't set a main image so just get the first one
            $this->db->select('*');
            $this->db->from('property_images');
            $this->db->where('property_id', $prop_id);
            $this->db->order_by('id');
            $this->db->limit('1');
            $query = $this->db->get();
            $data = $query->row_array();
        }
        return $data;
    }

    public function delete_prop_image($id)
    {
        $this->db->delete('property_images', array('id' => $id));
        return true;
    }

    public function delete_prop_epc($id)
    {
        $this->db->delete('properties_epc', array('id' => $id));
        return true;
    }

    public function delete_prop_brochure($id)
    {
        $this->db->delete('properties_brochures', array('id' => $id));
        return true;
    }

    public function delete_prop_floorplan($id)
    {
        $this->db->delete('properties_floor_plans', array('id' => $id));
        return true;
    }

    public function check_lat_long($prop_id, $postcode)
    {
        $this->db->select('lat_long, postcode');
        $this->db->from('properties');
        $this->db->where('id', $prop_id);
        $query = $this->db->get();
        $data = $query->row_array();
        $response = "DONT_UPDATE";
        if (empty($data['lat_long'])) {
            exit('here');
            // No latitude and longitude data yet
            $response = 'UPDATE';
        }

        if (!empty($data['postcode']) && $data['postcode'] != $postcode) {

            // Postcode has changed
            $response = 'UPDATE';
        }
        return $response;
    }

    public function get_gps_coordinates_of_street_address($address)
    {
        // create url
        $url = 'http://maps.googleapis.com/maps/api/geocode/json?address='
            . $address
            . '&sensor=false';
        //exit($url);
        if ($response = @file_get_contents($url)) {

            $arr = json_decode($response);
            //exit(print_r($arr));
            // check if response is good
            if ($arr->status == 'OK') {
                // return GPS coordinates as comma separated string
                return $arr->results[0]->geometry->location->lat . ',' . $arr->results[0]->geometry->location->lng;
            } else {
                // GPS coordinates were not available for supplied ADDRESS.
                //exit('GPS coordinates were not available for supplied ADDRESS');
                return FALSE;
            }

        } else {
            // GPS coordinates were not available because connection failed or malformed request
            //exit('GPS coordinates were not available because connection failed or malformed request');
            return FALSE;
        }
    }

    public function get_landlord_properties($id, $active = false)
    {
        if (!$id) {
            return false;
        }

        $this->db->select('*');
        $this->db->from('properties');
        $this->db->where('properties.user_id', $id);
        $this->db->where('properties.details_completed', '1');
        if ($active) {
            $this->db->where('archived', '0');
        }
        //$this->db->where('property_images.main_image', '1');
        //$this->db->limit(1);
        $query = $this->db->get();
        $data = $query->result_array();
        foreach($data as $key=>$value) {
            $data[$key]['image_data'] = $this->get_property_main_image($value['id']);
        }
        return $data;
    }

    public function get_featured_properties()
    {
        $this->db->select('*');
        $this->db->from('properties');

        $this->db->where('properties.featured', '1');
        //$this->db->where('property_images.main_image', '1');
        $this->db->order_by('featured_to', 'desc');
        $query = $this->db->get();
        $data = $query->result_array();
        foreach($data as $key=>$value) {
            $data[$key]['image_data'] = $this->get_property_main_image($value['id']);
        }
        //exit(print_r($data));
        return $data;
    }

    public function get_market_status_text($id)
    {
        $this->db->select('*');
        $this->db->from('property_status');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $data = $query->row_array();
        $result = $data['status'];
        return $result;
    }

    public function get_months()
    {
        $this->db->select('*');
        $this->db->from('months');
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function set_default_image_by_id($image_id, $property_id)
    {

        // Clear off the main_image status of all images for this property
        $data = array(
            'main_image' => '0'
        );
        $this->db->where('property_id', $property_id);
        $this->db->update('property_images', $data);

        // Now set the new main image
        $data = array(
            'main_image' => '1'
        );
        $this->db->where('id', $image_id);
        $this->db->update('property_images', $data);
        return true;
    }

    public function add_viewing($data)
    {
        $data['new'] = 1;
        $data['recieved'] = date('Y-m-d');
        $this->db->insert('viewings', $data);
    }

    public function send_viewing_request_email($data)
    {

        // Get the landlords details
        $landlord_data = $this->ion_auth->user($data['user_id'])->row();
        $landlord_email = $landlord_data->email;

        // Get the property details
        $property_data = $this->get_property($data['property_id'], false);

        // Populate an array with the required data ready for parsing into the email template
        $email_data['landlord_first_name'] = $landlord_data->first_name;
        $email_data['user_name'] = $data['name'];
        $email_data['viewing_property_address'] = $property_data['address_1'] . "<br />";
        $email_data['viewing_property_address'] .= $property_data['address_2'] . "</br>";

        if ($property_data['address_3']) {
            $email_data['viewing_property_address'] .= $property_data['address_3'] . "</br>";
        }

        $email_data['viewing_property_address'] .= $property_data['city'] . "<br />";
        $email_data['viewing_property_address'] .= $property_data['county'] . "<br />";
        $email_data['viewing_property_address'] .= $property_data['postcode'] . "<br />";
        $email_data['viewing_property_address'] .= $property_data['country'];

        $email_data['body'] = "Name: " . $data['name'] . "<br />";
        $email_data['body'] .= "Email: " . $data['email'] . "<br />";
        $email_data['body'] .= "Phone: " . $data['phone'] . "<br />";

        if ($data['time_from']) {
            $email_data['body'] .= "Ideally after: " . $data['time_from'] . " ";
        }

        if ($data['time_to']) {
            $email_data['body'] .= "And / or before: " . $data['time_to'] . " ";
        }

        // Populate an array for the email to, email from and subject
        $recipient_data['to'] = $landlord_email;
        $recipient_data['from'] = "outgoing@rent-direct.co.uk";
        $recipient_data['from_name'] = "Rent Direct";
        $recipient_data['subject'] = "Viewing request from Rent Direct";

        // Set the template
        $template = "landlord_viewing_request.html";
        // Get the template ready for parsing the template vars
        $etemp = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/email_templates/' . $template);

        // Parse the template vars from the email_data array
        foreach ($email_data as $key => $value) {
            if (strpos($etemp, '[[' . $key . ']]')) {
                $etemp = str_replace('[[' . $key . ']]', $value, $etemp);
            }
        }

        // Send the email
        $this->load->library('email');

        $config['protocol'] = 'mail';
        //$config['mailpath'] = '/usr/sbin/sendmail -t -i ';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';

        $this->email->initialize($config);

        $this->email->from($recipient_data['from'], $recipient_data['from_name']);
        $this->email->to($recipient_data['to']);

        $this->email->subject($recipient_data['subject']);
        $this->email->message($etemp);

        $this->email->send();

        exit($this->email->print_debugger());


        return true;


    }

    public function add_user_saved_property($property_id, $user_id)
    {
        $data = array('user_properties_property_id' => $property_id, 'user_properties_user_id' => $user_id);
        $this->db->insert('user_properties', $data);
        return true;
    }

    public function check_saved_property($prop_id, $user_id)
    {
        $this->db->select('*');
        $this->db->from('user_properties');
        $this->db->where('user_properties_property_id', $prop_id);
        $this->db->where('user_properties_user_id', $user_id);
        $query = $this->db->get();
        $count = $query->num_rows();
        return $count;
    }

    public function get_saved_properties($user_id)
    {
        $this->db->select('user_properties.*, property_images.file_name, properties.*');
        $this->db->from('user_properties');
        $this->db->join('properties', 'user_properties.user_properties_property_id = properties.id');
        $this->db->join('property_images', 'user_properties.user_properties_property_id = property_images.property_id');
        $this->db->where('user_properties.user_properties_user_id', $user_id);
        //$this->db->where('property_images.main_image', '1');
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function get_num_saved_properties_by_property_id()
    {
        $this->db->select('*');
        $this->db->from('user_properties');
        $this->db->where('user_properties_property_id', $prop_id);
        $query = $this->db->get();
        $count = $query->num_rows();
        return $count;
    }

    public function check_viewing_arranged($user_id, $property_id)
    {
        $this->db->select('id');
        $this->db->from('viewings');
        $this->db->where('property_id', $property_id);
        $this->db->where('tenant_id', $user_id);
        $this->db->where('deleted', '0');
        $query = $this->db->get();
        if ($data = $query->row_array()) {

            $viewing_id = $data['id'];
        } else {
            $viewing_id = "-1";
        }

        return $viewing_id;
    }

    public function get_twitter_updates()
    {
        return true;
    }

    public function add_rate_band($data)
    {
        $this->db->insert('holiday_rates', $data);
        $id = $this->db->insert_id();
        $return_data['response'] = 'SUCCESS';
        $return_data['new_row'] = '<tr><td>' . $data['holiday_rates_from_day'] . ' ' . $data['holiday_rates_from_month'] . '</td><td>' . $data['holiday_rates_to_day'] . ' ' . $data['holiday_rates_to_month'] . '</td><td>' . $data['holiday_rates_rate'] . '</td><td><a href="#" id="' . $id . '">x</a></td></tr>';
        exit(json_encode($return_data));
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

    public function get_property_views_by_week($prop_id) {

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

    public function get_similar_properties($prop_data)
    {
        $multiplier = 3959; // Miles
        $lat = $prop_data['lat'];
        $lng = $prop_data['lng'];
        $radius = 50;

        $this->db->select("*, ( {$multiplier} * acos( cos( radians({$lat}) ) * cos( radians( `lat` ) ) * cos( radians( `lng` ) - radians({$lng}) ) + sin( radians({$lat}) ) * sin( radians( `lat` ) ) ) ) AS distance");
        $this->db->from('properties');
        $this->db->having("distance <= {$radius}");
        $this->db->where('type_id', $prop_data['type_id']);
        $this->db->where('details_completed', '1');
        $this->db->where('sub_type_id', $prop_data['sub_type_id']);
        $where = "id <> '".$prop_data['id']."'";
        $this->db->where($where);

        if ($prop_data['bedrooms']) {
            $this->db->where('bedrooms', $prop_data['bedrooms']);
        }

        if ($prop_data['bathrooms']) {
            $this->db->where('bathrooms', $prop_data['bathrooms']);
        }

        $this->db->limit('10');
        $query = $this->db->get();
        $data = $query->result_array();
        //exit($this->db->last_query());
        //exit(print_r($data));
        return $data;
    }

    public function calculate_average_rent($array)
    {
        foreach ($array as $key => $value) {

            if (!empty($value)) {
                $rent[$key] = 0;
                $count = 0;
                foreach ($value as $similar_prop_id => $similar_prop_array) {
                    $rent[$key] = $rent[$key] + $similar_prop_array['rent'];
                    $count++;
                }
                $data[$key] = $rent[$key] / $count;
            }
        }
        return $data;
    }

    public function get_property_sub_type($type_id, $sub_type_id) {
        switch ($type_id) {
            case 1:
                $table = 'residential_property_type';
                break;
            case 2:
                $table = 'commercial_property_type';
                break;
            case 3:
                $table = 'room_types';
                break;
            case 4:
                $table = 'holiday_types';
                break;
        }

        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id', $sub_type_id);
        $query = $this->db->get();
        $data = $query->row_array();
        return $data['type'];
    }

    public function geocode_lat_long($postcode)
    {

    }

    public function delete_saved_prop($saved_property_id) {
        $this->db->delete('user_properties', array('user_properties_id' => $saved_property_id));
        return true;
    }

    protected function _do_radius_search($lat, $lng, $radius, $unit) {
        if ($unit == 'miles') {
            $multiplier = 3959;
        } else {
            $multiplier = '6371';
        }
        $this->db->select("*, ( {$multiplier} * acos( cos( radians({$lat}) ) * cos( radians( `lat` ) ) * cos( radians( `lng` ) - radians({$lng}) ) + sin( radians({$lat}) ) * sin( radians( `lat` ) ) ) ) AS distance");
        $this->db->having("distance <= {$radius}");
        return true;
        //$this->db->join('property_images', 'property_images.property_id = properties.id');

        // Set the master property type
        //$this->db->where('properties.type_id', $type);

        //$this->db->order_by('distance', 'asc');
        //$query = $this->db->get();
        //$data = $query->result_array();
        //echo($this->db->last_query());
        //exit(print_r($data));
    }



}
