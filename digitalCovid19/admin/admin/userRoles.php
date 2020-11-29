<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>Admin Account - DigitalCovid19</title>
  <meta name="description" content="My Account - DigitalCovid19">
  <meta name="keywords" content="">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:url" content=" "/>
  <meta property="og:type" content="website" />
  <meta property="og:title" content=""/>
  <meta property="og:description" content="" />
  <meta property="og:image" content="../img/logo.jpg" />
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <script type="text/javascript" src="../js/main.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-database.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-storage.js"></script>
  <style>
    #myMap {
      padding: 0px;
      height: 400px;
      width: 100%;
    }
    #main{
      background-color: lightgreen;
      height: 450px;
      width: 780px;
    }
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtu-gWA2AQO5HqQUAcsEQzZUOsKiSSIAI&libraries=places&callback=initialize">
</script>
</head>

<body>
<?php require_once '../layout/head.php'; ?>
<div class="container-fluid mt-5 pt-5 pb-5">
	<div class="row pt-4 pr-0">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 pl-4 pr-4 pb-4">
			<div class="shadow-sm border userbox">
				<a class="fnt-green" href="user.php"><i class="fas fa-poll"></i> Dashboard</a><br>
				<hr>
				<a class="fnt-green" href="user_profile.php"><i class="fas fa-user"></i> My Profile</a><br>
				<hr>
				<a class="fnt-green" href="infected.php"><i class="fas fa-list"></i> Infected List</a><br>
				<hr>
				<a class="fnt-green" href="addInfected.php"><i class="fas fa-list-alt"></i> Add Infected User</a><br>
				<hr>
				<a class="fnt-green" href="addInfectedEvent.php"><i class="fas fa-box"></i> Add Infected Event</a><br>
				<hr>
				<a class="fnt-green" href="userRoles.php"><i class="fas fa-box"></i> User Roles</a><br>

			</div>
		</div>
		
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
			<h2 class="fnt-green pb-3">New User Role Requests</h2>
			<div id="showList" class="container-fluid text-center">
			</div>
		</div>
	</div>
</div>
<div class="container-fluid bg-light">
	<div class="row pt-5 pb-5 pl-2 pr-2">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fnt-green">
			<h1><b>Download our app </b></h1>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 fnt-green pt-1">
			<p class="text-justify">You can download android/iso app from follow links. Then register and update your information this will usefull for prevent the virus spreding in sri lanka</p>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-3">
			<a href=""><img src="../img/playstore.png" alt="playstore" class="img-fluid"></a>
			
		</div>
		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-3">
			<a href=""><img src="../img/appstore.png" alt="appstore" class="img-fluid"></a>
		</div>
	</div>
</div>

<!-- Footer -->
<footer>
<?php require_once '../layout/footer.php'; ?>
</footer>
<script>

