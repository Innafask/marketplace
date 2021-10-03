<?php
if(!empty($_POST['name']) || !empty($_POST['unit']) || !empty($_FILES['file']['price'])){
    $uploadedFile = '';
    if(!empty($_FILES["file"]["type"])){
        $fileName = time().'_'.$_FILES['file']['name'];
        $valid_extensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["file"]["name"]);
        $file_extension = end($temporary);
        if((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)){
            $sourcePath = $_FILES['file']['tmp_name'];
            $targetPath = "../uploads/".$fileName;
            if(move_uploaded_file($sourcePath,$targetPath)){
                $uploadedFile = $fileName;
            }
        }
    }
    
    $name = $_POST['name'];
    $unit=$_POST['unit'];
    $price=$_POST['price'];
    $category = $_POST['category'];


    //include database configuration file
    // include 'dbConfig.php';
    $db=mysqli_connect('localhost','root','','marketplace');
    //insert form data in the database

  $info = ("Select CategoryId from category where CategoryName = '" . $category . "'");  
  // print($info);die;
  $result= mysqli_query($db, $info); 
  $row=mysqli_fetch_array($result);

  if(isset($row[0])){
    $category = $row[0];
  }else{
    echo "not exist";die;
  }

  $info2 = ("Select ItemName from item where ItemName = '" . $name . "'");  
 
  $result2= mysqli_query($db, $info2); 
  $row2=mysqli_fetch_array($result2);

  if(isset($row[0])){
    echo "exist";die;
  }

  if(isset($row[0])){
    $category = $row[0];
  }else{
    echo "not exist";die;
  }
  // print($category);die;

  // echo json_encode($row[0]);die;
  $query=("INSERT INTO item (ItemName,Unit,Price,ItemImage,CategoryId) VALUES ('".$name."','".$unit."','".$price."','".$uploadedFile."','". $category."')");   
  // print($query);die; 
  $data = mysqli_query($db,$query);
    echo $data?'ok':'err';
}