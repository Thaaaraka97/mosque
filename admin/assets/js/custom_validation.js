// form validation
var x=0;
$("#trusteeBoardForm").validate({
  rules: {
    inputPresidentName: {
      required: true
    }, 
  },
  messages: {
    inputPresidentName: "*required",
  },
  submitHandler: function(form) {
    x=1;
  }
  
});

$("#TBNext1").click(function (e) {
    
    $('[name="inputVPIndexNo"]').each(function() {
      $(this).rules('remove');
    });
    
    $("#trusteeBoardForm").valid(); // validation test only
    
    if (x==1) {
      e.preventDefault();
        // step show/hide
        $("#presidentdetails").hide();
        $("#secretarydetails").hide();
        $("#ASdetails").hide();
        $("#treasurerdetails").hide();
        $("#advisoryboard").hide();

        $("#VPdetails").show();
        x=0;
    }
        
  });


  $("#TBNext2").click(function (e) {
    $( "#inputVPIndexNo" ).rules( "add", {
      required: true,
      messages: {
        required: "*required",
      }
    });
    $("#trusteeBoardForm").valid(); // validation test only
        e.preventDefault();
        // step show/hide
        $("#presidentdetails").hide();
        $("#VPdetails").hide();
        $("#ASdetails").hide();
        $("#treasurerdetails").hide();
        $("#advisoryboard").hide();

        $("#secretarydetails").show();
   
  });