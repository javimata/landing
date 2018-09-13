<?php
/**
 * RandomString function generate a random string
 *
 * @param integer $length - is the long of the string
 * @param boolean $uc     - add a case range letters
 * @param boolean $n      - add numbers
 * @param boolean $sc     - add special characters
 * @return void
 */
function RandomString($length=10,$uc=TRUE,$n=FALSE,$sc=FALSE) {

    $source = 'abcdefghijklmnopqrstuvwxyz';
    if($uc==1) $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if($n==1) $source .= '1234567890';
    if($sc==1) $source .= '|@#~$%()=^*+[]{}-_';
    if($length>0){
        $rstr = "";
        $source = str_split($source,1);
        for($i=1; $i<=$length; $i++){
            mt_srand((double)microtime() * 1000000);
            $num = mt_rand(1,count($source));
            $rstr .= $source[$num-1];
        }
 
    }
    return $rstr;

}
/**
 * cleanString function that clean a string
 *
 * @param string  $text - Text to clear
 * @return void
 */
function cleanString( $text="" ) {

    $strS = array('(',')',' ','-','•');
    $strL = array('');

    $text = str_replace($strS,$strL,$text);

    return $text;

}

/**
 * replaceString Replace a character in a string
 *
 * @param string $text Text to apply the replace rules
 * @return void
 */
function replaceString( $text = "" ) {

    $strS = array('[Y]','[adview]');
    $strL = array(date('Y'),'<a href="http://www.adview.mx" target="_blank"><img src="images/logo-adview.png" class="img-fluid" /></a>');

    $text = str_replace($strS,$strL,$text);

    return $text;

}

/**
 * get Configuration json
 *
 * @return void
 */
function getConfig() {

    $jsonStr = file_get_contents("config.json");
    $config  = json_decode($jsonStr);

    return $config;

}
