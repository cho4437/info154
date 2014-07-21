<?php

class User{
	var $screen_name;
	var $friends_count;
	var $followers_count;
	var $profile_image_url;
	var $location;

	public function __construct($name, $friends, $follower, $image, $city) {
		$this->screen_name = $name;
		$this->friends_count = $friends;
		$this->followers_count = $follower;
		$this->profile_image_url = $image;
		$this->location = $city;
	}

	public function display() {
		echo 'Screen name: '. $this->screen_name.'<br>';
		echo 'Friends: <b>'. $this->friends_count.'</b> | ';
		echo 'Followers: <b>' . $this->followers_count. '</b><br>';
		echo '<img src='.$this->profile_image_url.'/></br>';
		echo 'Location: <b>'. $this->location. '</b><br>';
		echo '<hr>';
	}
}

