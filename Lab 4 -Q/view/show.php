<?php

require('../model/tweet.php');
require('../model/user.php');

function showArray2($tweets) {
	foreach ($tweets as $obj) {
		$user = new User($obj->user->screen_name,
			$obj->user->friends_count,
			$obj->user->followers_count,
			$obj->user->profile_image_url,
			$obj->user->location
			);
		$twt = new Tweet($obj->created_at,$user,$obj->text,$obj->retweet_count);
		$twt->display();
		

		
	}
}

function showArray3($second_tweets) {
	foreach ($second_tweets as $obj) {
		$user = new User($obj->user->screen_name,
			$obj->user->friends_count,
			$obj->user->followers_count,
			$obj->user->profile_image_url,
			$obj->user->location
			);
		$twt = new Tweet($obj->created_at,$user,$obj->text,$obj->retweet_count);
		$twt->display();
		

		
	}
}

?>


<html>
<form action="TwitterReport.php" method="post">
Data comparison??<input type="submit">

</form>
</html>