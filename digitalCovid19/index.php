<?php


?>
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
<div class="container-fluid mt-5 pt-5 pb-5">
	<div class="row pt-4 pb-4">
		<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 pl-4 pr-4 pb-4">
			<div class="shadow-sm border loginbox">
				<div id="home" class="pt-4 pb-4 pl-4 pr-4 text-center">
					<h3 class="mb-3 text-center fnt-green">LogIn</h3>
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
		<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 text-center">
			<div class="container-fluid">
				<p class="fnt-green"><b>LOCAL</b></p>
				<div class="addedItems2">
					<p class="h2" id="local_new_cases"></p>
					<p>New Cases</p>
				</div>
				<div class="addedItems2">
					<p class="h2" id="local_total_cases"></p>
					<p>Total Cases</p>
				</div>
				<div class="addedItems2">
					<p class="h2" id="local_deaths"></p>
					<p>Total Deaths</p>
				</div>
				<div class="addedItems2">
					<p class="h2" id="local_recovered"></p>
					<p>Recovered</p>
				</div>

			</div>
			<div class="container-fluid">
				<p class="fnt-green"><b>GLOBAL</b></p>
				<div class="addedItems2">
					<p class="h2" id="global_new_cases"></p>
					<p>New Cases</p>
				</div>
				<div class="addedItems2">
					<p class="h2" id="global_total_cases"></p>
					<p>Total Cases</p>
				</div>
				<div class="addedItems2">
					<p class="h2" id="global_deaths"></p>
					<p>Total Deaths</p>
				</div>
				<div class="addedItems2">
					<p class="h2" id="global_recovered"></p>
					<p>Recovered</p>
				</div>

			</div>
		</div>
	</div>
</div>
<div class="container-fluid bg-green">
	<div class="row pt-5 pb-3 pl-2 pr-2">
		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-3 text-center">
			<img src="img/coronavirus2.png" alt="coronavirus" class="img-fluid">
		</div>
		<div class="col-xs-12 col-sm-12 col-md-10 col-lg-9 fnt-white pt-2">
			<h1><b>Coronavirus disease 2020 (COVID-19) </b></h1>
			<p class="text-justify">A coronavirus is a virus that is found in animals and, rarely, can be transmitted from animals to humans and then spread person to person.COVID-19 symptoms range from mild to severe. It takes 2-14 days after exposure for symptoms to develop.Those with weakened immune systems may develop more serious symptoms, like pneumonia or bronchitis. You may never develop symptoms after being exposed to COVID-19. So far, most confirmed cases are in adults, but some children have been infected. There is no evidence that children are at greater risk for getting the virus.</p>
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
			<a href="https://github.com/chiCKson/digitalCovid19/releases/download/v1.0.2beta4/digitalcovidv1.0.2beta4.apk"><img src="img/playstore.png" alt="playstore" class="img-fluid"></a>
			
		</div>
		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-3">
			<a href="https://github.com/chiCKson/digitalCovid19/releases/download/v1.0.2beta4/digitalcovidv1.0.2beta4.apk"><img src="img/appstore.png" alt="appstore" class="img-fluid"></a>
		</div>
	</div>
</div>
<script type="text/javascript">
	var a=[];
	var userReference=firebase.database().ref().child("users");
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
        }).catch(function (error) {
            alert(error.message);
        });
	});
	firebase.auth().onAuthStateChanged(function(user) {
		  if (user) {
			window.location.href="user.php";
		  } else {
			
		  }
	});
</script>
<script>
$(document).ready(function(){ 
    $.ajax({
            type:'GET',
            url:'https://hpb.health.gov.lk/api/get-current-statistical',
            dataType: "json",
            success:function(ar){
            if(ar.message == 'Success'){
            	
            	//document.getElementById("update_date_time").innerHTML = ar.data.update_date_time;
            	document.getElementById("local_new_cases").innerHTML = ar.data.local_new_cases;
            	document.getElementById("local_total_cases").innerHTML = ar.data.local_total_cases;
            	//document.getElementById("local_total_number_of_individuals_in_hospitals").innerHTML = ar.data.local_total_number_of_individuals_in_hospitals;
            	document.getElementById("local_deaths").innerHTML = ar.data.local_deaths;
            	document.getElementById("local_recovered").innerHTML = ar.data.local_recovered;
            	document.getElementById("global_new_cases").innerHTML = ar.data.global_new_cases;
            	document.getElementById("global_total_cases").innerHTML = ar.data.global_total_cases;
            	document.getElementById("global_deaths").innerHTML = ar.data.global_deaths;
            	document.getElementById("global_recovered").innerHTML = ar.data.global_recovered;
                    

            }else{
                    $('.user-content').slideUp();
                    alert("User not found...");
            } 
        }
		
    });
});
</script>
<!-- Footer -->
<footer>
<?php require_once 'layout/footer.php'; ?>
</footer>
</body>
</html>
