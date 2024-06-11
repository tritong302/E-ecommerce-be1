<?php
require("../../../config/Database.php");
require("../../../models/model.php");
require("../../../models/email.php");

if(isset($_GET['email_id'])){
  $id_email = intval($_GET['email_id']) ;
}
$Email = new Email();
$deleteEmail = $Email->deleteEmail($id_email);
header('location: email.php');
?>
