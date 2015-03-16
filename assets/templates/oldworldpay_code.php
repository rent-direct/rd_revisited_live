
$this->load->library('merchant');
$this->merchant->load('worldpay');

$settings = array('test_mode' => true);

$this->merchant->initialize($settings);

$params = array(
'amount' => 12.00,
'currency' => 'GBP',
'return_url' => 'http://payment.test.com',
'cancel_url' => 'http://payment.test.com/cancel');

$response = $this->merchant->purchase($params);