</script>
<script type="text/javascript">
	firebase.auth().onAuthStateChanged(function(user) {
		if (user) {
			currentUser=user;
			var mobile = user.phoneNumber;
		} else {
			window.location.href="../index.php";
		}
	});
	var doctor=[];
	var isp=[];
	var reqest=[];
	var x=false;
	var userReference=firebase.database().ref().child("admin");
	userReference.on("value",function(snapshot){
		snapshot.forEach(function(childsnapshot){
			var person=childsnapshot.val();
			if(currentUser.email==null){
				cumobile=currentUser.phoneNumber;
				if(cumobile==person.mobile){
					if(person.type=="admin"){
						x=true;
					}
				}
			}
			if(person.type=="doctor"){
				var a=[];
				a.push(person.nic);
				a.push(person.username);
				a.push(person.mobile);
				a.push(person.type);
				doctor.push(a);
			}else if(person.type=="isp"){
				var b=[];
				b.push(person.nic);
				b.push(person.username);
				b.push(person.mobile);
				b.push(person.type);
				isp.push(b);
			}else if(person.type=="null"){
				var c=[];
				c.push(person.nic);
				c.push(person.username);
				c.push(person.mobile);
				c.push(person.type);
				reqest.push(c);
			}
		});
		if(x==false){
			firebase.auth().signOut();
		}
	});
	
	setTimeout(
		function(){
			var heroHTMLItems="";
			if(reqest.length>0){
				heroHTMLItems+="<h4 class='fnt-green pb-3'>Request</h4>";
				heroHTMLItems+="<div class='table-responsive'>";
				heroHTMLItems+="<table class='table table-bordered'>";
				heroHTMLItems+="<thead class='thead-dark'>";
				heroHTMLItems+="<tr><th>NIC</th><th>Name</th><th>Phone</th><th>Role</th><th>Accept</th><th>Remove</th></tr></thead><tbody>";
				for (var i = 0; i <reqest.length; i++) { 
					heroHTMLItems+="<tr>";
					for (var j = 0; j <reqest[i].length; j++) { 
						heroHTMLItems+="<td>"+reqest[i][j]+"</td>";
						if(j==reqest[i].length-1){
							heroHTMLItems+="<td><button type='button' name='accept' id='"+reqest[i][2]+"' class='m-1 btn btn-sm btn-info accept-user' value='accept'>Accept</button></td><td><button type='button' name='reject' id='"+reqest[i][2]+"' class='m-1 btn btn-sm btn-danger delete-user' value='reject'>delete</button></td>";
						}
					}
					heroHTMLItems+="</tr>";
				}
				heroHTMLItems+="</tbody></table></div>";
			}
			if(doctor.length>0){
				heroHTMLItems+="<h4 class='fnt-green '>Doctors</h4>";
				heroHTMLItems+="<div class='table-responsive'>";
				heroHTMLItems+="<table class='table table-bordered'>";
				heroHTMLItems+="<thead class='thead-dark'>";
				heroHTMLItems+="<tr><th>NIC</th><th>Name</th><th>Phone</th><th>Role</th><th>Action</th></tr></thead><tbody>";
				for (var i = 0; i <doctor.length; i++) { 
					heroHTMLItems+="<tr>";
					for (var j = 0; j <doctor[i].length; j++) { 
						heroHTMLItems+="<td>"+doctor[i][j]+"</td>";
						if(j==doctor[i].length-1){
							heroHTMLItems+="<td><button type='button' name='reject' id='"+doctor[i][2]+"' class='m-1 btn btn-sm btn-danger delete-user' value='reject'>delete</button></td>";
						}
					}
					heroHTMLItems+="</tr>";
				}
				heroHTMLItems+="</tbody></table></div>";
			}
			if(isp.length>0){
				heroHTMLItems+="<h4 class='fnt-green pb-3'>ISP</h4>";
				heroHTMLItems+="<div class='table-responsive'>";
				heroHTMLItems+="<table class='table table-bordered'>";
				heroHTMLItems+="<thead class='thead-dark'>";
				heroHTMLItems+="<tr><th>NIC</th><th>Name</th><th>Phone</th><th>Role</th><th>Action</th></tr></thead><tbody>";
				for (var i = 0; i <isp.length; i++) { 
					heroHTMLItems+="<tr>";
					for (var j = 0; j <isp[i].length; j++) { 
						heroHTMLItems+="<td>"+isp[i][j]+"</td>";
						if(j==isp[i].length-1){
							heroHTMLItems+="<td><button type='button' name='reject' id='"+isp[i][2]+"' class='m-1 btn btn-sm btn-danger delete-user' value='reject'>delete</button></td>";
						}
					}
					heroHTMLItems+="</tr>";
				}
				heroHTMLItems+="</tbody></table></div>";
			}
			$("#showList").html(heroHTMLItems);
		}
	, 4000 );
	
	$(document).on("click",".accept-user",function()
  	{
  		var mono=$(this).attr('id');
  		firebase.database().ref("admin/"+mono).update({'type':'doctor'})
  		window.alert("accepted");
		window.location.href="userRoles.php";
	});
	$(document).on("click",".delete-user",function()
  	{
  		var mono=$(this).attr('id');
  		firebase.database().ref("admin/"+mono).remove();
  		window.alert("Deleted");
		window.location.href="userRoles.php";
	});
</script>


</body>
</html>
