$(document).ready(function(){
  $("#offer").submit(function(){
    alert('Form is submitting....');
    return true;
  });
  $(".respond").click(function(){
      var AdID = $(this).data('cost');
      $(".modal-body #fare").val(AdID);
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