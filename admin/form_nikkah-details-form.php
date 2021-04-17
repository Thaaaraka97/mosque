<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";
include 'include/login_header.php';


$database = new databases();

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
                  <form class="pt-3" method="post">
                    <div id="groomdetails">
                      <h4 class="card-title">Groom Details Form</h4>
                      <div class="form-group col-md-6 pl-5">
                        <div class="form-group row">
                          <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-12">
                                <label class="form-label">Groom belongs to</label>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="inputGroomVillage" id="inputGroomVillageY" value="Home Village"> Home Village </label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="inputGroomVillage" id="inputGroomVillageN" value="Not Home Village" checked> Not Home Village </label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="groomIndex">
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputIndexNo"> Index Number </label>
                            <input type="text" class="form-control" id="inputIndexNo" name="inputIndexNo" placeholder="Index No">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputGroomSubdivision"> Sub-division </label>
                            <select id="inputGroomSubdivision" name="inputGroomSubdivision" class="form-control">
                              <option value="0" selected>Choose...</option>
                              <?php
                              
                              foreach ($sub_division as $sub_division_item) {
                                echo "<option value='" . $sub_division_item["sb_name"] . "'>" . $sub_division_item["sb_name"] . "</option>";
                              }

                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputGroomName">Name of the Groom </label>
                        <input type="text" class="form-control" id="inputGroomName" name="inputGroomName" placeholder="Name" required>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="inputGroomBirthday">Birthday </label>
                          <input type="date" class="form-control" id="inputGroomBirthday" name="inputGroomBirthday" required>
                        </div>
                        <div class="form-group col-md-5">
                          <label for="inputGroomNIC">National Identity Card </label>
                          <input type="text" class="form-control" id="inputGroomNIC" name="inputGroomNIC" placeholder="NIC" required>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="inputGroomAge">Age </label>
                          <input type="text" class="form-control" id="inputGroomAge" name="inputGroomAge" placeholder="Age" required>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputGroomTP">Telephone Number </label>
                          <input type="text" class="form-control" id="inputGroomTP" name="inputGroomTP" placeholder="077xxxxxxx" required>
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
                                      <input type="radio" class="form-check-input" name="inputMarriedStatus" id="inputMarriedStatusY" value="Yes"> Yes </label>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="inputMarriedStatus" id="inputMarriedStatusN" value="No" checked> No </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputGroomAddress">Address </label>
                        <textarea rows="5" class="form-control" id="inputGroomAddress" name="inputGroomAddress" required></textarea>
                      </div>
                      <p class="card-description"> Details of the Guardian </p>
                      <hr>
                      <div class="form-group">
                        <label for="inputGroomGuardianName">Name of the Guardian </label>
                        <input type="text" class="form-control" id="inputGroomGuardianName" name="inputGroomGuardianName" placeholder="Name of the Guardian" required>
                      </div>
                      <div class="form-row" id="groomGuardianIndex">
                        <div class="form-group col-md-6">
                          <label for="inputGroomGuardianIndex"> Index No of the Guardian </label>
                          <input type="text" class="form-control" id="inputGroomGuardianIndex" name="inputGroomGuardianIndex" placeholder="Index No">
                        </div>
                      </div>
                      <hr>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputVenue"> Venue of the marriage </label>
                          <input type="text" id="inputVenue" name="inputVenue" class="form-control" placeholder="Venue" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputMarriageDate"> Date of the marriage </label>
                          <input type="date" id="inputMarriageDate" name="inputMarriageDate" class="form-control">
                        </div>
                      </div>
                      <div id="groomMosqueDetails">
                        <p class="card-description"> Details of the Mosque </p>
                        <hr>
                        <div class="form-group">
                          <label for="inputGroomMosque">Name of the Mosque </label>
                          <input type="text" class="form-control" id="inputGroomMosque" name="inputGroomMosque" placeholder="Mosque">
                        </div>
                        <div class="form-group">
                          <label for="inputGroomMosqueAddress"> Address </label>
                          <textarea rows="5" class="form-control" id="inputGroomMosqueAddress" name="inputGroomMosqueAddress"></textarea>
                        </div>
                      </div>
                      <div class="w-100 text-right">
                        <button class="btn btn-primary btn-lg" id="nikkahNext">Next</button>
                      </div>
                    </div>
                    <div id="bridedetails">
                      <h4 class="card-title pt-2">Bride Details Form</h4>
                      <div class="form-row">
                        <div class="form-group col-md-6 pl-5">
                          <div class="form-group row">
                            <div class="col-md-12">
                              <div class="row">
                                <div class="col-md-12">
                                  <label class="form-label">Bride belongs to</label>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="inputBrideVillage" id="inputBrideVillageY" value="Home Village"> Home Village </label>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="inputBrideVillage" id="inputBrideVillageN" value="Not Home Village" checked> Not Home Village </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="brideIndex">
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputBrideIndexNo"> Index Number </label>
                            <input type="text" class="form-control" id="inputBrideIndexNo" name="inputBrideIndexNo" placeholder="Index No">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputBrideSubdivision"> Sub-division </label>
                            <select id="inputBrideSubdivision" name="inputBrideSubdivision" class="form-control">
                              <option value="0" selected>Choose...</option>
                              <?php
                              foreach ($sub_division as $sub_division_item) {
                                echo "<option value='" . $sub_division_item["sb_name"] . "'>" . $sub_division_item["sb_name"] . "</option>";
                              }

                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputBrideName">Name of the Bride </label>
                        <input type="text" class="form-control" id="inputBrideName" name="inputBrideName" placeholder="Name" required>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="inputBrideBirthday">Birthday </label>
                          <input type="date" class="form-control" id="inpuBridetBirthday" name="inpuBridetBirthday" required>
                        </div>
                        <div class="form-group col-md-5">
                          <label for="inputBrideNIC">National Identity Card </label>
                          <input type="text" class="form-control" id="inputBrideNIC" name="inputBrideNIC" placeholder="NIC" required>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="inputBrideAge">Age </label>
                          <input type="text" class="form-control" id="inputBrideAge" name="inputBrideAge" placeholder="Age" required>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputBrideTP">Telephone Number </label>
                          <input type="text" class="form-control" id="inputBrideTP" name="inputBrideTP" placeholder="077xxxxxxx" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputBrideAddress"> Address </label>
                        <textarea rows="5" class="form-control" id="inputBrideAddress" name="inputBrideAddress" required></textarea>
                      </div>
                      <p class="card-description"> Details of the Guardian </p>
                      <hr>
                      <div class="form-group">
                        <label for="inputBrideGuardianName"> Name of the Guardian </label>
                        <input type="text" class="form-control" id="inputBrideGuardianName" name="inputBrideGuardianName" placeholder="Name of the Guardian" required>
                      </div>
                      <div class="form-row" id="brideGuardianIndex">
                        <div class="form-group col-md-6">
                          <label for="inputBrideGuardianIndex"> Index No of the Guardian </label>
                          <input type="text" class="form-control" id="inputBrideGuardianIndex" name="inputBrideGuardianIndex" placeholder="Index No">
                        </div>
                      </div>
                      <div id="brideMosqueDetails">
                        <p class="card-description"> Details of the Mosque </p>
                        <hr>
                        <div class="form-group">
                          <label for="inputBrideMosque">Name of the Mosque </label>
                          <input type="text" class="form-control" id="inputBrideMosque" name="inputBrideMosque" placeholder="Mosque">
                        </div>
                        <div class="form-group">
                          <label for="inputBrideMosqueAddress"> Address </label>
                          <textarea rows="5" class="form-control" id="inputBrideMosqueAddress" name="inputBrideMosqueAddress"></textarea>
                        </div>
                      </div>
                      <div class="w-100 text-right">
                        <button class="btn btn-success btn-lg" id="nikkahPrev2">Previous</button>
                        <button class="btn btn-primary btn-lg" id="nikkahNext2">Next</button>
                      </div>
                    </div>
                    <div id="nikkahDonation">
                      <h4 class="card-title">Nikkah Donation Form</h4>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputdonation"> Donation Amount </label>
                          <input type="text" class="form-control" id="inputdonation" name="inputdonation" placeholder="Amount">
                        </div>
                      </div>
                      <div class="w-100 text-right">
                        <button class="btn btn-success btn-lg" id="nikkahPrev3">Previous</button>
                        <input type="submit" class="btn btn-primary btn-lg" name="submitNikkah"></input>
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