<?php session_start(); ?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>login</title>
  </head>
  <body>
  <div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="jumbotron">
					<div class="my-5 py-5"></div>
					<div class="container bg-light rounded p-5">
					<h3 class="text-center py-4">Login - Admin panel</h3>
						<form method="post" action="">
							<div class="mb-3">
								<label class="form-label">Username</label>
								<input type="text" class="form-control" name="username">
							</div>
							<div class="mb-3">
								<label class="form-label">Password</label>
								<input type="password" class="form-control" name="password">
							</div>
							<input type="submit" class="btn btn-success d-block w-100" name="login-btn" value ="Login">
						</form>

                        <?php
                        $conn = mysqli_connect('localhost','root','','youtubetest');
                        
                        if(isset($_POST['admin_submit'])){
                            $username = $_POST['username'];
                            $password = $_POST['password'];

                            $select = "SELECT * FROM user WHERE username='$username' ";
                            $run = mysqli_query($conn,$select);
                            $row_project = mysqli_fetch_array($run);

                            $dbusername = $row_project['username'];
                            $dbpassword = $row_project['password'];

                            if($username == $dbusername && $password == $dbpassword ){
                               header("Location: index.php");
                                $_SESSION['username'] = $dbusername;

                            }else{
                                echo "wrong username or passord";
                            }

                            }
                        ?>


					</div>
			</div>
		</div>
		<div class="col-md-3"></div>
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