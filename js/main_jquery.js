$(document).ready(function(){
  $(".proposal_acceptance").click(function(){
    var tim = $(this).data('ads').split(',');      
    $(".modal-body #fare").val(tim[0]);
    $(".modal-body #AdID").val(tim[1]);
    $(".modal-body #user_name").val(tim[2]);
  });
  $("#takeme").click(function(){
    var cost = $("#fare").val();
    var AdID = $("#AdID").val();
    var user_name = $("#user_name").val();
    make_payment(cost,AdID,user_name);
  });
  function make_payment(cost,AdID,user_name){
    jQuery.ajax({
      type: "POST",
      url: "make_payment.php",
      data: { 
              cost: cost,
              AdID: AdID,
              user_name: user_name,
            },
      cache: false,
      success: function(data){
        $("#offer_popup").html(payment_success());
        location.reload()
      }
    });
  }
  function payment_success(){
    var html = '<div class="alert alert-success" role="alert">'+
    '  <h4 class="alert-heading">Payment Successful!</h4>'+
    '  <p>Your payment has been made, Keep using the App.</p>'+
    '  <hr>'+
    '  <p class="mb-0">'+
    '  <div class="container d-flex mt-3 justify-content-center">'+
    '   <button type="button" class="btn btn-outline-danger bg-light" data-dismiss="modal">Close</button>'+
    ' </div>'+
    '  </p>'+
    '</div>';
    return html
  }
  $("#comealong").click(function(){
    var cost = $("#fare").val();
    var AdID = $("#AdID").val();
    var user_name = $("#user_name").val();
    make_offer(cost,AdID,user_name);
  });
  function make_offer(cost,AdID,user_name){
    jQuery.ajax({
      type: "POST",
      url: "make_offer.php",
      data: { 
              cost: cost,
              AdID: AdID,
              user_name: user_name,
            },
      cache: false,
      success: function(data){
        $("#offer_popup").html(proposal_success());
        location.reload()
      }
    });
  }
  function proposal_success(){
    var html = '<div class="alert alert-success" role="alert">'+
    '  <h4 class="alert-heading">Registered!</h4>'+
    '  <p>Your proposal has been registered, wait to get accepted.</p>'+
    '  <hr>'+
    '  <p class="mb-0">'+
    '  <div class="container d-flex mt-3 justify-content-center">'+
    '   <button type="button" class="btn btn-outline-danger bg-light" data-dismiss="modal">Close</button>'+
    ' </div>'+
    '  </p>'+
    '</div>';
    return html
  }
  $(".respond").click(function(){
      var tim = $(this).data('travel').split(',');      
     $(".modal-body #fare").val(tim[0]);
      $(".modal-body #AdID").val(tim[1]);
      $(".modal-body #user_name").val(tim[2]);
  });
  $(".cancel_my_Ad").click(function(){
    var confirmation = confirm("Are you sure you want to cancel the Ad!");
    if (confirmation == true) {
      var AdID = $(this).data('username');
      delete_ad(AdID)        
    }
	});
  function delete_ad(AdID){
    jQuery.ajax({
      type: "POST",
      url: "delete_ad.php",
      data: { 
            AdID: +AdID
            },
      cache: false,
      success: function(data){
        location.reload()
      }
    });
  }
  $(".cancel_my_proposal").click(function(){
      var confirmation = confirm("Are you sure you want to cancel the Proposal!");
    if (confirmation == true) {
      var OID = $(this).data('username');
      delete_proposal(OID)       
    } 
  });
  function delete_proposal(OID){
    jQuery.ajax({
      type: "POST",
      url: "delete_proposal.php",
      data: { 
            OID: +OID
            },
      cache: false,
      success: function(data){
        location.reload()
      }
    });
  }
});