<?php
include("../inc/session.inc.php");
include("../inc/db.inc.php");
$modal_content = $_POST['modal_content'];
if(isset($_POST['delete_id'])){
  $delete_type = $_POST['delete_type'];
  $delete_id = $_POST['delete_id'];
}

switch($modal_content){
		
	case 'delete-conversation':
	
		echo "
     <div class='modal-content delete-msg-conversation' id='delete-msg-conversation'>
         
       <div class='modal-header'>
         <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
         <h4 class='modal-title'>Delete This Conversation</h4>
       </div><!--modal header-->

       <div class='modal-body'>
		 <p>Are you sure you want to delete this conversation permanently?</p>         		  
       </div><!--end modal-body-->
	   <div class='modal-footer'>
		 <form method='post' id='delete_conversation_form' name='delete_conversation_form'>
		   <button type='submit' class='btn btn-default' data-dismiss='modal' aria-label='Close'>Cancel</button>         
		   <button type='submit' class='btn btn-outline-danger' name='delete_conv' id='delete_conv' data-delete-type='$delete_type' data-delete-id='$delete_id'>Delete
		 </form><!--end delete_conversation_form-->
       </div> 
     </div><!--end modal-content-->
		";
		break;
	case 'delete-message':
	
		echo "
     <div class='modal-content delete-individual-msg' id='delete-individual-msg'>
         
       <div class='modal-header'>
         <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
         <h4 class='modal-title'>Delete This Message</h4>
       </div><!--modal header-->

       <div class='modal-body'>
		 <p>Are you sure you want to delete this message permanently?</p>         		  
       </div><!--end modal-body-->
	   <div class='modal-footer'>
		 <form method='post' id='delete_msg_form' name='delete_msg_form'>
		   <button type='submit' class='btn btn-default' data-dismiss='modal' aria-label='Close'>Cancel</button>         
		   <button type='submit' class='btn btn-outline-danger' name='delete_msg' id='delete_msg' data-delete-type='$delete_type' data-delete-id='$delete_id'>Delete
		 </form><!--end delete_msg_form-->
       </div> 
     </div><!--end modal-content-->
		";
		break;

	default:
		echo "
		";

	}
?>