<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author Q
 */
class user {

    //put your code here
    var $screen_name;
    var $friend_count;
    var $followers_count;
    var $profile_image_url;
    var $location;

    public function __construct($name,$friends,$follower,$image,$city) {
       $this->screen_name=$name;
       $this->friend_count=$friends;
       $this->followers_count=$follower;
       $this->profile_image_url=$image;
       $this->location=$city;
    }
    
    public function display(){
        echo 'Screen Name: '.$this->screen_name.'<br>';
        echo 'Friends: <b> '.$this->friend_count.'</b><br>';
        echo 'Followers: '.$this->followers_count.'<br>';
        echo '<img src='.$this->profile_image_url.'/><br>';
        echo 'Location: '.$this->location.'<br>';
        echo '<hr>';
        
        
        
    }

}


    