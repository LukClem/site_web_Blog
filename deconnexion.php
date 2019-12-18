<?php
//Modification du cookie. La valeur négative l'annule et le supprime. 
setcookie('sid','', -1);
header("Location : index.php");
exit();

?>