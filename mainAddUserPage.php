<?php
include("common/config.php");
include("class/userManagement.php");
$userObj = new userManage;
if (isset($_POST['txtAction']) && $_POST['txtAction']=="userlist")
{
    $whereConstraint = "";
    $returnJson =	null;
    $userListArray =	array();
    $returnJson = $userObj->getUserList($mysqli,$whereConstraint);
    $userListArray = json_decode($returnJson,true);
    // print "<pre>";
    // print_R($clientListArray);
    
    include("mainUserList.php");
    die;
}
if (isset($_POST['txtAction']) && $_POST['txtAction']=="addUser")
{
    $userObj->addEditUser($mysqli);
    die;
}
if (isset($_POST['txtAction']) && $_POST['txtAction']=="editUser")
{
    $whereConstraint = "";
    $whereConstraint = " AND id = '".$_POST['id']."' ";
    $returnJson =	null;
    $userListArray =	array();
    $returnJson = $userObj->getUserList($mysqli,$whereConstraint);
    $userListArray = json_decode($returnJson,true);
    if (sizeof($userListArray)>0) {
        $txtUserIdValue  = $userListArray[0]['id'];
        $txtUserNameValue = $userListArray[0]['name'];
        $txtUserEmailValue = $userListArray[0]['email'];
        $txtUserRoleValue = $userListArray[0]['role'];
        $txtUserStatusValue = $userListArray[0]['status'];
    }
    include("mainAddUser.php");
    die;
}
if (isset($_POST['txtAction']) && $_POST['txtAction']=="removeUser")
{
    $whereConstraint = "";
    $whereConstraint = " AND id = '".$_POST['id']."' ";
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
        <div class="col-md-8" id="userListDivision">
		
		</div>
        <div class="col-md-4"  id="addUserDivision">
			<?php  include("mainAddUser.php"); ?>
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
function userList() {
	$.ajax({
		method: "POST",
		url: "",
		data: "txtAction=userlist",
	})
	.done(function( data ) {
			$("#userListDivision").html(data);
	  });		
}
 function editUser(id) {
	$.ajax({
		method: "POST",
		url: "",
		data: "txtAction=editUser&id="+id,
	})
	.done(function( data ) {
			$("#addUserDivision").html(data);
	  });
}
function removeUser(id) {
	$.ajax({
		method: "POST",
		url: "",
		data: "txtAction=removeUser&id="+id,
	})
	.done(function( data ) {
		userList();
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
function userValidation() 
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