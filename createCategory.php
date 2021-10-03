<?php
if(!empty($_POST['name'])  || !empty($_FILES['file'])){
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
  
    

    //include database configuration file
    // include 'dbConfig.php';
    $db=mysqli_connect('localhost','root','','marketplace');

  $info2 = ("Select CategoryName from category where CategoryName = '" . $name . "'");  
 
  $result2= mysqli_query($db, $info2); 
  $row=mysqli_fetch_array($result2);

  if(isset($row[0])){
    print("This category exists")

    echo "exist";die;
  }else{
    echo "ok";
  }
  
  // print($category);die;

  // echo json_encode($row[0]);die;
  $query=("INSERT INTO category (CategoryName,CategoryImage) VALUES ('".$name."','".$uploadedFile."')");   
  // print($query);die; 
  $data = mysqli_query($db,$query);
    echo $data?'ok':'err';
}