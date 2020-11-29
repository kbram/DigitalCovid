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
        window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container0');
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

<div class="container mt-5 pt-5 pb-5" align="center">
	<div class="shadow-lg border mt-5" style="width:90%;border-radius: 50px;">
		<div class="row pt-5">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
				<h1 class="fnt-green">Registration</h1>
			</div>
		</div>
		<div class="row p-5">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<form>
						<div class="form-group pb-2">
							<input required value="" type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
						</div>
						<div class="form-group pb-2">
							<input required type="text" name="nic" id="nic" tabindex="1" class="form-control" placeholder="NIC Number" value="">
						</div>
						<div class="form-group pb-2 text-left">
							<label for="userRole" class="ml-1">Requested User Role</label>
							<select name="userRole" id="userRole">
								<option value="doctor">Doctor</option>
								<option value="isp">ISP</option>
							</select>
						</div>
						<div class="form-group ">
							<input required type="text" name="location" id="location" tabindex="2" class="form-control" placeholder="Location">
						</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="form-group">
							<input required type="text" name="mobile" id="mobile" tabindex="1" class="form-control" placeholder="Mobile" value="+94">
						</div>
						<div id="recaptcha-container0"></div>
						<div class="form-group text-center pt-2">
							<button type="button" name="sendverification" id="sendverification" tabindex="4" class="btn btn-green pl-5 pr-5" value="Register Now">SendCode </button>
						</div>
						<div class="form-group pt-1">
							<input  type="text" name="verificationCode" id="verificationCode" tabindex="1" class="form-control" placeholder="Enter verification code" >
						</div>
						<div class="form-group text-center">
							<button type="button" name="register-submit" id="register-submit" tabindex="4" class="btn btn-green pl-5 pr-5" value="Register Now">Verify code</button>
						</div>
					</form>
			</div>
		</div>
		<div class="row pt-1">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center pb-5 pr-2 pl-2">
				<div class="form-group">
					<div class="text-center fnt-green">
					<h4>Already registered ? <a id="gotologin" href="index.php" class="fnt-green">Log in</a></h4>
					</div>
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
			<a href=""><img src="img/playstore.png" alt="playstore" class="img-fluid"></a>
			
		</div>
		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-3">
			<a href=""><img src="img/appstore.png" alt="appstore" class="img-fluid"></a>
		</div>
	</div>
</div>
<script type="text/javascript">
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
	var userna=Array();
	var userReference=firebase.database().ref().child("admin");
	userReference.on("value",function(snapshot){
		snapshot.forEach(function(childsnapshot){
			var person=childsnapshot.val();
			userna.push(person.username);
		});
	});
	$("#sendverification").click(function()
  	{
		var username=$("#username").val();
		var nic=$("#nic").val();
		var mobileno=$("#mobile").val();
		var userRole=$("#userRole").val();
		var place=$("#location").val();
		if(username=="" ||nic=="" ||mobileno=="" ||userRole=="" ||place==""){
			window.alert("please fill out all Form field")
		}else if(!ValidateNIC(nic)){
			window.alert("Please Enter NIC like \"123456789V!\"(9 letters) or \"123456789123\"(12 letters)")
		}else if (mobileno.toString().length!=12){
			window.alert("You have entered an invalid Phone Number! Enter (+94771234567)")
		}else if(lat11=="6" && long11=="79"){
			window.alert("Please add your currunt location")
		}else{
			var detail ={
				mobile:$("#mobile").val(),
				lat:lat11,
				long:long11,
				nic:$("#nic").val(),
				place:$("#location").val(),
				type:"null",
				username:$("#username").val()
			}
			var x=true;
			for (var j = 0; j <userna.length; j++) {
				if(userna[j]==$("#username").val()){
					x=false;
				}
			}
			if(x==true){
				addDetail(detail);
				var auth = firebase.auth();
				firebase.auth().signInWithPhoneNumber(mobileno,window.recaptchaVerifier).then(function (confirmationResult) {
					window.confirmationResult=confirmationResult;
					coderesult=confirmationResult;
					alert("Message sent");
				}).catch(function (error) {
					alert(error.message);
				});
			}else{
				window.alert("This User Name Already Taken, Please type Different name")
			}
		}
	});
	$("#register-submit").click(function(){
		var code=document.getElementById('verificationCode').value;
        coderesult.confirm(code).then(function (result) {
			window.alert("Your account want to confirm to administraion, Please wait until accept your account.")
        }).catch(function (error) {
            alert(error.message);
		});
	});
	
	function addDetail(d){
		if(d.mobile==""){
			window.alert("User are not updated please try Again")
		}else{
			firebase.database().ref('admin/' + d.mobile).set(d);
		}
	}
	firebase.auth().onAuthStateChanged(function(user) {
		  if (user) {
			  	if($("#userRole").val()=="admin"){
					window.location.href="admin/user.php";
				}else if($("#userRole").val()=="isp"){
					window.location.href="isp/user.php";
				}else if($("#userRole").val()=="doctor"){
					window.location.href="doctor/user.php";
				}
		  } else {

		  }
	});
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
