<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../model/user.php';
require '../model/Tweet.php';

function showArray($tweets) {

    foreach ($tweets as $tweet) {
        $user = new User($tweet->user->screen_name, $tweet->user->friends_count, $tweet->user->followers_count, $tweet->user->profile_image_url,$tweet->user->location);
        $twt=new Tweet($tweet->created_at, $user, $tweet->text, $tweet->retweet_count);
        $twt->display();
    }
}


?>