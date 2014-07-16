<?php

class Tweet {
 var $created_at;
 var $user;
 var $text;
 var $retweet_count;
    
    public function __construct($when,$who,$what,$rt) {
        $this->created_at = $when;
        $this->user = $who;
        $this->text = $what;
        $this->retweet_count=$rt;
    }
    
    public function display() {
        echo $this->created_at.'<br>';
        echo 'Tweet: <i>'.$this->text.'</i><br>';
        echo 'Reweeted: '.$this->retweet_count.'<br>';
        echo $this->user->display();
    }
    
    /**
     * 'This     is not a tweet, but a string.';
     */
    
    
}

?>
