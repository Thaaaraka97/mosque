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
            <h3 class="page-title">Janaza Details</h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>forms.php">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Janaza Details</li>
              </ol>
            </nav>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card shadow">
                <div class="card-body">
                  <h4 class="card-title">Janaza Details Form</h4>
                  <form class="pt-3">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputIndexNoDeceased"> Index Number of the Deceased </label>
                        <input type="text" class="form-control" id="inputIndexNoDeceased" placeholder="Index No">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputSubdivision"> Sub-division </label>
                        <select id="inputSubdivision" class="form-control">
                          <option selected>Choose...</option>
                          <?php
                          $sub_division = $database->select_data('tbl_subdivision');
                          foreach ($sub_division as $sub_division1) {
                            echo "<option value='" . $sub_division1["sb_name"] . "'>" . $sub_division1["sb_name"] . "</option>";
                          }

                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputName">Name of the Deceased </label>
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <div class="form-group row pt-3">
                          <div class="col-md-2 pt-2 d-flex align-items-center text-right">
                            <label class="form-label">Gender</label>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="inputSex" id="inputSex1" value="Male" checked> Male </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="inputSex" id="inputSex2" value="Female"> Female </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputDeathDate">Date of Death </label>
                        <input type="date" class="form-control" id="inputDeathDate">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputFuneralDate">Date of the Funeral </label>
                        <input type="date" class="form-control" id="inputFuneralDate">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress"> Place of the Funeral </label>
                      <input type="text" class="form-control" id="inputAddress" placeholder="Address">
                    </div>
                    <p class="card-description"> Details of person who give details </p>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputGName">Name </label>
                        <input type="text" class="form-control" id="inputGName" placeholder="Name">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputIndexNo"> Index Number </label>
                        <input type="text" class="form-control" id="inputIndexNo" placeholder="Index No">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputRelationship"> Relationship to the Deceased </label>
                        <input type="text" class="form-control" id="inputRelationship" placeholder="Relationship">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <input type="hidden" class="form-control" id="inputDateToday">
                      </div>
                    </div>
                    <div class=" form-group">
                      <label for="inputNotes">Special Notes </label>
                      <textarea class="form-control" id="inputNotes" rows="4"></textarea>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary btn-lg">Enter Details</button>
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