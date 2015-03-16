<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

$config =
	array(
		// set on "base_url" the relative url that point to HybridAuth Endpoint
		'base_url' => '/hauth/endpoint',

		"providers" => array (
			// openid providers
			"OpenID" => array (
				"enabled" => true
			),

			"Yahoo" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" ),
			),

			"AOL"  => array (
				"enabled" => true
			),

			"Google" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "365911148984-qp056o03s1lav5f5rj5ptq94ki7q43oa.apps.googleusercontent.com", "secret" => "I2DDScEGD7a6Q7gQJ8tFlcrO" ),
			),

			"Facebook" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "321079321416643", "secret" => "2bb5c41aff7d625c732541e5297bb430" ),
			),

			"Twitter" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "zgf3IY6mQxmEqKptdkCVjjbEt", "secret" => "P7vXmOfF24UPCCB6rS0oViTuk1ZSzodFgPZf1ZJROOH5wjVJku" )
			),

			// windows live
			"Live" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" )
			),

			"MySpace" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "", "secret" => "" )
			),

			"LinkedIn" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "77oz0ttpdi5hs4", "secret" => "O24ZnFnqBtMoCng2" )
			),

			"Foursquare" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" )
			),
		),

		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => (ENVIRONMENT == 'development'),

		"debug_file" => APPPATH.'/logs/hybridauth.log',
	);


/* End of file hybridauthlib.php */
/* Location: ./application/config/hybridauthlib.php */