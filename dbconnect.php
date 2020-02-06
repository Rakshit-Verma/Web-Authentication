<?php
// phpinfo();
require 'vendor/autoload.php';
$m = new MongoDB\Client('mongodb://localhost:27017');
// echo "Connection to database successful!\n";
$db = $m->mydb;
//Clear collection
// $db->faculty->drop();
// $db->awards->drop();
// $db->publications->drop();
?>
<html>

</html>