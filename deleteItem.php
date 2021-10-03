<?php 
    $delete=filter_input(INPUT_POST, 'delete_name');
    $connect=mysqli_connect('localhost','root','','marketplace');
    $query = "DELETE FROM item WHERE ItemName=" . "'$delete'";
 // echo $query; die;

 $data = mysqli_query($connect,$query);
 if($data){
 	echo "<script type='text/javascript'>
  	alert('Your changes updated!');
  	window.location.href='../html/deleteItem.html';
  	</script>";
 }else{
 	echo "<script type='text/javascript'>
  	alert('Your changes are not updated!');
  	window.location.href='../html/deleteItem.html';
  	</script>";
 }    	    
?>