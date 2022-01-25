
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>View Projects</title>
  </head>
  <body>
  <div class="px-5">
  <h1 class="text-center py-5">Total Added Projects</h1> 

<!-- php for deleting data -->

    <?php
        $conn = mysqli_connect('localhost','root','','youtubetest');
        if(isset($_GET['del'])){
          $del_id = $_GET['del'];
        $delete = "DELETE FROM project WHERE p_id='$del_id'";
        $run_delete = mysqli_query($conn,$delete);
          if($run_delete == true){
            echo "Record has been deleted";
          }else{
            echo "Failed to delete the record";
          }
        }
    ?>




  <table class="table table-striped table-bordered" >
  <thead>
    <tr>
      <th>SN</th>
      <th>Project Name</th>
      <th>Project Category</th>
      <th>Image</th>
      <th>Project Details</th>
      <th>Delete</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>

  <?php

$conn = mysqli_connect('localhost','root','','youtubetest');
$select = "SELECT * FROM project";
$run = mysqli_query($conn,$select);
while($row_project = mysqli_fetch_array($run)){
    $p_id = $row_project['p_id'];
    $p_name = $row_project['p_name'];
    $p_category = $row_project['p_category'];
    $p_image = $row_project['p_image'];
    $p_details = $row_project['p_details'];

  ?>
    <tr>
      <td><?php echo $p_id; ?></td>
      <td><?php echo $p_name; ?></td>
      <td><?php echo $p_category; ?></td>
      <td><img src="uploads/<?php echo $p_image; ?>" height = "50px"></td>
      <td><?php echo $p_details; ?></td>
      <td><a class="btn btn-danger" href="view_projects.php?del=<?php echo $p_id; ?>">Delete</a> </td>
      <td><a class="btn btn-outline-secondary" href="edit_projects.php?edit=<?php echo $p_id; ?>">Edit</a> </td>
    </tr>
<?php  } ?>

  </tbody>
</table>


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