<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '348416987249-j1podq677puapt8kfeh9c2tuhqtc3nue.apps.googleusercontent.com';
$config['google']['client_secret']    = 'nDLmy4qeF8goK5bLZdGVKjvI';
$config['google']['redirect_uri']     = 'http://www.centraelektronik.online/google-login';
$config['google']['application_name'] = 'centraelektronik';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();