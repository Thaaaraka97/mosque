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
            <h3 class="page-title"> Quran Madhrasa Registration Details </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/mosque/admin/forms.php">Forms</a></li>
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
                            <label class="form-label">Sex</label>
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
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputGuardianID">Membership ID of the Guardian </label>
                        <input type="text" class="form-control" id="inputGuardianID" placeholder="Membership ID">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputAddress1">Address Line 1 </label>
                        <input type="text" class="form-control" id="inputAddress1" placeholder="Number">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputAddress2">Address Line 2 </label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Street Address">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress3">Address Line 3 </label>
                      <input type="text" class="form-control" id="inputAddress3" placeholder="City">
                    </div>

                    <div class="form-group">
                      <label for="inputAdmissionDate">Date of Admission </label>
                      <input type="date" class="form-control" id="inputAdmissionDate"">
                    </div>
                    <div class=" form-group">
                      <label for="inputNotes">Notes </label>
                      <textarea class="form-control" id="inputNotes" rows="4"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg">Enter</button>
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