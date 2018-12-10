<?php
include('includes/db_connect.php');



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
        <div class="col-md-10 text-light"  style="background:black;opacity:0.8;">
            <table class="table">
              <thead class="bg-danger">
                <tr>
                  <th>Blood Group</th>
                  <th>Level</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql ="SELECT * FROM blood_levels";
                $result = mysqli_query($conn,$sql);

                  if($result->num_rows > 0){
                    while($row = mysqli_fetch_array($result))
                    {
                      ?>
                      <tr>
                        <td><?php echo $row['blood_group'] ?></td>
                        <td><?php echo $row['amount'] . " millilitres"?></td>
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

<?php include('includes/footer.php') ?>
</body>
</html>
