<?php
include('includes/db_connect.php');

if(isset($_POST['add'])){

  $name = $_POST['name'];
  $contact = $_POST['contact'];
  $blood_group = $_POST['blood_group'];
  $diseases = $_POST['diseases'];
  $weight = $_POST['weight'];
  $height = $_POST['height'];
  $bank_id = $_SESSION['admin_bank_id'];

  $sql = "INSERT INTO blood_donors (bank_id,name,contact,blood_group,diseases,weight,height)
         VALUES ('$bank_id','$name','$contact','$blood_group','$diseases','$weight','$height')";
  mysqli_query($conn, $sql);
  header("location:donors.php");
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php include('includes/head.php') ?>
<?php include('includes/navbar.php') ?>

<body class="" >

  <div class="container pt-5 pb-5 mb-5" style="background-image:url('images/a.png');
              height: 100vh;
              background-position: center;
              background-repeat: no-repeat;
              background-size: cover;
              ">

    <div class="row justify-content-md-center mt-5 pt-5">
      <div class="col-6">
        <div class="card" style="">

            <form class="ml-5 mr-5 mt-5" action="" method="post">

              <div class="form-group">
                <label for="name">Donor Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Donor Name" name="name" required>
              </div>

              <div class="form-group">
                <label for="contact">Donor Contact</label>
                <input type="number" class="form-control" id="contact" placeholder="Enter Donor Contact" name="contact" required>
              </div>

              <div class="form-group">
                <label for="blood_group">Blood Group</label>
                <select class="form-control" id="blood_group" name="blood_group">
                  <option value="A+">A+</option>
                  <option value="O+">O+</option>
                  <option value="B+">B+</option>
                  <option value="AB+">AB+</option>
                  <option value="A-">A-</option>
                  <option value="O-">O-</option>
                  <option value="B-">A-</option>
                  <option value="AB-">AB-</option>
                </select>
              </div>

              <div class="form-group">
                <label for="diseases">Donor Diseases</label>
                <input type="text" class="form-control" id="diseases" placeholder="Enter Donor diseases" name="diseases" required>
              </div>

              <div class="form-group">
                <label for="weight">Donor Weight</label>
                <input type="number" class="form-control" id="weight" placeholder="Enter Donor weight" name="weight" required>
              </div>

              <div class="form-group">
                <label for="height">Donor Height</label>
                <input type="number" class="form-control" id="height" placeholder="Enter Donor height" name="height" required>
              </div>


              <div class="form-group">
                <input type="submit" class="form-control btn btn-danger mb-5" id="submit" value="Add" name="add">
              </div>
            </form>
        </div>
      </div>

    </div>


  </div>

</body>
</html>
