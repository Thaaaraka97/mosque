$(document).ready(function () {
  // nikkah-details.php
  // next button
  $("#nikkahNext").click(function (e) {
    e.preventDefault();
    // step show/hide bride/groom forms
    $("#groomdetails").hide();
    $("#bridedetails").show();
  });

  // previous button
  $("#nikkahPrev").click(function (e) {
    e.preventDefault();
    // step show/hide bride/groom forms for prvious button
    $("#bridedetails").hide();
    $("#groomdetails").show();
  });

  //   trustee-board.php
  //   Next Buttons
  // next button 1
  $("#TBNext1").click(function (e) {
    e.preventDefault();
    // step show/hide
    $("#presidentdetails").hide();
    $("#secretarydetails").hide();
    $("#ASdetails").hide();
    $("#treasurerdetails").hide();
    $("#advisoryboard").hide();

    $("#VPdetails").show();
  });
  // next button 2
  $("#TBNext2").click(function (e) {
    e.preventDefault();
    // step show/hide
    $("#presidentdetails").hide();
    $("#VPdetails").hide();
    $("#ASdetails").hide();
    $("#treasurerdetails").hide();
    $("#advisoryboard").hide();

    $("#secretarydetails").show();
  }); // next button 3
  $("#TBNext3").click(function (e) {
    e.preventDefault();
    // step show/hide
    $("#presidentdetails").hide();
    $("#VPdetails").hide();
    $("#secretarydetails").hide();
    $("#treasurerdetails").hide();
    $("#advisoryboard").hide();

    $("#ASdetails").show();
  }); // next button 4
  $("#TBNext4").click(function (e) {
    e.preventDefault();
    // step show/hide
    $("#presidentdetails").hide();
    $("#VPdetails").hide();
    $("#secretarydetails").hide();
    $("#ASdetails").hide();
    $("#advisoryboard").hide();

    $("#treasurerdetails").show();
  }); // next button 5
  $("#TBNext5").click(function (e) {
    e.preventDefault();
    // step show/hide
    $("#presidentdetails").hide();
    $("#VPdetails").hide();
    $("#secretarydetails").hide();
    $("#ASdetails").hide();
    $("#treasurerdetails").hide();

    $("#advisoryboard").show();
  });

  //   previous buttons
  // previous button 2
  $("#TBPrev2").click(function (e) {
    e.preventDefault();
    // step show/hide
    $("#secretarydetails").hide();
    $("#VPdetails").hide();
    $("#ASdetails").hide();
    $("#treasurerdetails").hide();
    $("#advisoryboard").hide();

    $("#presidentdetails").show();
  });
  // previous button 3
  $("#TBPrev3").click(function (e) {
    e.preventDefault();
    // step show/hide
    $("#presidentdetails").hide();
    $("#ASdetails").hide();
    $("#secretarydetails").hide();
    $("#treasurerdetails").hide();
    $("#advisoryboard").hide();

    $("#VPdetails").show();
  });
  // previous button 4
  $("#TBPrev4").click(function (e) {
    e.preventDefault();
    // step show/hide
    $("#presidentdetails").hide();
    $("#VPdetails").hide();
    $("#treasurerdetails").hide();
    $("#ASdetails").hide();
    $("#advisoryboard").hide();

    $("#secretarydetails").show();
  });
  // previous button 5
  $("#TBPrev5").click(function (e) {
    e.preventDefault();
    // step show/hide
    $("#presidentdetails").hide();
    $("#VPdetails").hide();
    $("#secretarydetails").hide();
    $("#treasurerdetails").hide();
    $("#advisoryboard").hide();

    $("#ASdetails").show();
  });
  // previous button 6
  $("#TBPrev6").click(function (e) {
    e.preventDefault();
    // step show/hide
    $("#presidentdetails").hide();
    $("#VPdetails").hide();
    $("#secretarydetails").hide();
    $("#advisoryboard").hide();
    $("#ASdetails").hide();

    $("#treasurerdetails").show();
  });

  //   other-donations.php
  // show country textbox on dropdown change
  $("#inputDonation").change(function (e) {
    e.preventDefault();
    if ($(this).val() == "Foreign") {
      $("#inputCountry").show();
    } else {
      $("#inputCountry").hide();
    }
  });

  //   disaster-relief-donations.php
  // show membership id textbox on dropdown change
  $("#inputDonationDisaster").change(function (e) {
    e.preventDefault();
    if ($(this).val() == "Mahalla") {
      $("#inputMemID").show();
    } else {
      $("#inputMemID").hide();
    }
  });

  // saandha-registration-form.php
  // add new child form-block
  var i = 1;
  $("#unmarriedMale").click(function () {
    var formBlock = `
          <div id="row${i}">
        <p class="card-description"> Details of Child ${i} </p>
        <div class="form-group">
          <label for="inputChildName">Name </label>
          <input type="text" class="form-control" id="inputChildName" name="inputChildName[]" placeholder="Name">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6"><label for="inputChildNIC">National Identity Card </label>
          <input type="text" class="form-control" id="inputChildNIC" name="inputChildNIC[]" placeholder="NIC"></div>
          <div class="form-group col-md-6"><label for="inputChildTP">Telephone Number </label>
          <input type="text" class="form-control" id="inputChildTP" name="inputChildTP[]" placeholder="Telephone"></div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6"><label for="inputChildJob">Occupation </label>
          <input type="text" class="form-control" id="inputChildJob" name="inputChildJob[]" placeholder="Occupation"></div>
          <div class="form-group col-md-6"><label for="inputChildIncome">Income </label>
          <input type="text" class="form-control" id="inputChildIncome" name="inputChildIncome[]" placeholder="Income (Rs)"></div>
        </div>
        <div class="form-group col-md-6">
        <button type="button" name="remove" id="${i}" class="btn btn-danger btn_remove">Remove</button>
        </div>
      </div>
      </div>
    `;
    $("#addChild").append(formBlock);
    i++;
  });

  // remove the form block when clicked
  $(document).on("click", ".btn_remove", function () {
    var button_id = $(this).attr("id");
    $("#row" + button_id + "").remove();
  });

  // submit data to handler
  $("#submitSaandha").click(function () {
    $.ajax({
      url: "/mosque/admin/handlers/add-child-handler.php",
      method: "POST",
      data: $("#saandhaRegistrationForm").serialize(),
      success: function (data) {
        alert(data);
        $("#saandhaRegistrationForm")[0].reset();
      },
    });
  });

  // trustee-board-form.php
  // add new advisory memebers form block
  var j = 1;
  $("#advisoryMember").click(function () {
    var formBlock = `
    <div id="row${j}">
    <h4 class="card-title">Member ${j} Details Form</h4>
    <div class="form-group">
      <label for="inputMemberName">Name of the Member ${j} </label>
      <input type="text" class="form-control" id="inputMemberName[]" placeholder="Name">
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputMemberJob">Job </label>
        <input type="text" class="form-control" id="inputMemberJob[]" placeholder="Job">
      </div>
      <div class="form-group col-md-6">
        <label for="inputMemberTP">Telephone Number </label>
        <input type="text" class="form-control" id="inputMemberTP[]" placeholder="077xxxxxxx">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputMemberAddress1">Address Line 1 </label>
        <input type="text" class="form-control" id="inputMemberAddress1[]" placeholder="Number">
      </div>
      <div class="form-group col-md-6">
        <label for="inputMemberAddress2">Address Line 2 </label>
        <input type="text" class="form-control" id="inputMemberAddress2[]" placeholder="Street Address">
      </div>
    </div>
    <div class="form-group">
      <label for="inputMemberAddress3">Address Line 3 </label>
      <input type="text" class="form-control" id="inputMemberAddress3[]" placeholder="City">
    </div>
    <div class="form-group col-md-6">
        <button type="button" name="remove" id="${j}" class="btn btn-danger btn_remove">Remove</button>
        </div>
  </div>
    `;
    $("#addNewMembers").append(formBlock);
    j++;
  });

  // remove the form block when clicked
  $(document).on("click", ".btn_remove", function () {
    var button_id = $(this).attr("id");
    $("#row" + button_id + "").remove();
  });

  // submit data to handler
  $("#submit").click(function () {
    $.ajax({
      url: "/mosque/admin/handlers/advisory-member-handler.php",
      method: "POST",
      data: $("#trusteeBoardForm").serialize(),
      success: function (data) {
        alert(data);
        $("#trusteeBoardForm")[0].reset();
      },
    });
  });

  //   other-donations.php
  // show country textbox on dropdown change
  $("#inputEduQual").change(function (e) {
    e.preventDefault();
    if ($(this).val() == "None") {
      $("#college").hide();
    } else {
      $("#college").show();
    }
  });

  // datatables
  $(document).ready(function () {
    $("#myTable").DataTable();
  });

  
});
