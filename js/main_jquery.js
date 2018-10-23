$(document).ready(function(){
	$(".btnid").click(function(){
    var uid = $(this).data('username');
    delete_ad(uid)        
	});
	function delete_ad(uid)
    {
      jQuery.ajax({
       type: "POST",
       url: "delete_ad.php",
       data: { 
                uid: +uid
            },
       cache: false,
       success: function(data){
       	location.reload();
       }
     });
    }
});