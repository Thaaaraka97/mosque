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
            <h3 class="page-title"> Quran Madhrasa Registration Details </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $server_name ?>forms.php">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quran Madhrasa Registration</li>
              </ol>
            </nav>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card shadow">
                <div class="card-body">
                  <h4 class="card-title">Quran Madhrasa Registration Form</h4>
                  <form class="pt-3">
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
                          foreach ($sub_division as $sub_division1) {
                            echo "<option value='" . $sub_division1["sb_name"] . "'>" . $sub_division1["sb_name"] . "</option>";
                          }

                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputName">Name of the Child </label>
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputBirthday">Birthday </label>
                        <input type="date" class="form-control" id="inputBirthday">
                      </div>
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
                      <div class="form-group col-md-3">
                        <label for="inputMedium">Medium</label>
                        <select id="inputMedium" class="form-control">
                          <option selected>Choose...</option>
                          <option>Tamil</option>
                          <option>Sinhala</option>
                          <option>English</option>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputGrade">Grade </label>
                        <input type="text" class="form-control" id="inputGrade" placeholder="Grade">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputSchool">Current School </label>
                        <input type="text" class="form-control" id="inputSchool" placeholder="School">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputGuardianName">Name of the Guardian </label>
                      <input type="text" class="form-control" id="inputGuardianName" placeholder="Name of the Guardian">
                    </div>
                    <div class="form-group">
                      <label for="inputAddress"> Address </label>
                      <input type="text" class="form-control" id="inputAddress" placeholder="Address">
                    </div>

                    <div class="form-group">
                      <label for="inputAdmissionDate">Date of Admission </label>
                      <input type="date" class="form-control" id="inputAdmissionDate"">
                    </div>
                    <div class=" form-group">
                      <label for="inputNotes">Notes </label>
                      <textarea class="form-control" id="inputNotes" rows="4"></textarea>
                    </div>
                    <div class="text-center">
                      <Submit class="btn btn-primary btn-lg" id="submitQuran" name="submitQuran">Enter</submit>
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