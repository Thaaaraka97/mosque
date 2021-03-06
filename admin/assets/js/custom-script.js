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
          <input type="text" class="form-control" id="inputMemberIndexNo[]" name="inputMemberIndexNo[]" placeholder="Index No">
      </div>
      <div class="form-group col-md-6">
          <label for="inputMemberSubdivision"> Sub-division </label>
          <select id="inputMemberSubdivision[]" name="inputMemberSubdivision[]" class="form-control">
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
      <input type="text" class="form-control" id="inputMemberName[]" name="inputMemberName[]" placeholder="Name">
    </div>
    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputTreasurerTP">Telephone Number </label>
                          <input type="text" class="form-control" id="inputMemberTP[]" name="inputMemberTP[]" placeholder="077xxxxxxx">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputTreasurerJob">Job </label>
                          <input type="text" class="form-control" id="inputMemberJob[]" name="inputMemberJob[]" placeholder="Job">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputTreasurerSalary">Salary </label>
                          <input type="text" class="form-control" id="inputMemberSalary[]" name="inputMemberSalary[]" placeholder="Salary">
                        </div>
                      </div>
    <div class="form-group">
      <label for="inputMemberAddress"> Address </label>
      <textarea rows = "5" class="form-control" id="inputMemberAddress[]" name="inputMemberAddress[]"></textarea>
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
    if ($(this).val() == "Not Home Village") {
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
    if ($(this).val() == "Not Home Village") {
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
    if ($(this).val() == "Home Village") {
      $("#peshImaamIndex").show();
    } else {
      $("#peshImaamIndex").hide();
    }
  });

  //   form_muazzin-details.php
  // show/hide muazzinIndex div on radio change
  $("input[type=radio][name=inputVillage]").change(function (e) {
    e.preventDefault();
    if ($(this).val() == "Home Village") {
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

  // show/hide saandhaStep0 div on radio change
  $("input[type=radio][name=inputRegFamily]").change(function (e) {
    e.preventDefault();
    if ($(this).val() == "No") {
      $("#saandhaStep0").show();
      $("#family").hide();
      $("#findFamily").hide();
    } else {
      $("#saandhaStep0").hide();
      $("#family").show();
      $("#findFamily").show();
    }
  });
  
  $("#findFamily").click(function (e) {
    e.preventDefault();
    var familyID = $("#inputfamilyID").val();
    var data_bundle = "id=" + familyID;

    $.ajax({
      type: "post",
      url: "handlers/form_villagers_handler.php",
      data: data_bundle,
      success: function (response) {
        if (response == "No Data") {
          document.location.href =
            "form_villagers-registration-form.php?nodata=1";
        } else {
          var result_array = response.split("+");
          document.location.href =
            "form_villagers-registration-form2.php?familyID=" +
            result_array[0] +
            "&sub=" +
            result_array[1] +
            "&add=" +
            result_array[2] +
            "&incomePersonal=" +
            result_array[3] +
            "&incomeFamily=" +
            result_array[4] +
            "&children=" +
            result_array[5] +
            "&unmarriedchildren=" +
            result_array[6] +
            "&resStatus=" +
            result_array[7] +
            "&prevAdd=" +
            result_array[8] +
            "&prevGrama=" +
            result_array[9] +
            "&prevPolice=" +
            result_array[10] +
            "&prevMahalla=" +
            result_array[11] +
            "&newMigrant=" +
            result_array[12];
          console.log(response);
        }
      },
    });
  });

  // form_funds-collection.php
  // show/hide mahalla div on radio change
  $("input[type=radio][name=inputFundsMahalla]").change(function (e) {
    e.preventDefault();
    if ($(this).val() == "Non Mahalla") {
      $("#nonmahalla").show();
      $("#mahalla").hide();
      $("#verify").hide();
    } else {
      $("#mahalla").show();
      $("#verify").show();
      $("#nonmahalla").show();
    }
  });
  // show/hide mahalla div on radio change
  $("input[type=radio][name=inputFundsVerification]").change(function (e) {
    e.preventDefault();
    if ($(this).val() == "TP") {
      $("#nonmahalla").show();
      $("#mahalla").hide();
    } else {
      $("#mahalla").show();
      $("#nonmahalla").show();
    }
  });

  // show/hide inputFundsNotes textbox on dropdown change
  $("#inputFundsType").change(function (e) {
    e.preventDefault();
    if ($(this).val() == "Other") {
      $("#inputFundsNotes").show();
      $("#inputFundsFestival").hide();
    } 
    else if ($(this).val() == "Festival") {
      $("#inputFundsFestival").show();
      $("#inputFundsNotes").hide();
    }
     else {
      $("#inputFundsNotes").hide();
      $("#inputFundsFestival").hide();
    }
  });


  //   form_add-new-rental.php
  // show/hide lease/monthly div on radio change
  $("input[type=radio][name=inputLease]").change(function (e) {
    e.preventDefault();
    if ($(this).val() == "Yes") {
      $("#lease").show();
      $("#monthlyPayment").hide();
    } else {
      $("#monthlyPayment").show();
      $("#lease").hide();
    }
  });

  //   form_friday-collection.php
  // show/hide lease/monthly div on radio change
  $("input[type=radio][name=inputFridayCollectionType]").change(function (e) {
    e.preventDefault();
    if ($(this).val() == "Collection") {
      $("#fridayRegular").hide();
      $("#fridayRegularDate").show();
    } else {
      $("#fridayRegular").show();
      $("#fridayRegularDate").hide();
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

  // form_add-new-rental.php
  // submit data to find the details
  $("#inputnewRentalSubdivision").change(function (e) {
    e.preventDefault();
    var index = $("#inputIndexNo").val();
    var subdivision = $("#inputnewRentalSubdivision").val();
    var data_bundle = "index=" + index + "&subdivision=" + subdivision;
    $.ajax({
      type: "post",
      url: "handlers/add_new_rental_handler.php",
      data: data_bundle,
      success: function (response) {
        var result_array = response.split(",");
        $("#inputName").val(result_array[0]);
        $("#inputAddress").val(result_array[1]);
        $("#inputTP").val(result_array[2]);
      },
    });
  });

  // form_add-payment.php
  // submit data to find the details
  $("#inputRentalPaymentSubdivision").change(function (e) {
    e.preventDefault();
    var index = $("#inputIndexNo").val();
    var subdivision = $("#inputRentalPaymentSubdivision").val();
    var data_bundle =
      "index=" +
      index +
      "&subdivision=" +
      subdivision +
      "&action=find_record_sub";
    $.ajax({
      type: "post",
      url: "handlers/add_payment_handler.php",
      data: data_bundle,
      success: function (response) {
        var result_array = response.split(",");
        $("#inputRentalPaymentTP").val(result_array[0]);
      },
    });
  });

  // form_quran-registration-form.php
  // submit data to find the details
  $("#inputQuranSubdivision").change(function (e) {
    e.preventDefault();
    var index = $("#inputIndexNo").val();
    var subdivision = $("#inputQuranSubdivision").val();
    var data_bundle =
      "index=" + index + "&subdivision=" + subdivision + "&action=find_record";
    $.ajax({
      type: "post",
      url: "handlers/quran_mdhrasa_handler.php",
      data: data_bundle,
      success: function (response) {
        var result_array = response.split(",");
        $("#inputName").val(result_array[0]);
        $("#inputAddress").val(result_array[1]);
        $("#inputBirthday").val(result_array[2]);
        if (result_array[3] == "M") {
          $("#inputSexF").removeAttr("checked");
          $("#inputSexM").attr("checked", "checked");
        } else {
          $("#inputSexM").removeAttr("checked");
          $("#inputSexF").attr("checked", "checked");
        }
      },
    });
  });

  // form_board-member-donations.php
  // submit data to find the details
  $("#inputTrusteeSubdivision").change(function (e) {
    e.preventDefault();
    var index = $("#inputIndexNo").val();
    var subdivision = $("#inputTrusteeSubdivision").val();
    var data_bundle = "index=" + index + "&subdivision=" + subdivision;
    $.ajax({
      type: "post",
      url: "handlers/board_member_donation_handler.php",
      data: data_bundle,
      success: function (response) {
        var result_array = response.split(",");
        $("#inputName").val(result_array[0]);
        $("#inputDesignation").val(result_array[1]);
        $("#inputAddress").val(result_array[2]);
      },
    });
  });

  // search and auto fill other fields in the form
  // ajax submit index and subdivision of president to auto fill other part of the form
  $("#inputPresidentSubdivision").change(function (e) {
    e.preventDefault();
    var inputPresidentIndexNo = $("#inputPresidentIndexNo").val();
    var inputPresidentSubdivision = $("#inputPresidentSubdivision").val();
    var data_bundle =
      "index=" +
      inputPresidentIndexNo +
      "&subdivision=" +
      inputPresidentSubdivision +
      "&action=find_record";

    $.ajax({
      type: "post",
      url: "handlers/trustee_board_form_handler.php",
      data: data_bundle,
      success: function (response) {
        var result_array = response.split(",");
        $("#inputPresidentName").val(result_array[0]);
        $("#inputPresidentTP").val(result_array[1]);
        $("#inputPresidentJob").val(result_array[2]);
        $("#inputPresidentSalary").val(result_array[3]);
        $("#inputPresidentAddress").val(result_array[4]);
      },
    });
  });

  // ajax submit index and subdivision of vice president to auto fill other part of the form
  $("#inputVPSubdivision").change(function (e) {
    e.preventDefault();
    var inputVPIndexNo = $("#inputVPIndexNo").val();
    var inputVPSubdivision = $("#inputVPSubdivision").val();
    var data_bundle =
      "index=" +
      inputVPIndexNo +
      "&subdivision=" +
      inputVPSubdivision +
      "&action=find_record";

    $.ajax({
      type: "post",
      url: "handlers/trustee_board_form_handler.php",
      data: data_bundle,
      success: function (response) {
        var result_array = response.split(",");
        $("#inputVPName").val(result_array[0]);
        $("#inputVPTP").val(result_array[1]);
        $("#inputVPJob").val(result_array[2]);
        $("#inputVPSalary").val(result_array[3]);
        $("#inputVPAddress").val(result_array[4]);
      },
    });
  });

  // ajax submit index and subdivision of secretary to auto fill other part of the form
  $("#inputSecretarySubdivision").change(function (e) {
    e.preventDefault();
    var inputSecretaryIndexNo = $("#inputSecretaryIndexNo").val();
    var inputSecretarySubdivision = $("#inputSecretarySubdivision").val();
    var data_bundle =
      "index=" +
      inputSecretaryIndexNo +
      "&subdivision=" +
      inputSecretarySubdivision +
      "&action=find_record";

    $.ajax({
      type: "post",
      url: "handlers/trustee_board_form_handler.php",
      data: data_bundle,
      success: function (response) {
        var result_array = response.split(",");
        $("#inputSecretaryName").val(result_array[0]);
        $("#inputSecretaryTP").val(result_array[1]);
        $("#inputSecretaryJob").val(result_array[2]);
        $("#inputSecretarySalary").val(result_array[3]);
        $("#inputSecretaryAddress").val(result_array[4]);
      },
    });
  });

  // ajax submit index and subdivision of assistant secretary to auto fill other part of the form
  $("#inputASSubdivision").change(function (e) {
    e.preventDefault();
    var inputASIndexNo = $("#inputASIndexNo").val();
    var inputASSubdivision = $("#inputASSubdivision").val();
    var data_bundle =
      "index=" +
      inputASIndexNo +
      "&subdivision=" +
      inputASSubdivision +
      "&action=find_record";

    $.ajax({
      type: "post",
      url: "handlers/trustee_board_form_handler.php",
      data: data_bundle,
      success: function (response) {
        var result_array = response.split(",");
        $("#inputASName").val(result_array[0]);
        $("#inputASTP").val(result_array[1]);
        $("#inputASJob").val(result_array[2]);
        $("#inputASSalary").val(result_array[3]);
        $("#inputASAddress").val(result_array[4]);
      },
    });
  });

  // ajax submit index and subdivision of treasurer to auto fill other part of the form
  $("#inputTreasurerSubdivision").change(function (e) {
    e.preventDefault();
    var inputTreasurerIndexNo = $("#inputTreasurerIndexNo").val();
    var inputTreasurerSubdivision = $("#inputTreasurerSubdivision").val();
    var data_bundle =
      "index=" +
      inputTreasurerIndexNo +
      "&subdivision=" +
      inputTreasurerSubdivision +
      "&action=find_record";

    $.ajax({
      type: "post",
      url: "handlers/trustee_board_form_handler.php",
      data: data_bundle,
      success: function (response) {
        var result_array = response.split(",");
        $("#inputTreasurerName").val(result_array[0]);
        $("#inputTreasurerTP").val(result_array[1]);
        $("#inputTreasurerJob").val(result_array[2]);
        $("#inputTreasurerSalary").val(result_array[3]);
        $("#inputTreasurerAddress").val(result_array[4]);
      },
    });
  });

  // ajax submit index and subdivision of friday collection to auto fill other part of the form
  $("#inputFridayColSubdivision").change(function (e) {
    e.preventDefault();
    var inputIndexNo = $("#inputIndexNo").val();
    var inputFridayColSubdivision = $("#inputFridayColSubdivision").val();
    var data_bundle =
      "index=" +
      inputIndexNo +
      "&subdivision=" +
      inputFridayColSubdivision +
      "&action=find_record";

    $.ajax({
      type: "post",
      url: "handlers/friday_collection_handler.php",
      data: data_bundle,
      success: function (response) {
        var result_array = response.split(",");
        $("#inputTP").val(result_array[0]);
        $("#inputName").val(result_array[1]);
        $("#inputAddress").val(result_array[2]);
        },
    });
  });

  // ajax submit to trustee_board_form_handler.php
  $("#submitTrusteeBoard").click(function (e) {
    var all_data = $("#trusteeBoardForm").serialize();
    e.preventDefault();
    $.ajax({
      type: "post",
      url: "handlers/trustee_board_form_handler.php",
      data: $("#trusteeBoardForm").serialize() + "&action=submit",
      success: function (response) {
        console.log(response);
        window.location.href = response;
        window.location.href = "forms.php";
      },
    });
  });

  // preview_villager-details_step-2.php
  // ajax submit list down details according to the selection
  $("#listDetails").change(function (e) {
    e.preventDefault();
    var listDetails = $("#listDetails").val();
    window.location.href = "preview_villager-details.php?action=" + listDetails;
  });

  // form_friday-collection.php
  // ajax submit list down details according to the selection
  $("#inputRentalDuration").change(function (e) {
    e.preventDefault();
    var inputRentalDuration = $("#inputRentalDuration").val();
    if (inputRentalDuration == "Other") {
      $("#inputRentalMonthsDiv").show();
    }
    else{
      $("#inputRentalMonthsDiv").hide();
    }
  });

  // preview_donation-details.php
  // ajax submit list down details according to the selection
  $("#donationlistDetails").change(function (e) {
    e.preventDefault();
    var donationlistDetails = $("#donationlistDetails").val();
    window.location.href =
      "preview_donation-details.php?action=" + donationlistDetails;
  });

  // nikkah preview
  // submit data to delete a row
  $(".delete_row_nikkah").click(function () {
    var id = $(this).attr("id");
    var data_bundle = "id=" + id + "&action=delete";

    $("#del").click(function (e) {
      e.preventDefault();
      $.ajax({
        type: "post",
        url: "handlers/nikkah_details_handler.php",
        data: data_bundle,
        success: function (response) {
          window.location.href = response;
        },
      });
    });
  });

  // quran madrasa preview
  // submit data to delete a row
  $(".delete_q_madrasa").click(function () {
    var id = $(this).attr("id");
    var data_bundle = "id=" + id + "&action=delete";

    $("#del").click(function (e) {
      e.preventDefault();
      $.ajax({
        type: "post",
        url: "handlers/quran_mdhrasa_handler.php",
        data: data_bundle,
        success: function (response) {
          window.location.href = response;
        },
      });
    });
  });

  // trustee board preview
  // submit data to update and terminate a row
  $(".terminate_row_trustee").click(function () {
    var id = $(this).attr("id");
    var data_bundle = "id=" + id + "&action=terminate";

    $("#del").click(function (e) {
      e.preventDefault();
      $.ajax({
        type: "post",
        url: "handlers/trustee_board_form_handler.php",
        data: data_bundle,
        success: function (response) {
          window.location.href = response;
        },
      });
    });
  });

  // pesh imaam preview
  // submit data to update and terminate a row
  $(".terminate_row_peshimaam").click(function () {
    var id = $(this).attr("id");
    var data_bundle = "id=" + id + "&action=terminate";

    $("#del").click(function (e) {
      e.preventDefault();
      $.ajax({
        type: "post",
        url: "handlers/pesh_imaam_handler.php",
        data: data_bundle,
        success: function (response) {
          window.location.href = response;
        },
      });
    });
  });

  // muazzin preview
  // submit data to update and terminate a row
  $(".terminate_row_muazzin").click(function () {
    var id = $(this).attr("id");
    var data_bundle = "id=" + id + "&action=terminate";

    $("#del").click(function (e) {
      e.preventDefault();
      $.ajax({
        type: "post",
        url: "handlers/muazzin_handler.php",
        data: data_bundle,
        success: function (response) {
          window.location.href = response;
        },
      });
    });
  });

  // preview_rental-places.php
  // submit data to update and delete a row
  $(".delete_place").click(function () {
    var id = $(this).attr("id");
    var data_bundle = "id=" + id + "&action=delete";

    $("#del").click(function (e) {
      e.preventDefault();
      $.ajax({
        type: "post",
        url: "handlers/rental_places_handler.php",
        data: data_bundle,
        success: function (response) {
          window.location.href = response;
        },
      });
    });
  });

  // preview_rental-places.php
  // submit data to update and delete a row
  $("#addNewPlace").click(function () {
    var id = $(this).attr("id");

    $("#add").click(function (e) {
      e.preventDefault();
      var inputRentalType = $("#inputRentalType").val();
      var inputAddress = $("#inputAddress").val();
      var data_bundle = "inputRentalType=" + inputRentalType + "&inputAddress=" + inputAddress + "&action=add";
      $.ajax({
        type: "post",
        url: "handlers/rental_places_handler.php",
        data: data_bundle,
        success: function (response) {
          window.location.href = response;
        },
      });
    });
  });

  // preview_undiyal-collection.php
  // submit data to update and delete a row
  $("#addNewUndiyal").click(function () {

    $("#add").click(function (e) {
      e.preventDefault();
      var inputDate = $("#inputDate").val();
      var inputAmount = $("#inputAmount").val();
      var inputUser = $("#inputUser").val();
      var data_bundle =
        "inputDate=" + inputDate + "&inputAmount=" + inputAmount + "&inputUser=" + inputUser + "&action=add_undiyal";
      $.ajax({
        type: "post",
        url: "handlers/collections_handler.php",
        data: data_bundle,
        success: function (response) {
          window.location.href = response;
        },
      });
    });
  });

  // preview_kanduri-collection.php
  // submit data to update and delete a row
  $("#addNewKanduri").click(function () {

    $("#add").click(function (e) {
      e.preventDefault();
      var inputDate = $("#inputDate").val();
      var inputAmount = $("#inputAmount").val();
      var inputUser = $("#inputUser").val();
      var data_bundle =
        "inputDate=" + inputDate + "&inputAmount=" + inputAmount + "&inputUser=" + inputUser + "&action=add_kanduri";
      $.ajax({
        type: "post",
        url: "handlers/collections_handler.php",
        data: data_bundle,
        success: function (response) {
          window.location.href = response;
        },
      });
    });
  });

  // villager preview
  // submit data to update a row
  $(".update_row_saandha").click(function () {
    var id = $(this).attr("id");
    var data_bundle = "id=" + id + "&action=saandha";

    $("#accept").click(function (e) {
      e.preventDefault();
      $.ajax({
        type: "get",
        url: "handlers/preview_villagers_handler.php",
        data: data_bundle,
        success: function (response) {
          window.location.href = response;
        },
      });
    });
  });

  // preview_saandha-amount-fixing-history.php
  // submit data to update a row
  $("#editSaandhaAmount").click(function () {
    $("#update").click(function (e) {
      var Amount = $("#newAmount").val();
      var data_bundle = "newAmount=" + Amount;

      e.preventDefault();
      $.ajax({
        type: "post",
        url: "handlers/saandha_amount_fixings_handler.php",
        data: data_bundle,
        success: function (response) {
          window.location.href = response;
          // console.log(response);
        },
      });
    });
  });

  // preview_trustee_board-history_step-2.php
  // submit details
  $("#addTBHistory").click(function (e) {
    e.preventDefault();
    var inputDetails = $("#inputDetails").val();
    var data_bundle = "inputDetails=" + inputDetails + "&id=" + id;
    $.ajax({
      type: "post",
      url: "handlers/trustee_board_history_handler.php",
      data: data_bundle,
      success: function (response) {
        window.location.href = response;
      },
    });
  });

  // show/ hide div on the change of dropdown list donations
  if (donationaction == "other") {
    $("#other").show();
    $("#alldonations").hide();
    $("#trusteeboard").hide();
    $("#disaster").hide();
  } else if (donationaction == "alldonations") {
    $("#alldonations").show();
    $("#other").hide();
    $("#trusteeboard").hide();
    $("#disaster").hide();
  } else if (donationaction == "trusteeboard") {
    $("#trusteeboard").show();
    $("#alldonations").hide();
    $("#other").hide();
    $("#disaster").hide();
  } else if (donationaction == "disaster") {
    $("#disaster").show();
    $("#alldonations").hide();
    $("#trusteeboard").hide();
    $("#other").hide();
  } else {
    $("#alldonations").show();
    $("#other").hide();
    $("#trusteeboard").hide();
    $("#disaster").hide();
  }

  // show/ hide div on the change of dropdown list villager details
  if (villageraction == "allvillagers") {
    $("#widow").hide();
    $("#divorse").hide();
    $("#madrasa").hide();
    $("#orphan").hide();
    $("#allVillagers").show();
  } else if (villageraction == "widow") {
    $("#widow").show();
    $("#allVillagers").hide();
    $("#divorse").hide();
    $("#madrasa").hide();
    $("#orphan").hide();
  } else if (villageraction == "divorse") {
    $("#divorse").show();
    $("#widow").hide();
    $("#allVillagers").hide();
    $("#madrasa").hide();
    $("#orphan").hide();
  } else if (villageraction == "madrasa") {
    $("#madrasa").show();
    $("#widow").hide();
    $("#divorse").hide();
    $("#allVillagers").hide();
    $("#orphan").hide();
  } else if (villageraction == "orphan") {
    $("#orphan").show();
    $("#widow").hide();
    $("#divorse").hide();
    $("#madrasa").hide();
    $("#allVillagers").hide();
  } else {
    $("#widow").hide();
    $("#divorse").hide();
    $("#madrasa").hide();
    $("#orphan").hide();
    $("#allVillagers").show();
  }

  // function to hide/show view/edit pages in preview
  (function () {
    if (action == "view") {
      $("#viewDetails").show();
      $("#editDetails").hide();
    } else if (action == "edit") {
      $("#viewDetails").hide();
      $("#editDetails").show();
      if (designation == "President") {
        $("#presidentdetails").show();
        $("#VPdetails").hide();
        $("#secretarydetails").hide();
        $("#ASdetails").hide();
        $("#treasurerdetails").hide();
        $("#advisoryMemberdetails").hide();
      } else if (designation == "Vice President") {
        $("#VPdetails").show();
        $("#presidentdetails").hide();
        $("#secretarydetails").hide();
        $("#ASdetails").hide();
        $("#treasurerdetails").hide();
      } else if (designation == "Secretary") {
        $("#secretarydetails").show();
        $("#presidentdetails").hide();
        $("#VPdetails").hide();
        $("#ASdetails").hide();
        $("#treasurerdetails").hide();
        $("#advisoryMemberdetails").hide();
      } else if (designation == "Assistant Secretary") {
        $("#ASdetails").show();
        $("#presidentdetails").hide();
        $("#VPdetails").hide();
        $("#secretarydetails").hide();
        $("#treasurerdetails").hide();
        $("#advisoryMemberdetails").hide();
      } else if (designation == "Treasurer") {
        $("#treasurerdetails").show();
        $("#presidentdetails").hide();
        $("#VPdetails").hide();
        $("#secretarydetails").hide();
        $("#ASdetails").hide();
        $("#advisoryMemberdetails").hide();
      } else if (designation == "Advisory Member") {
        $("#advisoryMemberdetails").show();
        $("#presidentdetails").hide();
        $("#VPdetails").hide();
        $("#secretarydetails").hide();
        $("#ASdetails").hide();
        $("#treasurerdetails").hide();
      }
      console.log("edit jq");
    } else if (action == "editable") {
      $("#editable").show();
    } else {
      console.log("invalid");
    }
  })();
});
