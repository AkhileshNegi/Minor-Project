$(document).ready(function(){
	$(".cancel_my_Ad").click(function(){
    var AdID = $(this).data('username');
    delete_ad(AdID)        
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
    var OID = $(this).data('username');
    delete_proposal(OID)        
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