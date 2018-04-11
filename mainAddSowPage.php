<?php
include("common/config.php");
include("class/sowManagement.php");
$sowObj = new sowManage;
if (isset($_POST['txtAction']) && $_POST['txtAction']=="sowlist")
{
    $whereConstraint = "";
    $returnJson =	null;
    $sowListArray =	array();
    $returnJson = $sowObj->getSowList($mysqli,$whereConstraint);
    $sowListArray = json_decode($returnJson,true);
    // print "<pre>";
    // print_R($clientListArray);
    
    include("mainSowList.php");
    die;
}
if (isset($_POST['txtAction']) && $_POST['txtAction']=="addSow")
{
    $sowObj->addEditSow($mysqli);
    die;
}
if (isset($_POST['txtAction']) && $_POST['txtAction']=="editSow")
{
    $whereConstraint = "";
    $whereConstraint = " AND sowId = '".$_POST['sowId']."' ";
    $returnJson =	null;
    $sowListArray =	array();
    $returnJson = $sowObj->getSowList($mysqli,$whereConstraint);
    $sowListArray = json_decode($returnJson,true);
    if (sizeof($sowListArray)>0) {
        $txtSowIdValue  = $sowListArray[0]['sowId'];
        $txtSowNameValue = $sowListArray[0]['name'];
        $txtUserEmailValue = $sowListArray[0]['email'];
        $txtUserRoleValue = $sowListArray[0]['role'];
        $txtUserStatusValue = $sowListArray[0]['status'];
    }
    include("mainAddUser.php");
    die;
}
if (isset($_POST['txtAction']) && $_POST['txtAction']=="removeUser")
{
    $whereConstraint = "";
    $whereConstraint = " AND sowId = '".$_POST['sowId']."' ";
    $userObj->removeUser($mysqli,$whereConstraint);
    die;
}
include("include/header.php");
include("include/leftmenu.php");

$txtUserNameValue = "";
$txtUserEmailValue = "";
$txtUserRoleValue = "";
$txtUserStatusValue = "";
$txtUserIdValue = 0;
?>

  <!-- Content Wrapper. Contains page content 1-->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        New User Information
      </h1>
    </section>
	<section class="content">
      <div class="row">
        <div class="col-md-8" id="sowListDivision">
		
		</div>
        <div class="col-md-4"  id="addSowDivision">
			<?php  include("mainAddSow.php"); ?>
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
/* function cList() {
	$.ajax({
		method: "POST",
		url: "",
		data: "txtAction=clientlist",
	})
	.done(function( data ) {
			$("#clientListDivision").html(data);
	  });				
} */
function sowList() {
	$.ajax({
		method: "POST",
		url: "",
		data: "txtAction=sowlist",
	})
	.done(function( data ) {
			$("#sowListDivision").html(data);
	  });		
}
 function editSow(sowId) {
	$.ajax({
		method: "POST",
		url: "",
		data: "txtAction=editSow&id="+sowId,
	})
	.done(function( data ) {
			$("#addSowDivision").html(data);
	  });
}
function removeUser(sowId) {
	$.ajax({
		method: "POST",
		url: "",
		data: "txtAction=removeSow&sowId="+sowId,
	})
	.done(function( data ) {
		sowList();
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
function sowValidation()
{
	var userName   = $("#txtUserName").val();
	var userEmail  = $("#txtUserEmail").val();
	var userRole   = $("#txtUserRole").val();
	var userStatus = $("#txtUserStatus").val();
	var isCheck = 1;
	
	if (userName=="") 
	{
		// alert("Enter Client Name");
		$("#txtUserName").addClass("requiredClass");
		isCheck = 0;
	}
	else 
	{
		if (!allnumeric(userName)) {
			$("#txtUserName").removeClass("requiredClass");
		} else {
			$("#txtUserName").addClass("requiredClass");
			isCheck = 2;
		}
	}
	return isCheck;
}
// jquery function
$(document).ready(function(){
	$(document).on("submit","#userForm",function(event){
		var returnNoError = userValidation();			
		// var returnNoError = 1;			
		if (returnNoError==1) {				
			var cId = $("#txtUserId").val();
			$("#userForm").attr("action", "" );
				$.ajax({
					method: "POST",
					url: "",
					data: $("#userForm").serialize(),
				})
				  .done(function( data ) {
					  if (cId==0) {
						alert("Successfully Added");
					  } else if (cId>0) {
						alert("Successfully Modified"); 
					  }
					  userList();
					   $("#txtUserName").val("");
					   $("#txtUserEmail").val("");
					   $("#txtUserRole").val("");
					   $("#txtUserStatus").val("");
					   $("#txtUserId").val("0");
				  });				
			// event.preventDefault(); 
			$("#userForm").attr("action", "javascript:;" );
		} else if (returnNoError==0){
			alert("Please enter all values");
			return false;
		}
		else
		{
			alert("Your Name is not valid. Please Avoid including numbers.");
			return false;
		}
	});
});

userList();
</script> 