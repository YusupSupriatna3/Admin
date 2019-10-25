<?php

	class Dataencryption 
	{
		
		function enc_dec($action, $string){
			$output = "";
	 
		    $encrypt_method = "AES-256-CBC";
		    $secret_key = '1234567890';
		    $secret_iv = '0987654321';
		 
		    // hash
		    $key = hash('sha256', $secret_key);
		    
		    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		    $iv = substr(hash('sha256', $secret_iv), 0, 16);
		 
		    if( $action == 'encrypt' ) {
		        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
		        $output = base64_encode($output);
		    }
		    else if( $action == 'decrypt' ){
		        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		    }
		 
		    return $output;
		}
	}

?>