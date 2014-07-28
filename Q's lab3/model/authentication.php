<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function setup(){
    
    require('../twitteroauth/twitteroauth.php');
    
    $consumerkey = 'XHynOTtGvDvp5Dj3RkOby9afe';
    $consumersecret = 'rgjI6AQOUijVxH4C7QB13SfwUAl3xXLVLYd9DVjVULx9nRhg3N';
    $accesstoken = '2469334872-62718kldnj9uqlM972qULGSZzZiKS9DMVL0WCxf';
    $accesstokensecret = 'Qijw7l2cU5iJ0EIuz0k22zYYpZKFNJ2zY2q8TGtRXl4Pz';
    
    $twitter=new TwitterOAuth($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
    return $twitter;
    
    
}

function searchUserTimeLine($twitter,$screen_name){
    $tweets=$twitter->get('https://api.twitter.com/1.1/statuses/user_timeline.json?'.'screen_name='.$screen_name.'&count=10');
    return $tweets;
       
}

function searchKeyword($twitter,$query,$since){
    if(strlen($since)<0){
        $since='&since='.$since;
    }
    $result_type='&result_type=mixed';
    $count='&count=20';
    $Q='https://api.twitter.com/1.1/search/tweets.json?q='.urlencode($query).$since.$result_type.$count;
    $tweets=$twitter->get($Q);
    $objs=$tweets->statuses;
    return $objs;
   
}


//$twitter=setup();
//$tweets=searchUserTimeline($twitter,'EdisonLao');
//$obj=$tweets[0];
//echo $obj->text;

