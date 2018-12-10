<?php
include('includes/db_connect.php');

$patient_id = $_GET['patient_id'];
$sql = "SELECT * FROM patients WHERE patient_id = $patient_id";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$patient_blood_group = $row['blood_group'];

//get remainging blood that matches patient blood type
$sql2 = "SELECT * FROM blood_levels WHERE blood_group = '$patient_blood_group'";
$result2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_assoc($result2);


if(isset($_POST['useblood'])){
  $availble_amount = $row2['amount'];
  $amount_to_use = $_POST['blood'];

  if( $availble_amount >= $amount_to_use){
    // decrease blood level in db
    $sql = "UPDATE blood_levels SET amount = amount - $amount_to_use WHERE blood_group = '$patient_blood_group'";
    mysqli_query($conn, $sql);

    //update blood level on this page
    $result2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_assoc($result2);
  }

}

if(isset($_POST['delete'])){
  $sql = "DELETE FROM patients WHERE patient_id = $patient_id";
  mysqli_query($conn, $sql);
    header("location:patients.php");
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
                  <h3 class="text-danger">Patient Info</h3>
                  <hr>
                  <h3>Name:</h3>
                  <h4 class="text-muted"><?php echo $row['name']; ?></h4>

                  <h3>Contact:</h3>
                  <h4 class="text-muted"><?php echo $row['contact']; ?></h4>

                  <h3> Blood Group:</h3>
                  <h4 class="text-muted"><?php echo $row['blood_group']; ?></h4>

                  <h3> Diseases:</h3>
                  <h4 class="text-muted"><?php echo $row['diseases']; ?></h4>

                </div>

              </div>
              <div class="col-md-9 ">


                <div class="row">
                  <div class="col-md-12">
                    <div class="bg-danger w-25 pt-3 pb-3" style="opacity:0.9;">
                      <form class="mx-auto w-50 mt-3" action="view_patient.php?patient_id=<?php echo $patient_id  ?>" method="post">
                        <div class="form-group">

                          <div class="form-group">

                            <label for="blood" class="text-light">Use </label>
                            <input type="number" class="form-control" id="blood" placeholder=" Amount" name="blood" required>
                          </div>

                          <input type="submit" class="form-control btn btn-info" id="useblood"  name="useblood" value="Use Blood">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="row mt-3" >
                  <div class="col-md-12">
                      <div class="card card-body " style="opacity:1;">
                          <h4 class="text-danger">Availble Blood</h4>
                          <table class="table">

                              <tr>
                                <th><?php echo $row2['blood_group']?></th>
                                <td><?php echo $row2['amount'] ." millilitres"?></td>
                              </tr>


                          </table>
                      </div>
                  </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-4">
                      <form class="" action="view_patient.php?patient_id=<?php echo $row['patient_id']  ?> " method="post">
                          <input type="submit" class="form-control btn btn-info" id="delete"  name="delete" value="Remove patient">
                      </form>
                    </div>
                </div>


              </div>
            </div>
        </div>
      </div>

  </div>

</body>
</html>
