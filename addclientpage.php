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
	// print "<pre>";
	// print_R($clientListArray);
	
	include("clientlist.php");
	die;
 }
 if (isset($_POST['txtAction']) && $_POST['txtAction']=="editClient") 
 {
	$whereConstraint = "";
	$whereConstraint = " AND clientId = '".$_POST['clientId']."' ";
	$returnJson =	null;
	$clientListArray =	array();
	$returnJson = $clientObj->getClientList($mysqli,$whereConstraint);
	$clientListArray = json_decode($returnJson,true);
	if (sizeof($clientListArray)>0) {
		$txtClientNameValue = $clientListArray[0]['clientName'];
		$txtClientLNameValue = $clientListArray[0]['clientLegalName'];
		$txtClientIdValue = $clientListArray[0]['clientId'];
	}
	include("addclient.php");
	die;
 }
 if (isset($_POST['txtAction']) && $_POST['txtAction']=="removeClient")
 {
     $whereConstraint = "";
     $whereConstraint = " AND clientId = '".$_POST['clientId']."' ";
     $returnJson =	null;
     $clientListArray =	array();
     $returnJson = $clientObj->getClientList($mysqli,$whereConstraint);
     $clientListArray = json_decode($returnJson,true);
     if (sizeof($clientListArray)>0) {
         $txtClientNameValue = $clientListArray[0]['clientName'];
         $txtClientLNameValue = $clientListArray[0]['clientLegalName'];
         $txtClientIdValue = $clientListArray[0]['clientId'];
     }
     include("addclient.php");
     die;
 }
 include("include/header.php");
 include("include/leftmenu.php");
 
$txtClientNameValue = "";
$txtClientLNameValue = "";
$txtClientIdValue = 0;
?>

  <!-- Content Wrapper. Contains page content 1-->
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
        <div class="col-md-4"  id="addClientDivision">
			<?php  include("addclient.php"); ?>
        </div>
	  </div>
    </section>
  </div>
  
<?php 
 include("include/footer.php");
?>
<style>
.requiredClass {
	border:1px solid #F00!important;
}
</style>
<script>
function cList() {
	$.ajax({
		method: "POST",
		url: "",
		data: "txtAction=clientlist",
	})
	.done(function( data ) {
			$("#clientListDivision").html(data);
	  });				
}
function clientList() {
	$("#clientListDivision").html("<center><img src='/sow/ReportingApplication/img/loading.gif' width='100' height='100'></center>");
	setTimeout(cList, 500)
}
function editClient(clientId) {
	$.ajax({
		method: "POST",
		url: "",
		data: "txtAction=editClient&clientId="+clientId,
	})
	.done(function( data ) {
			$("#addClientDivision").html(data);
	  });				
}
function removeClient(clientId) {
	$.ajax({
		method: "POST",
		url: "",
		data: "txtAction=removeClient&clientId="+clientId,
	})
	.done(function( data ) {
			$("#addClientDivision").html(data);
	  });				
}
function allnumeric(inputtxt)
   {
      var numbers = /^[0-9]+$/;
      if(inputtxt.match(numbers))
      {
      return true;
      }
      else
      {
      return false;
      }
   } 
function clientValidation() {
	var clientName = $("#txtClientName").val();
	var clientLName = $("#txtClientLegalName").val();
	var isCheck = 1;
	if (clientName=="") {
		// alert("Enter Client Name");
		$("#txtClientName").addClass("requiredClass");
		isCheck = 0;
	} else {
		// if (allnumeric(clientName)) {
			$("#txtClientName").removeClass("requiredClass");
		// } else {
			// $("#txtClientName").addClass("requiredClass");
			// isCheck = 0;
		// }
	}
	if (clientLName=="") {
		// alert("Enter Client Legal Name");
		$("#txtClientLegalName").addClass("requiredClass");
		isCheck = 0;
	} else {
		$("#txtClientLegalName").removeClass("requiredClass");
	}
	return isCheck;
}
$(document).ready(function(){
	$(document).on("submit","#clientForm",function(event){
		var returnNoError = clientValidation();			
		// var returnNoError = 1;			
		if (returnNoError==1) {				
			var cId = $("#txtClientId").val();
			$("#clientForm").attr("action", "" );
			// event.preventDefault();
				$.ajax({
					method: "POST",
					url: "",
					data: $("#clientForm").serialize(),
				})
				  .done(function( data ) {
					  if (cId==0) {
						alert("Successfully Added");
					  } else if (cId>0) {
						alert("Successfully Modified"); 
					  }
					  clientList();
					   $("#txtClientName").val("");
					   $("#txtClientLegalName").val("");
					   $("#txtClientId").val("0");
				  });				
			// event.preventDefault(); 
			$("#clientForm").attr("action", "javascript:;" );
		} else {
			alert("Please enter all values");
			return false;
		}
	});
});

clientList();
</script> 