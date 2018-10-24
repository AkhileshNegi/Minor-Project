$(document).ready(function(){
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

      }
    });
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