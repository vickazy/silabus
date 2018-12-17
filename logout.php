<?php
include "config.php";
session_start();

$otoritas = $_SESSION['otoritas'];
$namapengguna = $_SESSION['username'];

if($otoritas==1){
	$msg = "User ".$namapengguna." logout dari sistem.";
	$msg = "INFO LOG OUT\nUsername : ".$namapengguna."\nOtoritas :  admin\nTelah logout dari sistem.";
	$request_params = [
		'chat_id' => $user_id,
		'text' => $msg,
	];

	$request_url = "https://api.telegram.org/bot".$token."/sendMessage?".http_build_query($request_params);
	file_get_contents($request_url);
} else if($otoritas!=1){
	$msg = "INFO LOG OUT\nUsername : ".$namapengguna."\nOtoritas :  user\nTelah logout dari sistem.";
	$request_params = [
		'chat_id' => $user_id,
		'text' => $msg,
	];

	$request_url = "https://api.telegram.org/bot".$token."/sendMessage?".http_build_query($request_params);
	file_get_contents($request_url);
}


session_destroy();
header("location:index.php");
?>