<?php
class Searchmodel extends CI_Model
{
    /**
     * @param string $search_term
     * @return mixed
     * USAGE: Search properties
     * DEFAULT
     */
    public function get_results_city($search_term='default')
    {
        // Use the Active Record class for safer queries.
        $this->db->select('*');
        $this->db->from('properties');
        $this->db->like('city',$search_term);

        // Execute the query.
        $query = $this->db->get();

        // Return the results.
        return $query->result_array();
    }

    public function get_results_beds($search_term='default')
    {
        // Use the Active Record class for safer queries.
        $this->db->select('*');
        $this->db->from('properties');
        $this->db->like('bedrooms',$search_term);

        // Execute the query.
        $query = $this->db->get();

        // Return the results.
        return $query->result_array();
    }

    /*
     * UNUSED SO FAR, FOR REFERENCE
     */
    public function ajax_search($search)
    {
        $this->db->select("title");
        $whereCondition = array('title' => $search);
        $this->db->where($whereCondition);
        $this->db->from('properties');
        $query = $this->db->get();
        return $query->result();
    }

    /*
     * NOT USED NOW
     */
    public function multi_search($keyword, $bedrooms, $bathrooms)
    {
        $this->db->select('*');
        $this->db->from('properties');

        if(!empty($keyword)) {
            $this->db->like('title', $keyword);
            $this->db->or_like('city', $keyword);
            $this->db->or_like('address_1', $keyword);
            $this->db->or_like('bedrooms', $bedrooms);
            $this->db->or_like('bathrooms', $bathrooms);
        }
            $this->db->order_by('id', 'ASC');
            $getData = $this->db->get();

            if($getData->num_rows() > 0)
            {
                return $getData->result_array();
            } else {
                return NULL;
            }
    }

    public function multi_search_slim($search_term='default')
    {
        $this->db->select('*');
        $this->db->from('properties');
        $this->db->like('title',$search_term);
        $this->db->or_like('address_1',$search_term);

        // TODO: ORDER BY FEATURED /// update: added a featured banner

        $query = $this->db->get();
        return $query->result_array();
    }

    public function multi_search_slim_filter($search_term='default',$rent)
    {
        $this->db->select('*');
        $this->db->from('properties');

        //check to see if user has entered the rent, if not then assign max 1800
        if ($rent == 0) { $rent = 1800; } // simular to assigning default params in a way!
        $this->db->where('properties.rent <', $rent);
        // TODO: THESE 2 LINES BELOW ARE GOING TO BE LIVE WHEN WE GET MORE PROPS
        //$this->db->where('properties.bedrooms <', $rent);
        //$this->db->where('properties.bathrooms <', $rent);

        $this->db->like('title',$search_term);
        $this->db->or_like('address_1',$search_term);

        $query = $this->db->get();
        $data = $query->result_array();

        return $data;
    }

    public function multi_search_refine($keyword='default',$type,$min_rent,$max_rent,$bedrooms,$bathrooms,$parking)
    {
        $this->db->select('*');
        $this->db->from('properties');

        $this->db->like('title',$keyword);
        $this->db->or_like('address_1',$keyword);

        $this->db->where('properties.rent <', $max_rent);
        $this->db->where('properties.rent >', $min_rent);
        $this->db->where('properties.bedrooms =', $bedrooms);
        $this->db->where('properties.bathrooms =', $bathrooms);
        $this->db->where('properties.sub_type_id =', $type);
        $this->db->where('properties.parking =', $parking);

        $query = $this->db->get();
        $data = $query->result_array();

        return $data;
    }

    /*
     * PAGINATION COUNT
     */
    public function record_count() {
        return $this->db->count_all("properties");
    }

    // Fetch data according to per_page limit.
    public function fetch_data($limit, $id) {
        $this->db->limit($limit);
        $this->db->where('id', $id);

        $query = $this->db->get("properties");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }

            return $data;
        }
        return false;
    }

}