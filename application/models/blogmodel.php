<?php
class Blogmodel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_blogs()
    {
        $this->db->select('*');
        $this->db->from('blogger');
        //$this->db->where('properties.user_id', $id);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function add_blog($data)
    {
        //$data['new'] = 1;
        $data['date_added'] = date("Y-m-d H:i:s");
        $this->db->insert('blogger', $data);
    }

    public function update_blog($id,$row)
    {
        $this->db->where('id',$id);
        $this->db->update('blogger',$row);
        return $this->db->insert_id();
    }

    public function delete_blog($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('blogger');
    }

    function get_last_ten_blogs() //COULD BE USED FOR FRONT PAGE LISTINGS OF PROPS
    {
        $query = $this->db->get('blogger', 10);
        return $query->result();
    }


}
