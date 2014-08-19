<html>
<table>
<tr>
<td>date</td>
<td>id</td>
<td>rt_count</td>
<td>text</td>
<td>user</td>

</tr>



<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'whrbals1';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db('twitter');
$results = mysql_query("SELECT tweet.date, tweet.id, tweet.rt_count, tweet.text, tweet.user
FROM tweet
JOIN second_tweet ON tweet.text = second_tweet.text
LIMIT 0 , 30");
while($row =mysql_fetch_array($results)) {


?>
	<tr>
		<td><?php echo $row['date']?>  </td>
		<td><?php echo $row['id']?>  </td>
		<td><?php echo $row['rt_count']?>  </td>
		<td><?php echo $row['text']?>  </td>
		<td><?php echo $row['user']?>  </td>
	</tr>
<?php
}
?>

</table>
</html>