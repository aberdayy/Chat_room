<?php
require("cnt.php");

$IpGet              = $_SERVER["REMOTE_ADDR"];
$ZamanDamgasi       = time();
$TarihSaat          = date("d/m/Y H:i:s", $ZamanDamgasi);

$username = $IpGet;
$message = $_POST['message'];

if ($message != null) {
$EklemeSorgusu     = $db->prepare("INSERT INTO chatbot (username, message, date) values(?, ?, ?) LIMIT 1");
$EklemeSorgusu->execute([$username, $message, $TarihSaat]);
$KayitKontrol         = $EklemeSorgusu->rowCount();

header("Location:chat.php");

}else{

    header("Location:chat.php");

}


?>