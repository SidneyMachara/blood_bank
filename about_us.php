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

            <div class="col-md-12">
              <div id="accordion">
                <div class="card">
                  <div class="card-header bg-dark" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        What are the benefits of donating blood?
                      </button>
                    </h5>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                      Blood donation may lower the risk of heart disease and heart attack. This is because it reduces the blood's viscosity. A 2013 study found that regular blood donation significantly lowered the mean total cholesterol and low-density lipoprotein cholesterol, protecting against cardiovascular disease
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header bg-dark" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        What are the side effects of donating blood?
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                    <ul>
                      <li>You still feel lightheaded, dizzy, or nauseous after drinking, eating, and resting.
                      </li>
                      <li>You develop a raised bump or continue bleeding at the needle site.</li>
                      <li>You have arm pain, numbness, or tingling.</li>
                    </ul>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header bg-dark" id="headingThree">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        What should I eat after donating blood?
                      </button>
                    </h5>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                      Eat iron-rich foods, such as red meat, fish, poultry, beans, spinach, iron-fortified cereals or raisins.
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </div>


  </div>


</body>
</html>
