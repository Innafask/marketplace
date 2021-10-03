<?php
   include('session.php');
?>
<html">
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <h2><a href = "../html/createItem.html">Create Item</a></h2>
      <h2><a href = "../html/createCategory.html">Create Category</a></h2>
      <h2><a href = "../html/updateItem.html">Update Item</a></h2>
      <h2><a href = "../html/updateCategory.html">Update Category</a></h2>
      <h2><a href = "../html/deleteItem.html">Delete Item</a></h2>
       <h2><a href = "../html/deleteCategory.html">Delete Category</a></h2>


   </body>
   
</html>