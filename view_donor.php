<?php
include('includes/db_connect.php');

$donor_id = $_GET['donor_id'];
$sql = "SELECT * FROM blood_donors WHERE donor_id = $donor_id";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$donor_blood_group = $row['blood_group'];

if(isset($_POST['donate'])){
  //record donation
  $donated_amout = $_POST['blood'];
  $bank_id = $_SESSION['admin_bank_id'];
  $sql = "INSERT INTO donations (donor_id,bank_id,amount)
         VALUES ('$donor_id','$bank_id','$donated_amout')";
  mysqli_query($conn, $sql);

  // increase blood level in db
  $sql = "UPDATE blood_levels SET amount = amount + $donated_amout WHERE blood_group = '$donor_blood_group'";
  mysqli_query($conn, $sql);


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

      <div class="row mt-3 pt-5">
        <div class="col-md-12">
            <div class="row">
              <div class="col-md-3">
                <div class="card card-body " style="background:white;opacity:0.9;">
                  <h3 class="text-danger">Donor Info</h3>
                  <hr>
                  <h3>Name:</h3>
                  <h4 class="text-muted"><?php echo $row['name']; ?></h4>

                  <h3>Contact:</h3>
                  <h4 class="text-muted"><?php echo $row['contact']; ?></h4>

                  <h3> Blood Group:</h3>
                  <h4 class="text-muted"><?php echo $row['blood_group']; ?></h4>

                  <h3> Diseases:</h3>
                  <h4 class="text-muted"><?php echo $row['diseases']; ?></h4>

                  <h3> Weight:</h3>
                  <h4 class="text-muted"><?php echo $row['weight']; ?></h4>

                  <h3> Height:</h3>
                  <h4 class="text-muted"><?php echo $row['height']; ?></h4>
                </div>

              </div>
              <div class="col-md-9 ">


                <div class="row">
                  <div class="col-md-12">
                    <div class="bg-danger w-25 pt-3 pb-3" style="opacity:0.9;">
                      <form class="mx-auto w-50 mt-3" action="view_donor.php?donor_id=<?php echo $donor_id  ?>" method="post">
                        <div class="form-group">
                          <label for="blood" class="text-light">Amount</label>
                          <input type="number" class="form-control" id="blood" placeholder="Donated Amount" name="blood" required>
                        </div>
                        <div class="form-group">

                          <input type="submit" class="form-control btn btn-info" id="donate"  name="donate" value="Enter">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="row mt-3" >
                  <div class="col-md-12">
                      <div class="card card-body " style="opacity:1;">
                          <h4 class="text-danger">Match</h4>
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Amount</th>
                                <th>Date</th>
                              </tr>
                            </thead>

                            <tbody>
                              <?php

                                  $sql ="SELECT * FROM donations WHERE donor_id = $donor_id";
                                  $result = mysqli_query($conn,$sql);

                                  if($result->num_rows > 0){
                                    while($row = mysqli_fetch_array($result))
                                    {
                                      ?>
                                      <tr>

                                        <td><?php echo $row['amount'] ." millilitres"?> </td>
                                        <td><?php echo $row['date'] ?></td>

                                      </tr>
                                      <?php
                                    }
                                  }else{

                                  }
                               ?>

                            </tbody>
                          </table>
                      </div>
                  </div>
                </div>


              </div>
            </div>
        </div>
      </div>

  </div>

</body>
</html>
