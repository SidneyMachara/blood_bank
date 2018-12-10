<?php
include('includes/db_connect.php');

if(!isset($_SESSION['admin_bank_id'])){
  header("location:index.php?");
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


              <div class="row mt-5 pt-5">
                <div class="col-md-8">

                  <h3 class="">Patients</h3>
                </div>
                <div class="col-md-4">
                    <a href="add_patient.php" class="btn btn-danger text-light text-bold shadow">Add Patient</a>
                </div>
              </div>

      <div class="row  mt-3">

        <table class="table ">
          <thead class="bg-danger">
            <tr>
              <th>name</th>
              <th>contact</th>
              <th>blood group</th>
              <th>diseases</th>
            </tr>
          </thead>

          <tbody class="text-light" style="background:black;opacity:0.6;">
            <?php
                $blood_bank = $_SESSION['admin_bank_id'];
                $sql ="SELECT * FROM patients WHERE bank_id = $blood_bank";
                $result = mysqli_query($conn,$sql);

                if($result->num_rows > 0){
                  while($row = mysqli_fetch_array($result))
                  {
                    ?>
                    <tr>
                      <td><a href="view_patient.php?patient_id=<?php echo $row['patient_id']  ?>"><?php echo $row['name'] ?></a></td>
                      <td><?php echo $row['contact'] ?></td>
                      <td><?php echo $row['blood_group'] ?></td>
                      <td><?php echo $row['diseases'] ?></td>

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

</body>
</html>
