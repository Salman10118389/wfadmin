<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * ACL Configuration (By Role Ids)
 */

// ['controller']['method']         Role Ids which have permission to visit, joined by comma

/**
 * 0 = Guest
 * 1 = Super Admin
 * 2 = Admin Content
 * 3 = Verifikator UP1
 * 4 = Verifikator UP2
 * 5 = Verifikator DKJ
 * 6 = Pemda
 */

//Front End
$acl['home']['*']                               = '0,1,2,3,4,5,6';  // home
$acl['login']['*']                              = '0,1,2,3,4,5,6';  // login and register
$acl['about']['*']                              = '0,1,2,3,4,5,6';  // login and register
$acl['news']['*']                               = '0,1,2,3,4,5,6';  // login and register
$acl['knowledge']['*']                          = '0,1,2,3,4,5,6';  // login and register
$acl['contact']['*']                            = '0,1,2,3,4,5,6';  // login and register
$acl['test_load']['*']                          = '0,1,2,3,4,5,6';  // login and register

//Backend
$acl['admin']['*']                              = '0,1';
$acl['profil']['*']                             = '0,1,2,3,4,5,6';
$acl['dashboard']['*']                          = '1,3,6';
$acl['diagnostic']['*']                         = '1,6';
$acl['profil']['*']                          	= '1,3,6';
$acl['verification']['*']                       = '1,2,3,4,5';
$acl['perbaikan']['*']                          = '0,6';
$acl['proses']['*']                             = '1,3,6';
$acl['log']['*']                                = '1,2,3,4,5,6';
$acl['setup']['*']                              = '1';
$acl['content']['*']                            = '1';
$acl['setup']['secretUpdatePullCommand']        = '0';
//identified as no used
//$acl['event']['*']                              = '';  // not used
//$acl['venue']['*']                              = '';  // not used
//$acl['facility']['*']                           = '';  // not used
//$acl['calendar']['*']                           = '';  // not used
//$acl['guide']['*']                              = '';  // not used
//$acl['pendaftaran']['*']                        = '0,1,2,3,4,5,6';
//$acl['proposal']['*']                           = '1,6';
//$acl['verifikator']['*']                        = '1,3,4,5';
//$acl['content']['*']                            = '1,2,3,4,5';


$config['acl'] = $acl;