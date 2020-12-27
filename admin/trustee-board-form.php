<!DOCTYPE html>
<html lang="en">

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/mosque/admin/template_parts/header.php";
?>

<body>
  <div class="container-scroller">
    <!-- navigation bar -->
    <?php

    include $_SERVER['DOCUMENT_ROOT'] . "/mosque/admin/template_parts/navbar.php";
    ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- top bar -->
      <?php

      include $_SERVER['DOCUMENT_ROOT'] . "/mosque/admin/template_parts/topbar.php";
      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">Trustee Board Details</h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/mosque/admin/forms.php">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Trustee Board Details</li>
              </ol>
            </nav>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card shadow">
                <div class="card-body">
                  <form class="pt-3">
                    <div id="presidentdetails">
                      <h4 class="card-title">President Details Form</h4>
                      <div class="form-group">
                        <label for="inputPresidentName">Name of the President </label>
                        <input type="text" class="form-control" id="inputPresidentName" placeholder="Name">
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputPresidentJob">Job </label>
                          <input type="text" class="form-control" id="inputPresidentJob" placeholder="Job">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPresidentTP">Telephone Number </label>
                          <input type="text" class="form-control" id="inputPresidentTP" placeholder="Telephone">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputPresidentAddress1">Address Line 1 </label>
                          <input type="text" class="form-control" id="inputPresidentAddress1" placeholder="Number">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPresidentAddress2">Address Line 2 </label>
                          <input type="text" class="form-control" id="inputPresidentAddress2" placeholder="Street Address">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPresidentAddress3">Address Line 3 </label>
                        <input type="text" class="form-control" id="inputPresidentAddress3" placeholder="City">
                      </div>

                      <div class="w-100 text-right">
                        <button class="btn btn-primary btn-lg" id="TBNext1">Next</button>
                      </div>
                    </div>
                    <div id="VPdetails">
                      <h4 class="card-title">Vice President Details Form</h4>
                      <div class="form-group">
                        <label for="inputVPName">Name of the Vice President </label>
                        <input type="text" class="form-control" id="inputVPName" placeholder="Name">
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputVPJob">Job </label>
                          <input type="text" class="form-control" id="inputVPJob" placeholder="Job">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputVPTP">Telephone Number </label>
                          <input type="text" class="form-control" id="inputVPTP" placeholder="Telephone">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputVPAddress1">Address Line 1 </label>
                          <input type="text" class="form-control" id="inputVPAddress1" placeholder="Number">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputVPAddress2">Address Line 2 </label>
                          <input type="text" class="form-control" id="inputVPAddress2" placeholder="Street Address">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputVPAddress3">Address Line 3 </label>
                        <input type="text" class="form-control" id="inputVPAddress3" placeholder="City">
                      </div>

                      <div class="w-100 text-right">
                        <button class="btn btn-success btn-lg" id="TBPrev2">Previous</button>
                        <button class="btn btn-primary btn-lg" id="TBNext2">Next</button>
                      </div>
                    </div>
                    <div id="secretarydetails">
                      <h4 class="card-title">Secretary Details Form</h4>
                      <div class="form-group">
                        <label for="inputSecretaryName">Name of the Secretary </label>
                        <input type="text" class="form-control" id="inputSecretaryName" placeholder="Name">
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputSecretaryJob">Job </label>
                          <input type="text" class="form-control" id="inputSecretaryJob" placeholder="Job">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputSecretaryTP">Telephone Number </label>
                          <input type="text" class="form-control" id="inputSecretaryTP" placeholder="Telephone">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputSecretaryAddress1">Address Line 1 </label>
                          <input type="text" class="form-control" id="inputSecretaryAddress1" placeholder="Number">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputSecretaryAddress2">Address Line 2 </label>
                          <input type="text" class="form-control" id="inputSecretaryAddress2" placeholder="Street Address">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSecretaryAddress3">Address Line 3 </label>
                        <input type="text" class="form-control" id="inputSecretaryAddress3" placeholder="City">
                      </div>

                      <div class="w-100 text-right">
                        <button class="btn btn-success btn-lg" id="TBPrev3">Previous</button>
                        <button class="btn btn-primary btn-lg" id="TBNext3">Next</button>
                      </div>
                    </div>
                    <div id="ASdetails">
                      <h4 class="card-title">Assistant Secretary Details Form</h4>
                      <div class="form-group">
                        <label for="inputASName">Name of the Assistant Secretary </label>
                        <input type="text" class="form-control" id="inputASName" placeholder="Name">
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputASJob">Job </label>
                          <input type="text" class="form-control" id="inputASJob" placeholder="Job">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputASTP">Telephone Number </label>
                          <input type="text" class="form-control" id="inputASTP" placeholder="Telephone">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputASAddress1">Address Line 1 </label>
                          <input type="text" class="form-control" id="inputASAddress1" placeholder="Number">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputASAddress2">Address Line 2 </label>
                          <input type="text" class="form-control" id="inputASAddress2" placeholder="Street Address">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputASAddress3">Address Line 3 </label>
                        <input type="text" class="form-control" id="inputASAddress3" placeholder="City">
                      </div>

                      <div class="w-100 text-right">
                        <button class="btn btn-success btn-lg" id="TBPrev4">Previous</button>
                        <button class="btn btn-primary btn-lg" id="TBNext4">Next</button>
                      </div>
                    </div>
                    <div id="treasurerdetails">
                      <h4 class="card-title">Treasurer Details Form</h4>
                      <div class="form-group">
                        <label for="inputTreasurerName">Name of the Treasurer </label>
                        <input type="text" class="form-control" id="inputTreasurerName" placeholder="Name">
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputTreasurerJob">Job </label>
                          <input type="text" class="form-control" id="inputTreasurerJob" placeholder="Job">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputTreasurerTP">Telephone Number </label>
                          <input type="text" class="form-control" id="inputTreasurerTP" placeholder="Telephone">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputTreasurerAddress1">Address Line 1 </label>
                          <input type="text" class="form-control" id="inputTreasurerAddress1" placeholder="Number">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputTreasurerAddress2">Address Line 2 </label>
                          <input type="text" class="form-control" id="inputTreasurerAddress2" placeholder="Street Address">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputTreasurerAddress3">Address Line 3 </label>
                        <input type="text" class="form-control" id="inputTreasurerAddress3" placeholder="City">
                      </div>
                      <div class="w-100 text-right">
                        <button class="btn btn-success btn-lg" id="TBPrev5">Previous</button>
                      </div>
                      <div id="advisoryboard">
                        <hr>
                        <h4 class="card-title">Advisory Board</h4>
                        <p class="card-description"> Add members to Advisory Board </p>
                        <a class="btn btn btn-success btn-lg" id="advisoryMember">+ ADD</a>
                        <hr>
                        <div class="text-center">
                          <Submit class="btn btn-primary btn-lg" id="submit">Submit All</submit>
                        </div>
                      </div>

                    </div>
                  </form>

                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- content-wrapper ends -->

        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- footer -->
  <?php
  include "$server_name/mosque/admin/template_parts/footer.php";
  ?>
  <!-- End custom js for this page -->
</body>

</html>