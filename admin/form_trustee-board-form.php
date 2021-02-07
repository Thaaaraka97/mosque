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
            <h3 class="page-title">Trustee Board Details</h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>forms.php">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Trustee Board Details</li>
              </ol>
            </nav>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card shadow">
                <div class="card-body">
                  <form class="pt-3" id="trusteeBoardForm" name="trusteeBoardForm">
                    <div id="presidentdetails">
                      <h4 class="card-title">President Details Form</h4>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputPresidentIndexNo"> Index Number </label>
                          <input type="text" class="form-control" id="inputPresidentIndexNo" placeholder="Index No">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPresidentSubdivision"> Sub-division </label>
                          <select id="inputPresidentSubdivision" class="form-control">
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
                          <input type="text" class="form-control" id="inputPresidentTP" placeholder="077xxxxxxx">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPresidentAddress"> Address </label>
                        <textarea rows="5" class="form-control" id="inputPresidentAddress"></textarea>
                      </div>
                      <div class="w-100 text-right">
                        <button class="btn btn-primary btn-lg" id="TBNext1">Next</button>
                      </div>
                    </div>
                    <div id="VPdetails">
                      <h4 class="card-title">Vice President Details Form</h4>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputVPIndexNo"> Index Number </label>
                          <input type="text" class="form-control" id="inputVPIndexNo" placeholder="Index No">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputVPSubdivision"> Sub-division </label>
                          <select id="inputVPSubdivision" class="form-control">
                            <option selected>Choose...</option>
                            <?php
                            foreach ($sub_division as $sub_division_item) {
                              echo "<option value='" . $sub_division_item["sb_name"] . "'>" . $sub_division_item["sb_name"] . "</option>";
                            }

                            ?>
                          </select>
                        </div>
                      </div>
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
                          <input type="text" class="form-control" id="inputVPTP" placeholder="077xxxxxxx">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputVPAddress"> Address </label>
                        <textarea rows="5" class="form-control" id="inputVPAddress"></textarea>
                      </div>
                      <div class="w-100 text-right">
                        <button class="btn btn-success btn-lg" id="TBPrev2">Previous</button>
                        <button class="btn btn-primary btn-lg" id="TBNext2">Next</button>
                      </div>
                    </div>
                    <div id="secretarydetails">
                      <h4 class="card-title">Secretary Details Form</h4>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputSecretaryIndexNo"> Index Number </label>
                          <input type="text" class="form-control" id="inputSecretaryIndexNo" placeholder="Index No">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputSecretarySubdivision"> Sub-division </label>
                          <select id="inputSecretarySubdivision" class="form-control">
                            <option selected>Choose...</option>
                            <?php
                            foreach ($sub_division as $sub_division_item) {
                              echo "<option value='" . $sub_division_item["sb_name"] . "'>" . $sub_division_item["sb_name"] . "</option>";
                            }

                            ?>
                          </select>
                        </div>
                      </div>
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
                          <input type="text" class="form-control" id="inputSecretaryTP" placeholder="077xxxxxxx">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSecretaryAddress"> Address </label>
                        <textarea rows="5" class="form-control" id="inputSecretaryAddress"></textarea>
                      </div>
                      <div class="w-100 text-right">
                        <button class="btn btn-success btn-lg" id="TBPrev3">Previous</button>
                        <button class="btn btn-primary btn-lg" id="TBNext3">Next</button>
                      </div>
                    </div>
                    <div id="ASdetails">
                      <h4 class="card-title">Assistant Secretary Details Form</h4>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputASIndexNo"> Index Number </label>
                          <input type="text" class="form-control" id="inputASIndexNo" placeholder="Index No">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputASSubdivision"> Sub-division </label>
                          <select id="inputASSubdivision" class="form-control">
                            <option selected>Choose...</option>
                            <?php
                            foreach ($sub_division as $sub_division_item) {
                              echo "<option value='" . $sub_division_item["sb_name"] . "'>" . $sub_division_item["sb_name"] . "</option>";
                            }

                            ?>
                          </select>
                        </div>
                      </div>
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
                          <input type="text" class="form-control" id="inputASTP" placeholder="077xxxxxxx">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputASAddress"> Address </label>
                        <textarea rows="5" class="form-control" id="inputASAddress"></textarea>
                      </div>
                      <div class="w-100 text-right">
                        <button class="btn btn-success btn-lg" id="TBPrev4">Previous</button>
                        <button class="btn btn-primary btn-lg" id="TBNext4">Next</button>
                      </div>
                    </div>
                    <div id="treasurerdetails">
                      <h4 class="card-title">Treasurer Details Form</h4>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputTreasurerIndexNo"> Index Number </label>
                          <input type="text" class="form-control" id="inputTreasurerIndexNo" placeholder="Index No">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputTreasurerSubdivision"> Sub-division </label>
                          <select id="inputTreasurerSubdivision" class="form-control">
                            <option selected>Choose...</option>
                            <?php
                            foreach ($sub_division as $sub_division_item) {
                              echo "<option value='" . $sub_division_item["sb_name"] . "'>" . $sub_division_item["sb_name"] . "</option>";
                            }

                            ?>
                          </select>
                        </div>
                      </div>
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
                          <input type="text" class="form-control" id="inputTreasurerTP" placeholder="077xxxxxxx">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputTreasurerAddress"> Address </label>
                        <textarea rows="5" class="form-control" id="inputTreasurerAddress"></textarea>
                      </div>
                      <div class="w-100 text-right">
                        <button class="btn btn-success btn-lg" id="TBPrev5">Previous</button>
                        <button class="btn btn-primary btn-lg" id="TBNext5">Next</button>
                      </div>
                    </div>
                    <div id="advisoryboard">
                      <h4 class="card-title">Advisory Board Details Form</h4>
                      <div class="form-group">
                        <div id="addMember"></div>
                        <div class="form-group" id="addNewMembers"></div>
                        <p class="card-description"> Add members to Advisory Board </p>
                        <a class="btn btn btn-success btn-lg" id="advisoryMember">+ ADD</a>
                      </div>
                      <div class="text-center">
                        <button class="btn btn-success btn-lg" id="TBPrev6">Previous</button>
                        <Submit class="btn btn-primary btn-lg" id="submit">Submit All</submit>
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