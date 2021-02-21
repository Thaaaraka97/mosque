$(document).ready(function () {
  // nikkah-details.php
  // next button
  $("#nikkahNext").click(function (e) {
    e.preventDefault();
    // step show/hide bride/groom forms
    $("#groomdetails").hide();
    $("#nikkahDonation").hide();
    $("#bridedetails").show();
  });

  // next2 button
  $("#nikkahNext2").click(function (e) {
    e.preventDefault();
    // step show/hide bride/groom forms
    $("#groomdetails").hide();
    $("#bridedetails").hide();
    $("#nikkahDonation").show();
  });

  // previous2 button
  $("#nikkahPrev2").click(function (e) {
    e.preventDefault();
    // step show/hide bride/groom forms for prvious button
    $("#bridedetails").hide();
    $("#nikkahDonation").hide();
    $("#groomdetails").show();
  });

  // previous3 button
  $("#nikkahPrev3").click(function (e) {
    e.preventDefault();
    // step show/hide bride/groom forms for prvious button
    $("#groomdetails").hide();
    $("#nikkahDonation").hide();
    $("#bridedetails").show();
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
   
  }); 
  
  // next button 3
  $("#TBNext3").click(function (e) {
    e.preventDefault();
    // step show/hide
    $("#presidentdetails").hide();
    $("#VPdetails").hide();
    $("#secretarydetails").hide();
    $("#treasurerdetails").hide();
    $("#advisoryboard").hide();

    $("#ASdetails").show();
  }); 
  
  // next button 4
  $("#TBNext4").click(function (e) {
    e.preventDefault();
    // step show/hide
    $("#presidentdetails").hide();
    $("#VPdetails").hide();
    $("#secretarydetails").hide();
    $("#ASdetails").hide();
    $("#advisoryboard").hide();

    $("#treasurerdetails").show();
  }); 
  
  // next button 5
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
      $("#disaterDonationIndex").show();
    } else {
      $("#disaterDonationIndex").hide();
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

  var j = 1;
  $("#advisoryMember").click(function () {
    var formBlock = `
    <div id="row${j}">
    <h4 class="card-title">Member ${j} Details Form</h4>
    <div class="form-row">
      <div class="form-group col-md-6">
          <label for="inputMemberIndexNo"> Index Number </label>
          <input type="text" class="form-control" id="inputMemberIndexNo[]" placeholder="Index No">
      </div>
      <div class="form-group col-md-6">
          <label for="inputMemberSubdivision"> Sub-division </label>
          <select id="inputMemberSubdivision[]" class="form-control">
              <option selected>Choose...</option>
              <option value="Moragala Main-Street">Moragala Main-Street</option>
              <option value="Old Rail Road">Old Rail Road</option>
              <option value="Bandarawaththa">Bandarawaththa</option>
              <option value="Kothvila">Kothvila</option>
              <option value="Palpitiya">Palpitiya</option>
              <option value="Ranaviru Mawatha">Ranaviru Mawatha</option>
              <option value="Wekada-1">Wekada-1</option>
              <option value="Wekada-2">Wekada-2</option>
              <option value="Wekada-3">Wekada-3</option>
              <option value="Eheliyagoda Town">Eheliyagoda Town</option>
              <option value="Other-1">Other-1</option>
              <option value="Other-2">Other-2</option>
          </select>
      </div>
    </div>
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
    <div class="form-group">
      <label for="inputMemberAddress"> Address </label>
      <textarea rows = "5" class="form-control" id="inputMemberAddress[]"></textarea>
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
  $("#submitTrusteeBoard").click(function () {
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

  //   form_villagers-registration-form.php
  // show/hide College textbox on dropdown change
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
    $(".datatable").DataTable();
  });

  //   form_nikkah-details-form.php
  // show/hide Groom mosque textbox on radio change
  $("input[type=radio][name=inputGroomVillage]").change(function (e) {
    e.preventDefault();
    if ($(this).val() == "Not Our Village") {
      $("#groomMosqueDetails").show();
      $("#groomIndex").hide();
      $("#groomGuardianIndex").hide();
    } else {
      $("#groomMosqueDetails").hide();
      $("#groomIndex").show();
      $("#groomGuardianIndex").show();
    }
  });

  // show/hide Bride mosque textbox on radio change
  $("input[type=radio][name=inputBrideVillage]").change(function (e) {
    e.preventDefault();
    if ($(this).val() == "Not Our Village") {
      $("#brideMosqueDetails").show();
      $("#brideGuardianIndex").hide();
      $("#brideIndex").hide();
    } else {
      $("#brideMosqueDetails").hide();
      $("#brideGuardianIndex").show();
      $("#brideIndex").show();
    }
  });

  //   form_pesh-imaam-details.php
  // show/hide peshImaamIndex div on radio change
  $("input[type=radio][name=inputVillage]").change(function (e) {
    e.preventDefault();
    if ($(this).val() == "Our Village") {
      $("#peshImaamIndex").show();
    } else {
      $("#peshImaamIndex").hide();
    }
  });

  //   form_muazzin-details.php
  // show/hide muazzinIndex div on radio change
  $("input[type=radio][name=inputVillage]").change(function (e) {
    e.preventDefault();
    if ($(this).val() == "Our Village") {
      $("#muazzinIndex").show();
    } else {
      $("#muazzinIndex").hide();
    }
  });

  //  form_villagers-registration-form.php
  //  Next Buttons
  // next button 0
  $("#avNext0").click(function (e) {
    e.preventDefault();
    // step show/hide
    $("#saandhaStep2").hide();
    $("#saandhaStep3").hide();
    $("#saandhaStep4").hide();
    $("#saandhaStep5").hide();
    $("#saandhaStep0").hide();

    $("#saandhaStep1").show();
  });
  // next button 1
  $("#avNext1").click(function (e) {
    e.preventDefault();
    // step show/hide
    $("#saandhaStep1").hide();
    $("#saandhaStep3").hide();
    $("#saandhaStep4").hide();
    $("#saandhaStep5").hide();
    $("#saandhaStep0").hide();

    $("#saandhaStep2").show();
  });
  // next button 2
  $("#avNext2").click(function (e) {
    e.preventDefault();
    // step show/hide
    $("#saandhaStep1").hide();
    $("#saandhaStep2").hide();
    $("#saandhaStep4").hide();
    $("#saandhaStep5").hide();
    $("#saandhaStep0").hide();

    $("#saandhaStep3").show();
  });
  // next button 3
  $("#avNext3").click(function (e) {
    e.preventDefault();
    // step show/hide
    $("#saandhaStep1").hide();
    $("#saandhaStep3").hide();
    $("#saandhaStep2").hide();
    $("#saandhaStep5").hide();
    $("#saandhaStep0").hide();

    $("#saandhaStep4").show();
  });
  // next button 4
  $("#avNext4").click(function (e) {
    e.preventDefault();
    // step show/hide
    $("#saandhaStep1").hide();
    $("#saandhaStep3").hide();
    $("#saandhaStep4").hide();
    $("#saandhaStep2").hide();
    $("#saandhaStep0").hide();

    $("#saandhaStep5").show();
  });

  //   previous buttons
  // previous button 1
  $("#avPrev1").click(function (e) {
    e.preventDefault();
    // step show/hide
    $("#saandhaStep2").hide();
    $("#saandhaStep3").hide();
    $("#saandhaStep4").hide();
    $("#saandhaStep5").hide();
    $("#saandhaStep1").hide();

    $("#saandhaStep0").show();
  });
  // previous button 2
  $("#avPrev2").click(function (e) {
    e.preventDefault();
    // step show/hide
    $("#saandhaStep2").hide();
    $("#saandhaStep3").hide();
    $("#saandhaStep4").hide();
    $("#saandhaStep5").hide();
    $("#saandhaStep0").hide();

    $("#saandhaStep1").show();
  });
  // previous button 3
  $("#avPrev3").click(function (e) {
    e.preventDefault();
    // step show/hide
    $("#saandhaStep1").hide();
    $("#saandhaStep3").hide();
    $("#saandhaStep4").hide();
    $("#saandhaStep5").hide();
    $("#saandhaStep0").hide();

    $("#saandhaStep2").show();
  });
  // previous button 4
  $("#avPrev4").click(function (e) {
    e.preventDefault();
    // step show/hide
    $("#saandhaStep2").hide();
    $("#saandhaStep1").hide();
    $("#saandhaStep4").hide();
    $("#saandhaStep5").hide();
    $("#saandhaStep0").hide();

    $("#saandhaStep3").show();
  });
  // previous button 5
  $("#avPrev5").click(function (e) {
    e.preventDefault();
    // step show/hide
    $("#saandhaStep2").hide();
    $("#saandhaStep3").hide();
    $("#saandhaStep1").hide();
    $("#saandhaStep5").hide();
    $("#saandhaStep0").hide();

    $("#saandhaStep4").show();
  });

  //   form_villagers-registration-form.php
  // show/hide saandhaGuardian div on radio change
  $("input[type=radio][name=inputGuardianStatus]").change(function (e) {
    e.preventDefault();
    if ($(this).val() == "No") {
      $("#saandhaGuardian").show();
    } else {
      $("#saandhaGuardian").hide();
    }
  });

  //   form_villagers-registration-form.php
  // show/hide avStudent div on radio change
  $("input[type=radio][name=inputStudent]").change(function (e) {
    e.preventDefault();
    if ($(this).val() == "Yes") {
      $("#avStudent").show();
    } else {
      $("#avStudent").hide();
    }
  });

  // show/hide inputScholIncome div on radio change
  $("input[type=radio][name=inputSchol]").change(function (e) {
    e.preventDefault();
    if ($(this).val() == "Yes") {
      $("#inputScholIncomeDiv").show();
    } else {
      $("#inputScholIncomeDiv").hide();
    }
  });

  // show/hide madhrasa div on radio change
  $("input[type=radio][name=inputMad]").change(function (e) {
    e.preventDefault();
    if ($(this).val() == "Yes") {
      $("#madhrasa").show();
    } else {
      $("#madhrasa").hide();
    }
  });

  // show/hide married div on radio change
  $("input[type=radio][name=inputMarried]").change(function (e) {
    e.preventDefault();
    if ($(this).val() == "Yes") {
      $("#married").show();
    } else {
      $("#married").hide();
    }
  });

  // show/hide familyIncome div on radio change
  $("input[type=radio][name=inputjobYN]").change(function (e) {
    e.preventDefault();
    if ($(this).val() == "Yes") {
      $("#familyIncome").show();
    } else {
      $("#familyIncome").hide();
    }
  });

  // show/hide madhrasa div on radio change
  $("input[type=radio][name=inputMigrant]").change(function (e) {
    e.preventDefault();
    if ($(this).val() == "Yes") {
      $("#newMigrant").show();
    } else {
      $("#newMigrant").hide();
    }
  });

  //   form_villagers-registration-form.php
  $("#addAnother").click(function () {
    document.location.href = "form_villagers-registration-form-step2.php";
  });

  // form_janaza-details-form.php
  // submit data to find the details
  $("#inputJanazaSubdivision").change(function (e) {
    e.preventDefault();
    var index = $("#inputIndexNoDeceased").val();
    var subdivision = $("#inputJanazaSubdivision").val();
    var data_bundle = "index=" + index + "&subdivision=" + subdivision;
    $.ajax({
      type: "post",
      //  url: "../handlers/janaza_form_handler.php",
      url: "handlers/janaza_form_handler.php",
      data: data_bundle,
      success: function (response) {
        var result_array = response.split(",");
        $("#inputName").val(result_array[0]);
        if (result_array[1] == "M") {
          $("#inputSexF").removeAttr("checked");
          $("#inputSexM").attr("checked", "checked");
        } else {
          $("#inputSexM").removeAttr("checked");
          $("#inputSexF").attr("checked", "checked");
        }
      },
    });
  });



  // function to hide/show view/edit pages in preview
  (function () {
    if (action == "view") {
      $("#viewDetails").show();
      $("#editDetails").hide();
    } else if (action == "edit") {
      $("#viewDetails").hide();
      $("#editDetails").show();
      console.log("edit jq");
    } else {
      console.log("invalid");
    }
  })();

 

});
