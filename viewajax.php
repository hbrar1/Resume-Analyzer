 <?php
 include("db.php");

if(isSet($_POST['msg_id']))
{
$id=$_POST['msg_id'];
$com=mysql_query("select * from positionannouncement where positionannouncementid='$id' order by positionannouncementid");
while($r=mysql_fetch_array($com))
{
$c_id=$r['positionannouncementid'];
$comment=$r['positiontitle'];
?>


<div class="comment_ui" >
<div class="comment_text">
<div  class="comment_actual_text"><?php echo $comment; ?></div>
</div>
</div>


<?php } }?>