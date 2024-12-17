<?php
require_once './vendor/autoload.php';
use Zalo\Zalo;

$config = array(
    'app_id' => '3788018877971447737',
    'app_secret' => 'ue56OuEXYM8WjJ41TkD2'
);
$zalo = new Zalo($config);

$helper = $zalo -> getRedirectLoginHelper();

$callbackUrl = "https://www.callbackack.com";
$codeChallenge = "your code challenge";
$state = "your state";


$loginUrl = $helper->getLoginUrl($callBackUrl, $codeChallenge, $state);
?>