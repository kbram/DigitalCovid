<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>DigitalCovid19</title>
  <meta name="description" content="DigitalCovid19 Application - Sri lanka">
  <meta name="keywords" content="">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:url" content=" "/>
  <meta property="og:type" content="website" />
  <meta property="og:title" content=""/>
  <meta property="og:description" content="" />
  <meta property="og:image" content="img/logo.jpg" />
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script type="text/javascript" src="js/main.js"></script>


  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-database.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-storage.js"></script>

<script>
	var firebaseConfig = {
		apiKey: "AIzaSyBtu-gWA2AQO5HqQUAcsEQzZUOsKiSSIAI",
		authDomain: "digitalcovid19.firebaseapp.com",
		databaseURL: "https://digitalcovid19.firebaseio.com",
		projectId: "digitalcovid19",
		storageBucket: "digitalcovid19.appspot.com",
		messagingSenderId: "226267539493",
		appId: "1:226267539493:web:53c443aa1c0d718a3937cc"
	};
  	// Initialize Firebase
  	firebase.initializeApp(firebaseConfig);
  	firebase.auth.Auth.Persistence.LOCAL;
    window.onload=function () {
      	render();
    };
    function render() {
        window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
    }
</script>
<style>
    #myMap {
      padding: 10px;
       height: 350px;
       width: 100%;
    }
    #main{
      background-color: lightgreen;
      height: 450px;
      width: 100%;
    }
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtu-gWA2AQO5HqQUAcsEQzZUOsKiSSIAI&libraries=places&callback=initMap">
</script>
</head>

<body>
<?php require_once 'layout/head.php'; ?>
<div class="container mt-5 pt-5 pb-5">
	<div class="row pt-5 pb-4">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h2 class="mb-3 text-center fnt-green">Admin Login</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
			<div class="shadow-sm border p-5 mx-auto loginbox">
			<form>
				<div class="form-group">
					<input required type="text" name="mobile0" id="mobile0" tabindex="1" class="form-control" placeholder="Mobile" value="+94">
				</div>
				<div class="text-center pt-2 pb-2 text-center">
					<div class="text-center" style="display: inline-block;" id="recaptcha-container"></div>
				</div>
				<div class="form-group text-center">
					<button type="button" name="sendverification0" id="sendverification0" tabindex="4" class="btn btn-green pl-5 pr-5" value="Register Now">Send Code </button>
				</div>
				<div class="form-group">
				<input  type="text" name="verificationCode0" id="verificationCode0" tabindex="1" class="form-control" placeholder="Enter verification code" >
			</div>
			<div class="form-group text-center">
				<button type="button" name="register-submit0" id="register-submit0" tabindex="4" class="btn btn-green pl-5 pr-5" value="Register Now">Verify and Login</button>
			</div>
			<a class="fnt-green" href="register.php">Registration</a>
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
			<a href=""><img src="img/playstore.png" alt="playstore" class="img-fluid"></a>
			
		</div>
		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-3">
			<a href=""><img src="img/appstore.png" alt="appstore" class="img-fluid"></a>
		</div>
	</div>
</div>

<script>
var a=[];
	var userReference=firebase.database().ref().child("admin");
	userReference.on("value",function(snapshot){
		snapshot.forEach(function(childsnapshot){
			var person=childsnapshot.val();
			a.push(person.mobile);
		});
	});
	$("#sendverification0").click(function()
  	{
		var mobileno=$("#mobile0").val();
		var check=false;
		for (var j = 0; j <a.length; j++) {
			if(a[j]==mobileno){
				check=true
			}
		}
		if(mobileno.toString().length==12){
			if(check==true){
				var auth = firebase.auth();
				firebase.auth().signInWithPhoneNumber(mobileno,window.recaptchaVerifier).then(function (confirmationResult) {
					window.confirmationResult=confirmationResult;
					coderesult=confirmationResult;
					alert("Message sent");
				}).catch(function (error) {
					alert(error.message);
				});
			}else{
				window.alert("Please Register first")
			}
		}else{
			window.alert("You have entered an invalid Phone Number! Enter (+94771234567)")
		}
		
	});
	$("#register-submit0").click(function(){
		var code=document.getElementById('verificationCode0').value;
        coderesult.confirm(code).then(function (result) {
			window.alert("Your account want to confirm to administraion, Please wait until accept your account.")
        }).catch(function (error) {
            alert(error.message);
        });
	});
	
firebase.auth().onAuthStateChanged(function(user) {
	if (user) {
		currentUser=user;
		window.location.href="doctor/user.php";
	} else {

	}
});
</script>
<!-- Footer -->
<footer>
<?php require_once 'layout/footer.php'; ?>
</footer>
</body>
</html>
