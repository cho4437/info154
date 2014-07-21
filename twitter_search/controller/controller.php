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
	head("Location: ../index1.html");

	}
}