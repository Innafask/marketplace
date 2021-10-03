<?php
session_start();

$name=filter_input(INPUT_POST, 'name');
$surname=filter_input(INPUT_POST, 'surname');
$address=filter_input(INPUT_POST, 'address');
$photo=filter_input(INPUT_POST, 'photo');
$email=filter_input(INPUT_POST, 'email');
$connect=mysqli_connect('localhost','root','','userdb');
// echo "this is the id ".$_SESSION['id']; 

$query = "UPDATE user SET ussername = '".$name."', surname = '".$surname."', address= '".$address."', email = '".$email."' WHERE id = ".$_SESSION["id"];
// echo $query; die;

 $data = mysqli_query($connect,$query);
 // echo $data; die;
 if($data){
 	echo "<script type='text/javascript'>
  	alert('Your changes updated!');
  	window.location.href='../html/updateCategory.html';
  	</script>";
 }else{
 	echo "<script type='text/javascript'>
  	alert('Your changes are not updated!');
  	window.location.href='../html/updateCategory.html';
  	</script>";
 }
 
?>