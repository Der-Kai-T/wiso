<?php


include("pretix_api_token.php");

//To be changed according to userdata:

$pretix_api_loggin		= false;







$pretix_api_url 		= "https://pretix.eu/api/v1/";

$curl_header			= array(
							'Authorization: Token ' . $pretix_api_token
						);








function pretix_submit_user($email, $full_name, $item_id){
	
	global $pretix_api_shop, $pretix_api_event, $pretix_api_token;
	
	$data_json = "{
		\"email\": \"$email\",
		\"locale\": \"de\",
		\"sales_channel\": \"web\",		  
		\"payment_provider\": \"manual\",
		\"invoice_address\": {
			\"is_business\": true,
			\"name\": \"$full_name\"
			
		},
		\"positions\": [
			{
				\"item\": $item_id,
				\"variation\": null,
				\"price\": \"00.00\",
				\"attendee_name\": \"$full_name\",
				\"attendee_email\": null,
				\"addon_to\": null,
				\"subevent\": null
			}
		],
		\"send_mail\": true
	}
	";

	$pretix_api_endpoint 	= "organizers/".$pretix_api_shop."/events/".$pretix_api_event."/orders/";
	$api_result = api_perform_post_request($data_json, $pretix_api_endpoint);

	return $api_result;



}

function pretix_mark_order_paid($code){
	global $pretix_api_shop, $pretix_api_event, $pretix_api_token;
	
	$data_json = "{
		
	}";
	
	$pretix_api_endpoint 	= "organizers/".$pretix_api_shop."/events/".$pretix_api_event."/orders/".$code."/resend_link/";
	$api_result = api_perform_post_request($data_json, $pretix_api_endpoint);
	
}



/*
*******************************************************************************************************************************************
*******************************************************************************************************************************************
Global API Functionality
*******************************************************************************************************************************************
*******************************************************************************************************************************************
*/

function api_perform_post_request($data, $pretix_api_endpoint ){
	
	global $pretix_api_loggin, $pretix_api_url, $pretix_api_token;
	
	$url = $pretix_api_url.$pretix_api_endpoint;

	$curl = curl_init($url);

	
	if($pretix_api_loggin){
		echo"<pre>";
		echo"
		====================================
		=== perform post request via api ===
		====================================\n";
		echo"URL: $url\n";
		echo"== Submitted data ==\n";
		echo $data;
		echo"\n\n";
		
		//Enable Loggin
		curl_setopt($curl, CURLOPT_VERBOSE, true);
		$verbose = fopen('php://temp', 'w+');
		curl_setopt($curl, CURLOPT_STDERR, $verbose);
	}


	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);                                                                  
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                          
		'Content-Type: application/json',
		'Authorization: Token ' . $pretix_api_token, 		
		'Content-Length: ' . strlen($data))                                                                       
	);                                                     
	
//Execute cURL
	$result = curl_exec($curl);
   
   
    if ($result === FALSE) {
    printf("cUrl error (#%d): %s<br>\n", curl_errno($curl),
           htmlspecialchars(curl_error($curl)));
	}

	if($pretix_api_loggin){
		echo"== Verbose Logging API Connection ==\n";
		
		rewind($verbose);
		$verboseLog = stream_get_contents($verbose);

		echo (htmlspecialchars($verboseLog));
		echo"\n";
	}
	
   
   curl_close($curl);
   
   
	if($pretix_api_loggin){
		
		echo"== API Result ==\n";
		
		echo $result;
		echo"\n";
		echo " === End perform post request ===\n\n\n\n\n</pre>";
	}
   
   return $result;
   
	
}


?>