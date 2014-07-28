 <?php

/* require_once './model/Tweet.php';

  $myt1 = 'Thursday 2050';
  $myt2 = 'This morning is not like that morning.';

  $json1 = new stdClass();
  $json1->created_at = $myt1;
  $json1->from_user_name = "me";
  $json1->text = $myt2;


  $tweet_obj = new Tweet($json1);

  // this is how to assign a Tweet object to the end of an array
  $array_objs[] = $tweet_obj;

  echo $tweet_obj->getText();
  echo '<br>';
  echo $tweet_obj->getWords(); */

//require '../model/authentication.php';
require '../view/show.php';
require '../model/authentication.php';

$twitter= setup();

$mode = $_POST['mode'];



if ($mode=="Timeline") {
       $screen_name=$_POST['screen_name'];
       $tweets=searchUserTimeLine($twitter,$screen_name);
       showArray($tweets); 
        
        
}

else {
        $word=$_POST['keyword'];
        $since=$_POST['since'];
        
        if(isset($word)&& strlen($word)>0){
            $tweets=  searchKeyword($twitter, $word, $since);
            showArray($tweets);
        }
 else {
            //header("Location:../index.html");
            echo 'mode fail';
        
    }}

    
$accounts = mysql_connect("localhost", "root", "whrbals1")
or die ("cannot");

mysql_select_db("twitter", $accounts); 

foreach ($tweets as $value) {
    $id = $value->id;
    $created_at =$value->created_at; 
    $created_at = mysql_real_escape_string($created_at);
    
}

       


$accounts = mysql_connect("localhost", "root", "whrbals1")
or die ("cannot");

mysql_select_db("twitter", $accounts); 

foreach ($tweets as $value) {
    $id = $value->id;
    $created_at =$value->created_at; 
    $created_at = mysql_real_escape_string($created_at);
    
}

       


$sql = "
INSERT INTO tweet (Friends, Followers) VALUES('$id', '$created_at')";


mysql_query($sql, $accounts);
?>
