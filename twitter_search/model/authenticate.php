<?php

function setup() {
	require('../twitteroauth/twitteroauth.php');

	$consumer_key = "PQ4lTOn7yJRkbO2kkxrIPBRyY";  
	$consumer_secret = "058Vi8zR2dTMDrZexhisjbHbweTaM9RgEA8aBcUKxB5HBlPZlQ";
	$access_token = "2281279532-eEkVsXmGfjoznqzB61A5lyJ7FUp9Ui7lTTgQQ3T";
	$access_token_secret = "uTybvDo0qFVLGGjpzzpnYskE3TqH3jVwP7YjgAODy6gAI";

	$twitter = new TwitterOAuth ($consumer_key, $consumer_secret, $access_token, $access_token_secret);
	return $twitter;
}

function searchUserTimeline($twitter, $screen_name) {
	$tweets = $twitter->get('https://api.twitter.com/1.1/statuses/user_timeline.json?'.'screen_name='.
		$screen_name.'&count=10');

	return $tweets;
}

function searchKeyword($twitter, $query) {
	
	$result_type = '&result_type=mixed';
	$count = '&count=10';
	$Q = 'https://api.twitter.com/1.1/search/tweets.json?q='. urlencode($query).$result_type.$count;

	$tweets = $twitter->get($Q);
	$objs = $tweets->statuses;
	return $objs;
}

// $twitter = setup();
// $tweets = searchUserTimeline($twitter, 'daniel_forsyth1');
//var_dump($tweets);

