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
                  <form class="pt-3" method="POST">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputIndexNo"> Index Number </label>
                        <input type="text" class="form-control" id="inputIndexNo" name="inputIndexNo" placeholder="Index No">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputQuranSubdivision"> Sub-division </label>
                        <select id="inputQuranSubdivision" name="inputQuranSubdivision" class="form-control">
                          <option value="0" selected>Choose...</option>
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
                      <label for="inputName">Name of the Child </label>
                      <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputBirthday">Birthday </label>
                        <input type="date" class="form-control" id="inputBirthday" name="inputBirthday">
                      </div>
                      <div class="form-group col-md-6">
                        <div class="form-group row pt-3">

                          <div class="col-md-2 pt-2 d-flex align-items-center text-right">
                            <label class="form-label">Gender</label>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="inputSex" id="inputSexM" value="Male" checked> Male </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="inputSex" id="inputSexF" value="Female"> Female </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="inputMedium">Medium</label>
                        <select id="inputMedium" name="inputMedium" class="form-control">
                          <option value="0" selected>Choose...</option>
                          <option value="T">Tamil</option>
                          <option value="S">Sinhala</option>
                          <option value="E">English</option>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputGrade">Grade </label>
                        <input type="text" class="form-control" id="inputGrade" name="inputGrade" placeholder="Grade">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputSchool">Current School </label>
                        <input type="text" class="form-control" id="inputSchool" name="inputSchool" placeholder="School">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputGuardianName">Name of the Guardian </label>
                      <input type="text" class="form-control" id="inputGuardianName" name="inputGuardianName" placeholder="Name of the Guardian">
                    </div>
                    <div class="form-group">
                      <label for="inputAddress"> Address </label>
                      <textarea rows = "5" class="form-control" id="inputAddress" name="inputAddress"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="inputAdmissionDate">Date of Admission </label>
                      <input type="date" class="form-control" id="inputAdmissionDate" name="inputAdmissionDate">
                    </div>
                    <div class=" form-group">
                      <label for="inputNotes">Notes </label>
                      <textarea class="form-control" id="inputNotes" name="inputNotes" rows="4"></textarea>
                    </div>
                    <div class="text-center">
                      <button class="btn btn-primary btn-lg" id="submitQuran" name="submitQuran">Enter</button>
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