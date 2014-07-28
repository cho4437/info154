<?php

require('../model/authenticate.php');
require('../view/show.php');


$twitter = setup();

$mode = $_POST['mode'];
if ( $mode == 'Search User Timeline') {
	$screen_name = $_POST['screen_name'];
	$tweets = searchUserTimeline($twitter,$screen_name);
	showArray2($tweets);
}

else {

	$word = $_POST['keyword'];
	$since = $_POST['since'];

	if ( isset($word) && strlen($word) >0) {
		$tweets = searchKeyword($twitter,$word,$since);
		showArray2($tweets);
	}

else {
	head("Location: ../index.html");

	}
}


$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db('twitter');


foreach ($tweets as $value) {

    
    $id = $value->id;
    $created_at = $value->created_at;
    $created_at = mysql_real_escape_string($created_at);
    $text = $value->text;
    $text = mysql_real_escape_string($text);
    $user = $value->user->screen_name;
    $user = mysql_real_escape_string($user);
    $rt_count = $value->retweet_count;
    $rt_count = mysql_real_escape_string($rt_count);
    
    
    
    
    $sql = "INSERT INTO tweets (date,id,rt_count,text,user)  
             VALUES('$created_at','$id','$rt_count', '$text','$user')";
    
    $retval = mysql_query( $sql, $conn );
    if(! $retval )
    {
    die('Could not enter data: ' . mysql_error());
    }
    echo "Entered data successfully";
    echo "<br/>";
}



mysql_close($conn);

