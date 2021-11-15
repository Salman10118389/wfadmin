<?php defined('BASEPATH') OR exit('No direct script access allowed.');


$config['protocol'] 			= 'smtp';
$config['smtp_host'] 			= 'smtp.googlemail.com';
$config['smtp_port'] 			= 587;
$config['smtp_user'] 			= 'ahmadsahro@gmail.com'; // 
$config['smtp_pass'] 			= 'odiwmwstsfzhzdke';// 
$config['charset'] 				= 'iso-8859-1';
$config['mailtype'] 			= 'html';
$config['newline'] 				= "\r\n";
$config['useragent']        	= 'PHPMailer';
$config['mailpath']         	= '/usr/sbin/sendmail';
$config['smtp_timeout']     	= 30;                       
$config['smtp_crypto']      	= 'tls';
$config['smtp_debug']       	= 0; 
$config['debug_output']     	= '';   
$config['smtp_auto_tls']    	= false;      
$config['smtp_conn_options'] 	= array();      
$config['wordwrap']         	= true;
$config['wrapchars']        	= 76;
$config['validate']         	= true;
$config['priority']         	= 3;           
$config['crlf']             	= "\n";      
$config['bcc_batch_mode']   	= false;
$config['bcc_batch_size']   	= 200;
$config['encoding']         	= '8bit';          
$config['dkim_domain']      	= '';                       
$config['dkim_private']     	= '';                       // DKIM private key, set as a file path.
$config['dkim_private_string'] 	= '';                    // DKIM private key, set directly from a string.
$config['dkim_selector']    	= '';                       // DKIM selector.
$config['dkim_passphrase']  	= '';                       // DKIM passphrase, used if your key is encrypted.
$config['dkim_identity']    	= '';                       // DKIM Identity, usually the email address used as the source of the email.
