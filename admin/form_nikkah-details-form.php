<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
?>

<body>
  <div class="container-scroller">
    <!-- navigation bar -->
    <?php

    include "template_parts/navbar.php";
    ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- top bar -->
      <?php

      include "template_parts/topbar.php";
      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">Nikkah Details</h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>forms.php">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Nikkah Details</li>
              </ol>
            </nav>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card shadow">
                <div class="card-body">
                  <form class="pt-3">
                    <div id="groomdetails">
                      <h4 class="card-title">Groom Details Form</h4>
                      <div class="form-group">
                        <label for="inputGroomName">Name of the Groom </label>
                        <input type="text" class="form-control" id="inputGroomName" placeholder="Name">
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputGroomMemID">Groom's Membership ID </label>
                          <input type="text" class="form-control" id="inputGroomMemID" placeholder="Membership ID">
                        </div>
                        <div class="form-group col-md-6 pl-5">
                          <div class="form-group row">
                            <div class="col-md-12">
                              <div class="row">
                                <div class="col-md-12">
                                  <label class="form-label">Married Status(before)</label>
                                </div>
                                
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="inputMarriedStatus" id="inputMarriedStatusY" value="Yes" checked> Yes </label>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="inputMarriedStatus" id="inputMarriedStatusN" value="No"> No </label>
                                    </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="inputGroomBirthday">Birthday </label>
                          <input type="date" class="form-control" id="inputGroomBirthday" placeholder="">
                        </div>
                        <div class="form-group col-md-5">
                          <label for="inputGroomNIC">National Identity Card </label>
                          <input type="text" class="form-control" id="inputGroomNIC" placeholder="NIC">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="inputGroomAge">Age </label>
                          <input type="text" class="form-control" id="inputGroomAge" placeholder="Age">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputGroomTP">Telephone Number </label>
                          <input type="text" class="form-control" id="inputGroomTP" placeholder="077xxxxxxx">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputGroomAddress1">Address Line 1 </label>
                          <input type="text" class="form-control" id="inputGroomAddress1" placeholder="Number">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputGroomAddress2">Address Line 2 </label>
                          <input type="text" class="form-control" id="inputGroomAddress2" placeholder="Street Address">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputGroomAddress3">Address Line 3 </label>
                        <input type="text" class="form-control" id="inputGroomAddress3" placeholder="City">
                      </div>
                      <p class="card-description"> Details of the Guardian </p>
                      <div class="form-group">
                        <label for="inputGroomGuardianName">Name of the Guardian </label>
                        <input type="text" class="form-control" id="inputGroomGuardianName" placeholder="Name of the Guardian">
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputGroomGuardianID">Membership ID of the Guardian </label>
                          <input type="text" class="form-control" id="inputGroomGuardianID" placeholder="Membership ID">
                        </div>
                      </div>
                      <p class="card-description"> Details of the Mosque </p>
                      <div class="form-group">
                        <label for="inputGroomMosque">Name of the Mosque </label>
                        <input type="text" class="form-control" id="inputGroomMosque" placeholder="Mosque">
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputGroomMosqueAddress1">Address Line 1 </label>
                          <input type="text" class="form-control" id="inputGroomMosqueAddress1" placeholder="Street Address">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputGroomMosqueAddress2">Address Line 2 </label>
                          <input type="text" class="form-control" id="inputGroomMosqueAddress2" placeholder="City">
                        </div>
                      </div>
                      <div class="w-100 text-right">
                        <button class="btn btn-primary btn-lg" id="nikkahNext">Next</button>
                      </div>
                    </div>
                    <div id="bridedetails">
                      <h4 class="card-title pt-2">Bride Details Form</h4>
                      <div class="form-group">
                        <label for="inputBrideName">Name of the Groom </label>
                        <input type="text" class="form-control" id="inputBrideName" placeholder="Name">
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="inputBrideBirthday">Birthday </label>
                          <input type="date" class="form-control" id="inpuBridetBirthday" placeholder="">
                        </div>
                        <div class="form-group col-md-5">
                          <label for="inputBrideNIC">National Identity Card </label>
                          <input type="text" class="form-control" id="inputBrideNIC" placeholder="NIC">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="inputBrideAge">Age </label>
                          <input type="text" class="form-control" id="inputBrideAge" placeholder="Age">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputBrideTP">Telephone Number </label>
                          <input type="text" class="form-control" id="inputBrideTP" placeholder="077xxxxxxx">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputBrideAddress1">Address Line 1 </label>
                          <input type="text" class="form-control" id="inputBrideAddress1" placeholder="Number">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputBrideAddress2">Address Line 2 </label>
                          <input type="text" class="form-control" id="inputBrideAddress2" placeholder="Street Address">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputBrideAddress3">Address Line 3 </label>
                        <input type="text" class="form-control" id="inputBrideAddress3" placeholder="City">
                      </div>
                      <p class="card-description"> Details of the Guardian </p>
                      <div class="form-group">
                        <label for="inputBrideGuardianName">Name of the Guardian </label>
                        <input type="text" class="form-control" id="inputBrideGuardianName" placeholder="Name of the Guardian">
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputBrideGuardianID">Membership ID of the Guardian </label>
                          <input type="text" class="form-control" id="inputBrideGuardianID" placeholder="Membership ID">
                        </div>
                      </div>
                      <p class="card-description"> Details of the Mosque </p>
                      <div class="form-group">
                        <label for="inputBrideMosque">Name of the Mosque </label>
                        <input type="text" class="form-control" id="inputMosque" placeholder="Mosque">
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputBrideMosqueAddress1">Address Line 1 </label>
                          <input type="text" class="form-control" id="inputBrideMosqueAddress1" placeholder="Street Address">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputBrideMosqueAddress2">Address Line 2 </label>
                          <input type="text" class="form-control" id="inputBrideMosqueAddress2" placeholder="City">
                        </div>
                      </div>
                      <div class="w-100 text-right">
                        <button class="btn btn-success btn-lg" id="nikkahPrev">Previous</button>
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
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

  include "template_parts/footer.php";
  ?>
  <!-- End custom js for this page -->
</body>

</html>