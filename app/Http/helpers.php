<?php

function dfDb($date){ 
    return date("Y-m-d",strtotime($date));
}
function df($date){
	if ($date == "1970-01-01" || $date == "0000-00-00"){
		return "";
	} else {
		return date("d.m.Y",strtotime($date));
	}
}
function nmM($value){
	return number_format($value, 2, '.',',');
}
function nm($value){
	return number_format($value, 2, '.',',');
}

function pre($str){
	echo "<pre>";
	print_r($str);
	echo "</pre>";
}

function gunler($data){

	$gunler = "";
	if ($data != ""){
		$arr = explode(",", $data);

		foreach ($arr as $a) {
			if ($a == 1){
				$gunler .= "Pazartesi";
			} elseif ($a == 2){
				$gunler .= "Salı";
			} elseif ($a == 3){
				$gunler .= "Çarşamba";
			} elseif ($a == 4){
				$gunler .= "Perşembe";
			} elseif ($a == 5){
				$gunler .= "Cuma";
			} elseif ($a == 6){
				$gunler .= "Cumartesi";
			} elseif ($a == 7){
				$gunler .= "Pazar";
			}
			$gunler .= ", ";
		}
	}

	return rtrim($gunler,", ");
}

function cinsiyet($cns){
	if ($cns == 1){
		return "Erkek";
	} elseif ($cns == 2){
		return "Kadın";
	}
}

function mltToStr($arr){

	$string = "";
	if (count($arr != 0) && $arr != ""){
		$string = "";
		foreach ($arr as $g) {
			$string .= $g.",";
		}
		$string = rtrim($string,",");
	}
	return $string;
}



function kasa_tipi($val){
	if ($val == 1){
		return "Tahsilat";
	} elseif ($val == 2){
		return "Ödeme";
	}
}

function sstr($str,$len){

	if (strlen($str) > $len) {
	    $str = wordwrap($str, $len);
	    $str = substr($str, 0, strpos($str, "\n"))."...";
	}
	return $str;
}

function uclu($uclu) {  
    $uclu=trim($uclu);  
    $yazi = array(  
    "0" => array("2" => "","1" => "","0" => ""),  
    "1" => array("2" => "bir","1" => "On","0" => "yüz"),  
    "2" => array("2" => "iki","1" => "yirmi","0" => "ikiyüz"),  
    "3" => array("2" => "üç","1" => "otuz","0" => "üçyüz"),  
    "4" => array("2" => "dört","1" => "kırk","0" => "dörtyüz"),  
    "5" => array("2" => "beş","1" => "elli","0" => "beşyüz"),  
    "6" => array("2" => "altı","1" => "altmış","0" => "altıyüz"),  
    "7" => array("2" => "yedi","1" => "yetmiş","0" => "yediyüz"),  
    "8" => array("2" => "sekiz","1" => "seksen","0" => "sekizyüz"),  
    "9" => array("2" => "dokuz","1" => "doksan","0" => "dokuzyüz") );  

    $ucluyazi="";  
    for ($i=0;$i<=2;$i++){  
        $ucluyazi.=$yazi[(substr($uclu,$i,1))][$i];  
    }  
	return($ucluyazi);  
}  
function yaziyacevir($sayi) {  
    $olay = array("0" =>" ","1" =>" ","2" =>"bin","3" =>"milyon","4" =>"milyar","5" =>"trilyon");  
    $sayi = trim($sayi); 
    $uzunluk = strlen($sayi);  
    if ($uzunluk > 15) exit("Girdiğiniz Sayı Çok Büyük...");  
        $kalan = $uzunluk-3*($tane=floor($uzunluk/3));  
    if ($kalan!=0) {  
        $tane++;  
        for ($i=0;$i<=$kalan;$i++) {  
            $sayi="0".$sayi;  
            $uzunluk++;  
        }  
    }  
    $yazi=""; 

    for ($i=$tane;$i>=1;$i--){  
        if (!($i==2 and (substr($sayi,($uzunluk-($i*3)),3)=="001")))  
            $yazi.=uclu(substr($sayi,($uzunluk-($i*3)),3));  
            if ((substr($sayi,($uzunluk-($i*3)),3)!="000")) $yazi.=$olay[$i];  
    }  
    return ($yazi);  
} 

function dateDiff ($date1_1,$date2_1){
	$date1		= explode("-",$date1_1);
	$date2  	= explode("-",$date2_1);
	$endDate	= gregoriantojd($date1[1], $date1[2], $date1[0]);
	$today		= gregoriantojd($date2[1], $date2[2], $date2[0]);
	$diff		= $endDate - $today;
	
	return $diff;
}

function sms_gonder($Url,$strRequest) {
	$ch=curl_init();
	curl_setopt($ch, CURLOPT_URL, $Url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1) ;
	curl_setopt($ch, CURLOPT_POSTFIELDS, $strRequest);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}

function replace_tr($text) {
	$text = trim($text);
	$search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ');
	$replace = array('C','c','G','g','i','I','O','o','S','s','U','u',' ');
	$new_text = str_replace($search,$replace,$text);
	return $new_text;
}


function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

//Raporlar checkbox kontrol
function rpc($list,$req=""){
	if($list == 0)
		return 'checked="checked"';
	elseif($req != "") 
		return 'checked="checked"';
}

function yetki($val,$page){
	$role_id    = Auth::user()->role_id;
    $roles      = DB::table('roles')->find($role_id);

    $page = explode(",", $roles->$page);

    if(in_array($val,$page)){
    	return true;
    } else {
    	return false;
    }
}
