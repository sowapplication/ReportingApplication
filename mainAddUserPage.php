<?php
include("common/config.php");
include("class/userManagement.php");
$userObj = new userManage;
$update = false;
$userListArray=array();
if (isset($_POST['txtAction']) && $_POST['txtAction']=="addUser") 
{
    $userObj->addUser($mysqli);
    die;
}elseif(isset($_POST['userId'])){
    $userListArray = json_decode($userObj->getUserList($mysqli,$_POST['userId']),true);
    echo $userListArray[0]['userId']."\n";
    echo $userListArray[0]['userName']."\n";
    echo $userListArray[0]['userEmail']."\n";
    echo $userListArray[0]['userRole']."\n";
    //include("mainAddUser.php");
    die;
}
if (isset($_POST['txtAction']) && $_POST['txtAction']=="userlist") 
{
    $whereConstraint = "";
    $returnJson =	null;
    $userListArray =	array();
    $returnJson = $userObj->getUserList($mysqli,$whereConstraint);
    $userListArray = json_decode($returnJson,true);
     
    include("mainUserList.php");
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
        New User Information
      </h1>
    </section>
	<section class="content">
      <div class="row">
        <div class="col-md-8" id="userListDivision">
		
		</div>
        <div class="col-md-4">
			<?php  include("mainAddUser.php"); ?>
        </div>
	  </div>
    </section>
  </div>
  <div id="result">
  	<?php print_r($userListArray);?>
  </div>
<?php 
 include("include/footer.php");
?>

<script>
function userList() 
{
	$.ajax({
		method: "POST",
		url: "",
		data: "txtAction=userlist",
	})
      .done(function( data ) {
          	$("#userListDivision").html(data);
      });				
}
$(document).ready(function(){

	$(document).on('click','.user-edit',function(){
		userIdVal = $(this).attr('data');
		$.ajax({
			method: "POST",
			url: "",
			data: {userId:userIdVal},
		})
	      .done(function( response ) {
	    	  alert(response);
	    	  var res = response.split("\n");
	    	  $('#txtAction').val(res[0]);
	    	  $('#txtUserName').val(res[1]);	    	
	    	  $('#txtUserEmailId').val(res[2]);
	    	  $('#txtUserRole').val(res[3]);  
	      });	
	});
	$(document).on("submit","#userForm",function(event){
		// var returnNoError = $.fn.roleFilterFormValidation();			
		var returnNoError = 1;			
		if (returnNoError==1) {				
			$("#userForm").attr("action", "");
			event.preventDefault();
			var $form = $( this ),
				inputdata = $("#userForm").serialize(),
				url = $form.attr( "action" );
				$.ajax({
					method: "POST",
					url: url,
					data: $("#userForm").serialize(),
				})
				  .done(function( data ) {
					  userList();
						
				  });				
			event.preventDefault(); 
			$("#userForm").attr("action", "javascript:;" );
		} else {
			// sweetAlert("Oops...", "Please fill the required fields!", "error");
			return false;
		}
	});
});

userList();


</script> 