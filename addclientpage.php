<?php 
 include("common/config.php");
 include("class/clientManagement.php");
 $clientObj = new clientManage;
 if (isset($_POST['txtAction']) && $_POST['txtAction']=="addClient") 
 {
	$clientObj->addEditClient($mysqli);
	die;
 }
 if (isset($_POST['txtAction']) && $_POST['txtAction']=="clientlist") 
 {
	$whereConstraint = "";
	$returnJson =	null;
	$clientListArray =	array();
	$returnJson = $clientObj->getClientList($mysqli,$whereConstraint);
	$clientListArray = json_decode($returnJson,true);
	include("clientlist.php");
	die;
 }
 
 include("include/header.php");
 include("include/leftmenu.php");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        New Client Information
      </h1>
    </section>
	<section class="content">
      <div class="row">
        <div class="col-md-8" id="clientListDivision">
		
		</div>
        <div class="col-md-4">
			<?php  include("addclient.php"); ?>
        </div>
	  </div>
    </section>
  </div>
  
<?php 
 include("include/footer.php");
?>

<script>
function clientList() {
	$.ajax({
		method: "POST",
		url: "",
		data: "txtAction=clientlist",
	})
	  .done(function( data ) {
			$("#clientListDivision").html(data);
	  });				
}
$(document).ready(function(){
	$(document).on("submit","#clientForm",function(event){
		// var returnNoError = $.fn.roleFilterFormValidation();			
		var returnNoError = 1;			
		if (returnNoError==1) {				
			$("#clientForm").attr("action", "" );
			event.preventDefault();
			var $form = $( this ),
				inputdata = $("#clientForm").serialize(),
				url = $form.attr( "action" );
				$.ajax({
					method: "POST",
					url: url,
					data: $("#clientForm").serialize(),
				})
				  .done(function( data ) {
					  clientList();
						
				  });				
			event.preventDefault(); 
			$("#clientForm").attr("action", "javascript:;" );
		} else {
			// sweetAlert("Oops...", "Please fill the required fields!", "error");
			return false;
		}
	});
});

clientList();
</script> 