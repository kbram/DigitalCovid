<?php


?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>எண்ணிம கோவிட் -19</title>
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
					<h3 class="mb-3 text-center fnt-green">உள்நுழைய</h3>
					 <form>
							<div class="form-group">
								<input required type="text" name="mobile0" id="mobile0" tabindex="1" class="form-control" placeholder="Mobile" value="+94">
							</div>
							<div class="text-center pt-2 pb-2">
								<div class="text-center" style="display: inline-block;" id="recaptcha-container"></div>
							</div>
							<div class="form-group text-center">
								<button type="button" name="sendverification0" id="sendverification0" tabindex="4" class="btn btn-green pl-5 pr-5" value="Register Now">இரகசிய குறியீட்டை அனுப்பவும்</button>
							</div>
							<div class="form-group">
								<input  type="text" name="verificationCode0" id="verificationCode0" tabindex="1" class="form-control" placeholder="குறியீட்டை  உள்ளிடுக" >
							</div>
							<div class="form-group text-center">
								<button type="button" name="register-submit0" id="register-submit0" tabindex="4" class="btn btn-green pl-5 pr-5" value="Register Now">உறுதி செய்யப்பட்டது  உள்நுழையவும்</button>
							</div>
							<a class="fnt-green" href="register.php">பதிவு செய்ய</a>
					</form>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 text-center">
			<div class="container-fluid">
				<p class="fnt-green"><b>இலங்கை</b></p>
				<div class="addedItems2">
					<p class="h2" id="local_new_cases"></p>
					<p>புதிய வரவு</p>
				</div>
				<div class="addedItems2">
					<p class="h2" id="local_total_cases"></p>
					<p>மொத்த வரவு</p>
				</div>
				<div class="addedItems2">
					<p class="h2" id="local_deaths"></p>
					<p>மொத்த இறப்பு</p>
				</div>
				<div class="addedItems2">
					<p class="h2" id="local_recovered"></p>
					<p>குணமடைந்தோர்</p>
				</div>

			</div>
			<div class="container-fluid">
				<p class="fnt-green"><b>உலகம்</b></p>
				<div class="addedItems2">
					<p class="h2" id="global_new_cases"></p>
					<p>புதிய வரவு</p>
				</div>
				<div class="addedItems2">
					<p class="h2" id="global_total_cases"></p>
					<p>மொத்த வரவு</p>
				</div>
				<div class="addedItems2">
					<p class="h2" id="global_deaths"></p>
					<p>மொத்த இறப்பு</p>
				</div>
				<div class="addedItems2">
					<p class="h2" id="global_recovered"></p>
					<p>குணமடைந்தோர்</p>
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
			<p class="text-justify">கொரோனா வைரஸ் என்பது விலங்குகளில் காணப்படும் ஒரு வைரஸ் ஆகும். இது மிக அரிதாக விலங்குகளிடமிருந்து மனிதர்களுக்கு பரவுகிறது, பின்னர் நபருக்கு நபர் பரவுகிறது. கோவிட் -19 இற்கான அறிகுறிகள் லேசானது முதல் கடுமையானவையாக வரை இருக்கும். 
இவ் அறிகுறிகள் உருவாக 2-14 நாட்கள் ஆகும். இது பலவீனமான நோயெதிர்ப்பு அமைப்புகளுடன் நிமோனியா அல்லது மூச்சுக்குழாய் அழற்சி போன்ற 
தீவிர அறிகுறிகளை உருவாக்கலாம். COVID-19 க்கு ஆளான பிறகு நீங்கள் ஒருபோதும் அறிகுறிகளை உருவாக்க முடியாது. 
இதுவரை, பெரும்பாலான உறுதிப்படுத்தப்பட்ட வழக்குகள் பெரியவர்களிடம்தான் உள்ளன, ஆனாலும் ஒரு சில குழந்தைகள் பாதிக்கப்பட்டுள்ளனர் 
இருப்பினும் குழந்தைகளுக்கு வைரஸ் வருவதற்கான ஆபத்து அதிகம் என்பதற்கு எந்த ஆதாரமும் இதுவரை கண்டறியப்படவில்லை..</p>
		</div>
	</div>
</div>
<div class="container-fluid bg-light">
	<div class="row pt-5 pb-5 pl-2 pr-2">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fnt-green">
			<h1><b>பயன்பாட்டை பதிவிறக்கம் செய்ய</b></h1>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 fnt-green pt-1">
			<p class="text-justify">பின்வரும் இணைப்புகளிலிருந்து நீங்கள் Andriod/iOS பயன்பாடுகளை பதிவிறக்கம் செய்துகொள்ள முடியும் . பின்னர் உங்கள் தரவுகளை பதிவு செய்வதன் மூலம் இலங்கையில் கொரோனா பரவுவதை நிறுத்த பங்களிப்பு செய்வோம்</p>
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
				window.alert("முதலில் பதிவு செய்யவும்")
			}
		}else{
			window.alert("நீங்கள் தவறானகையடக்க தொலைபேசி எண்ணைஉள்ளீடு செய்துளீர்கள்.உதாரணம் (+94771234567)")
		}
		
	});
	$("#register-submit0").click(function(){
		var code=document.getElementById('verificationCode0').value;
        coderesult.confirm(code).then(function (result) {
        }).catch(function (error) {
            alert(error.message);
        });
	});
	function addDetail(d){
		if(d.nic==""){
			window.alert("பயனர்கள் புதுப்பிக்கப்படவில்லை  மீண்டும்  முயற்சிக்கவும்")
		}else{
			firebase.database().ref('users/' + d.nic).set(d);
		}
	}
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
