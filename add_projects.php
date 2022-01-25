
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add projects</title>
  </head>
  <body>
  <div class="container">
  <form action="" method="post" enctype= "multipart/form-data">
      <h1 class="text-center py-5"> ADD details of the project</h1>
      
        <div class="mb-3">
            <label class="form-label">Project Name</label>
            <input type="text" name="p_name" class="form-control">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Project Category</label>
            <select class="form-select" name="p_category">
             <option>App</option>
             <option>Web</option>
             <option>Graphics</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="p_image">
        </div>

        <div class="mb-3">
            <label class="form-label">Details</label>
           <textarea class="form-control" name="p_details"> </textarea>
        </div>
        <button type="submit" name="insert-btn" class="btn btn-success">Submit</button>
</form>


<?php

$conn = mysqli_connect('localhost','root','','youtubetest');

if(isset($_POST['insert-btn'])){

    $p_name = $_POST['p_name'];
    $p_category = $_POST['p_category'];
    $p_image = $_FILES['p_image']['name'];
    $tmp_name = $_FILES['p_image']['tmp_name'];
    $p_details = $_POST['p_details'];

    $insert = "INSERT INTO project (p_name, p_category, p_image, p_details) VALUES ('$p_name','$p_category','$p_image','$p_details')";

    $run_insert = mysqli_query($conn, $insert);

    if($run_insert == true){
        echo "data inserted";
        move_uploaded_file($tmp_name,"uploads/$p_image");
    }else{
        echo "insertion failed";
    }

}


?>



</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>