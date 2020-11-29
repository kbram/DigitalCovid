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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtu-gWA2AQO5HqQUAcsEQzZUOsKiSSIAI&libraries=places&callback=initialize">
</script>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <script type="text/javascript" src="../js/main.js"></script>

  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-database.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-storage.js"></script>

  <!-- Load jQuery, jQuery UI and jQuery ui styles from jQuery website -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
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
		
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 pr-4">
			<h2 class="fnt-green pl-1">Add User to Infected List</h2>
			<div class="loginbox pl-4 pr-4 pt-2">
				<form>
					<h4>Already Registered </h4>
					<br>
					<div class="form-group pb-2">
						<input required type="text" name="nic0" id="nic0" tabindex="1" class="form-control" placeholder="NIC Number" value="">
					</div>
					<div class="form-group text-center">
						<button type="button" name="register-submit0" id="register-submit0" tabindex="4" class="btn btn-green pl-5 pr-5" value="Register Now">Add Infected</button>
					</div>
					<h4>If not Registered</h4>
					<br>
					<div class="form-group pb-2">
						<input required value="" type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="InfectedName" value="">
					</div>
					<div class="form-group pb-2">
						<input required type="text" name="nic" id="nic" tabindex="1" class="form-control" placeholder="NIC Number" value="">
					</div>
					<div class="form-group pb-2">
						<select id="gender">
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select>
					</div>
					<div class="form-group pb-2">
						<input required type="email"  id="regEmail" tabindex="1" class="form-control" placeholder="Email Address" value="">
					</div>
					
					<div class="form-group ">
						<input required type="text" name="location" id="location" tabindex="2" class="form-control" placeholder="Current Location">
					</div>
					<div class="form-group">
						<input required type="text" name="mobile" id="mobile" tabindex="1" class="form-control" placeholder="Mobile" value="+94">
					</div>
					<div class="form-group text-center">
						<button type="button" name="register-submit" id="register-submit" tabindex="4" class="btn btn-green pl-5 pr-5" value="Register Now">Add Infected</button>
					</div>
				</form>
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
<script type="text/javascript">
	var usertBy=[];//use this for auto complete for (already registered nic)
	var userReference=firebase.database().ref().child("users");
	userReference.on("value",function(snapshot){
		snapshot.forEach(function(childsnapshot){
			var person=childsnapshot.val();
			usertBy.push(person.nic);
		});
	});
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
		});
		if(x==false){
			firebase.auth().signOut();
		}
	});

	//autocomplete events name part
	var lat11="6";
	var long11="79";
	var searchInput = 'location';

    $(document).ready(function () {
        var autocomplete;
        autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
            types: ['geocode'],
        });
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var near_place = autocomplete.getPlace();
            lat11= near_place.geometry.location.lat();
			long11 = near_place.geometry.location.lng();
        });
    });

    var autocomplete;
    autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
        types: ['geocode'],
        componentRestrictions: {
            country: "USA"
        }
    });

	$("#register-submit0").click(function(){
		var nic=$("#nic0").val();
		var x=false;
		if(!ValidateNIC(nic)){
			window.alert("Please Enter NIC like \"123456789V!\"(9 letters) or \"123456789123\"(12 letters)")
		}else{
			for (var i = 0; i <usertBy.length; i++) { 
				if(usertBy[i]==nic){
					firebase.database().ref('infected').push(nic);
					window.alert("Updated "+nic+" as Infected ")
					x=true;
				}
			}
			if(x==false){
				window.alert("This nic is not already registered")
			}
		}
	});
	$("#register-submit").click(function(){
		var email=$("#regEmail").val();
		var username=$("#username").val();
		var nic=$("#nic").val();
		var gender=$("#gender").val();
		var mobileno=$("#mobile").val();
		if(email=="" ||username=="" ||nic=="" ||mobileno=="" ||gender==""){
			window.alert("please fill out all Form field")
		}else if(!ValidateNIC(nic)){
			window.alert("Please Enter NIC like \"123456789V!\"(9 letters) or \"123456789123\"(12 letters)")
		}else if(!ValidateEmail(email)){
			window.alert("You have entered an invalid Email Address!")
		}else if (mobileno.toString().length!=12){
			window.alert("You have entered an invalid Phone Number! Enter (+94771234567)")
		}else if(lat11=="6" && long11=="79"){
			window.alert("Please add your currunt location")
		}else{
			var detail ={
				email:$("#regEmail").val(),
				gender:$("#gender").val(),
				mobile:$("#mobile").val(),
				lat:lat11,
				long:long11,
				nic:$("#nic").val(),
				status:"infected",
				username:$("#username").val()
			}
			addDetail(detail);
		}
	});
	
	function addDetail(d){
		//window.alert(d.nic+d.username+d.status)
		if(d.nic==""){
			window.alert("User are not updated please try Again")
		}else{
			firebase.database().ref('users/' + d.nic).set(d);
			firebase.database().ref('infected').push(d.nic);
			window.alert("Updated Infected NIC")
		}
	}
	function ValidateEmail(mail) {
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)){
			return (true)
		}else{
			return (false)
		}
	}
	function ValidateNIC(nic) 
	{
		if (nic.length==10 || nic.length==12)
		{
			if(nic.length==10){
				vari=nic.substring(0,9);
				if(!(isNaN(vari))){ 
					return (true)
				}
				else{
					return (false)
				}
			}else{
				if(!(isNaN(nic))){ 
					return (true)
				}
				else{
					return (false)
				}
			}
		}else
		{
		return (false)
		}
	}
	firebase.auth().onAuthStateChanged(function(user) {
		if (user) {
			currentUser=user;
			var mobile = user.phoneNumber;
		} else {
			window.location.href="../index.php";
		}
	});
</script>
<script>
	$(document).ready(
		function () {
		 $("#nic0").autocomplete({
		 source: usertBy,
		 autoFocus: true,
		});
	});
</script>
<!-- Load jQuery because we need overide firebase jquery -->
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

</body>
</html>
