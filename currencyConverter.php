<?php
//Currency converter
	function currencyConverter($from_Currency,$to_Currency,$amount=1) {
		$from_Currency = urlencode($from_Currency);
		$to_Currency = urlencode($to_Currency);
		//$encode_amount = 1;
		$get = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency");
		$get = explode("<span class=bld>",$get);
		$get = explode("</span>",$get[1]);
		$converted_currency = preg_replace("/[^0-9\.]/", null, $get[0]);
		return $converted_currency;
	}
	$toCurr = $_REQUEST['toCurr'];
	$amount = $_REQUEST['amount'];
	$fromCurr = $_REQUEST['fromCurr'];
	echo $convertedAmount = currencyConverter($fromCurr,$toCurr,$amount)
?>