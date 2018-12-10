<?php
include('includes/db_connect.php');

if(isset($_POST['submit'])){

  $email = $_POST['email'];
  $password = $_POST['password'];


    $sql = "SELECT * FROM admins WHERE email = '$email'";
    $result = mysqli_query($conn,$sql);

    if($result->num_rows == 0){
        header("location:index.php?no=1");
    }else{
      $row = mysqli_fetch_assoc($result);
      if( md5($password) === $row['password'] ){

        $_SESSION['admin'] = $row['admin_id'];
        $_SESSION['admin_bank_id'] = $row['blood_bank_id'];
        header("location:donors.php");
      }else{

          header("location:index.php?no=2");

      }

    }

}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php include('includes/head.php') ?>
<?php include('includes/navbar.php') ?>

<body class="" >

  <div class="container pt-5" style="background-image:url('images/a.png');
              height: 100vh;
              background-position: center;
              background-repeat: no-repeat;
              background-size: cover;
              ">

    <div class="row justify-content-md-center mt-5 pt-5">
      <div class="col-6">
        <div class="card" style="">
            <h2 class="mx-auto mt-3">Login</h2>
            <form class="ml-5 mr-5 mt-5" action="index.php" method="post">
              <?php if(isset($_GET['no'])){
                ?>
                      <p class="alert alert-danger">Bad Email  or Password</p>
                <?php
              } ?>


              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
              </div>

              <div class="form-group">
                <input type="submit" class="form-control btn btn-danger mb-5" id="submit" value="Login" name="submit">
              </div>
            </form>
        </div>
      </div>

    </div>


  </div>

<?php include('includes/footer.php') ?>
</body>
</html>
