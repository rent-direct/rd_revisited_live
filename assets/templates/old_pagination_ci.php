/*
* ///////////////////////////PAGINATION////////////////////////////
*/
$config = array();
$config["base_url"] = base_url() . "home/search";
$total_row = $this->Searchmodel->record_count();
$config["total_rows"] = $total_row;
$config["per_page"] = 10;
$config['use_page_numbers'] = TRUE;
$config['num_links'] = $total_row;
//$config['page_query_string'] = TRUE;
// $config['query_string_segment'] = 'keyword'. $rent;
$config['first_url'] = '/index.php/search/index/?q='.$rent;
$config['cur_tag_open'] = '&nbsp;<li><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
$config['next_link'] = 'Next';
$config['prev_link'] = 'Previous';
$this->pagination->initialize($config);
if($this->uri->segment(3)){
$page = ($this->uri->segment(3)) ;
}
else{
$page = 1;
}

//$data['results'] = $this->Searchmodel->multi_search_slim_filter($keyword,$rent);

$data["results"] = $this->Searchmodel->fetch_data($config["per_page"],$page,$keyword,$rent);
$str_links = $this->pagination->create_links();
$data["links"] = explode('&nbsp;',$str_links );

//------------------END OF PAGINATION---------------------