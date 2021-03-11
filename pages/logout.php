<?php 

include("baglan.php");


// SON GİRİŞ İŞLEMİNİ GUNCELLEYELİM
$son_giris = $db->prepare("UPDATE admin SET son_giris_tarih=:son_giris_tarih WHERE admin_kadi=:admin_kadi");
$son_giris_guncelle = $son_giris->execute(array(
	"son_giris_tarih"=>$_SESSION['son_giris_tarih'],
	"admin_kadi"=> $_SESSION["admin_kadi"]
));


session_start();
session_destroy();
header("Location: login.php");

 ?>