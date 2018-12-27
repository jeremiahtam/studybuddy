<?php 
include("../inc/session.inc.php");
include("../inc/db.inc.php");

$comment_id = htmlentities($_POST['comment_id']);		

echo"
<form>
  <div class='form-group'>
    <textarea class='form-control input-sm' rows='1' data-reply-textarea-id='$comment_id'></textarea>
    <button class='btn btn-sm btn-outline-primary' data-reply-button-id='$comment_id'>Reply</button>
  </div>
</form>
";
?>