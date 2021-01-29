<!DOCTYPE html>
<html lang="en">

<?php
include "template_parts/header.php";

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
                  <form class="pt-3">
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
                                    <input type="radio" class="form-check-input" name="inputGroomVillage" id="inputGroomVillageY" value="Our Village"> Our Village </label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="inputGroomVillage" id="inputGroomVillageN" value="Not Our Village" checked> Not Our Village </label>
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
                            <input type="text" class="form-control" id="inputIndexNo" placeholder="Index No">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputSubdivision"> Sub-division </label>
                            <select id="inputSubdivision" class="form-control">
                              <option selected>Choose...</option>
                              <?php
                              $sub_division = $database->select_data('tbl_subdivision');
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
                        <input type="text" class="form-control" id="inputGroomName" placeholder="Name">
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
                      <div class="form-group">
                        <label for="inputGroomAddress">Address </label>
                        <input type="text" class="form-control" id="inputGroomAddress" placeholder="Address">
                      </div>
                      <p class="card-description"> Details of the Guardian </p>
                      <div class="form-group">
                        <label for="inputGroomGuardianName">Name of the Guardian </label>
                        <input type="text" class="form-control" id="inputGroomGuardianName" placeholder="Name of the Guardian">
                      </div>
                      <div class="form-row" id="groomGuardianIndex">
                        <div class="form-group col-md-6">
                          <label for="inputGroomGuardianIndex"> Index No of the Guardian </label>
                          <input type="text" class="form-control" id="inputGroomGuardianIndex" placeholder="Index No">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputVenue"> Venue of the marriage </label>
                          <input type="text" id="inputVenue" class="form-control" placeholder="Venue">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputMarriageDate"> Date of the marriage </label>
                          <input type="date" id="inputMarriageDate" class="form-control">
                        </div>
                      </div>
                      <div id="groomMosqueDetails">
                        <p class="card-description"> Details of the Mosque </p>
                        <div class="form-group">
                          <label for="inputGroomMosque">Name of the Mosque </label>
                          <input type="text" class="form-control" id="inputGroomMosque" placeholder="Mosque">
                        </div>
                        <div class="form-group">
                          <label for="inputGroomMosqueAddress"> Address </label>
                          <input type="text" class="form-control" id="inputGroomMosqueAddress" placeholder="Address">
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
                                      <input type="radio" class="form-check-input" name="inputBrideVillage" id="inputBrideVillageY" value="Our Village"> Our Village </label>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="inputBrideVillage" id="inputBrideVillageN" value="Not Our Village" checked> Not Our Village </label>
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
                            <label for="inputIndexNo"> Index Number </label>
                            <input type="text" class="form-control" id="inputIndexNo" placeholder="Index No">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputSubdivision"> Sub-division </label>
                            <select id="inputSubdivision" class="form-control">
                              <option selected>Choose...</option>
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
                      <div class="form-group">
                        <label for="inputBrideAddress"> Address </label>
                        <input type="text" class="form-control" id="inputBrideAddress" placeholder="Address">
                      </div>
                      <p class="card-description"> Details of the Guardian </p>
                      <div class="form-group">
                        <label for="inputBrideGuardianName"> Name of the Guardian </label>
                        <input type="text" class="form-control" id="inputBrideGuardianName" placeholder="Name of the Guardian">
                      </div>
                      <div class="form-row" id="brideGuardianIndex">
                        <div class="form-group col-md-6">
                          <label for="inputBrideGuardianIndex"> Index No of the Guardian </label>
                          <input type="text" class="form-control" id="inputBrideGuardianIndex" placeholder="Index No">
                        </div>
                      </div>
                      <div id="brideMosqueDetails">
                        <p class="card-description"> Details of the Mosque </p>
                        <div class="form-group">
                          <label for="inputBrideMosque">Name of the Mosque </label>
                          <input type="text" class="form-control" id="inputMosque" placeholder="Mosque">
                        </div>
                        <div class="form-group">
                          <label for="inputBrideMosqueAddress"> Address </label>
                          <input type="text" class="form-control" id="inputBrideMosqueAddress" placeholder="Address">
                        </div>
                      </div>
                      <div class="w-100 text-right">
                        <button class="btn btn-success btn-lg" id="nikkahPrev2">Previous</button>
                        <button class="btn btn-primary btn-lg" id="nikkahNext2">Next</button>
                      </div>
                    </div>
                    <div id="nikkahDonation">
                      <h4 class="card-title">Nikkah Donation Form</h4>
                      <div class="form-group col-md-6">
                        <label for="inputdonation"> Donation Amount </label>
                        <input type="text" class="form-control" id="inputdonation" placeholder="Amount">
                      </div>
                      <div class="w-100 text-right">
                        <button class="btn btn-success btn-lg" id="nikkahPrev3">Previous</button>
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