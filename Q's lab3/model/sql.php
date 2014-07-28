<?php
require 'Tweet.php';
$accounts = mysql_connect("localhost", "root", "whrbals1")
or die ("cannot");

mysql_select_db("twitter", $accounts); 




$sql = "
INSERT INTO type (Friends, Followers) VALUES('$who', '$rt')
";

mysql_query($sql, $accounts);

?>