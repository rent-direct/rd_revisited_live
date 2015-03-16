//OLD CHECK OUT CODE, CODE IS NOT IN ORDER!!!

$postdata = array(
'user_subscription_type' => $this->input->post('user_subscription_type')
);

//Admin Prices & String vars for page
if ($wpSub == 1) $wpPrice = $this->Adminmodel->get_price(1);
if ($wpSub == 2) $wpPrice = $this->Adminmodel->get_price(2);
if ($wpSub == 3) $wpPrice = $this->Adminmodel->get_price(3);
if ($wpSub == 4) $wpPrice = $this->Adminmodel->get_price(4);

//Here we will let the worldpay know which product they've chosen plus other vars like user as a reference
$wpSub = $this->input->post('user_subscription_type');

//string vars for the page
if ($wpSub == 0) $wpProduct = NULL; //This is for setting to draft in future reference
if ($wpSub == 1) $wpProduct = 'Basic';
if ($wpSub == 2) $wpProduct = 'Featured';
if ($wpSub == 3) $wpProduct = 'Premium';
if ($wpSub == 4) $wpProduct = 'Headliner';
if ($wpSub == 5) $wpProduct = NULL; //Demo var for updated features in the future

//Grabs the id from the hidden field for the last form (add image)
$id = $this->input->post('id');

//$this->Landlordmodel->update($postdata,$id);

//grab the unique/customer/prop id
$prop_id = $this->Landlordmodel->get_prop_id($id);

//set the expire date for 30 days, // todo: when date has expired set has_paid to 0
$this->Landlordmodel->set_expire_date($id);




//final passing all the data to payment form
$formdata = array(
//forward the ID once again
'id' => $this->input->post('id'),
//tell the landlord on the payment page
'product' => $wpProduct,
'price' => (string)$wpPrice,
'prop_id' => $this->Landlordmodel->get_prop_id($id),
'chkId' => $chkID,
'user_data' => (array) $this->ion_auth->user()->row()
);


$wpUser = $this->Landlordmodel->get_user_id();

