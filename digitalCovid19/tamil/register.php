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
	<div class="mt-5 shadow-lg border" style="width:90%;border-radius: 50px;">
		<div class="row pt-5">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
				<h1 class="fnt-green">பதிவு செய்</h1>
			</div>
		</div>
		<div class="row p-5">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<form>
						<div class="form-group pb-2">
							<input required value="" type="text" name="பெயர்" id="username" tabindex="1" class="form-control" placeholder="பெயர்" value="">
						</div>
						<div class="form-group pb-2">
							<input required type="text" name="ஆள் அடையாள அட்டை இல" id="nic" tabindex="1" class="form-control" placeholder="ஆள் அடையாள அட்டை இல" value="">
						</div>
						<div class="form-group pb-2">
							<select id="gender">
								<option value="male">ஆண்</option>
								<option value="female">பெண்</option>
							</select>
						</div>
						<div class="form-group pb-2">
							<input required type="email"  id="regEmail" tabindex="1" class="form-control" placeholder="மின்னஞ்சல் முகவரி" value="">
						</div>
						
						<div class="form-group ">
							<input required type="text" name="location" id="location" tabindex="2" class="form-control" placeholder="தற்போதய இடம்">
						</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="form-group">
							<input required type="text" name="mobile" id="mobile" tabindex="1" class="form-control" placeholder="Mobile" value="+94">
						</div>
						<div class="text-left" id="recaptcha-container0"></div>
						<div class="form-group text-left pt-2">
							<button type="button" name="sendverification" id="sendverification" tabindex="4" class="btn btn-green pl-5 pr-5" value="Register Now">இரகசிய குறியீட்டை அனுப்பு </button>
						</div>
						<div class="form-group pt-1">
							<input  type="text" name="verificationCode" id="verificationCode" tabindex="1" class="form-control" placeholder="இரகசிய குறியீட்டை  உள்ளிடுக" >
						</div>
						<div class="form-group text-left">
							<button type="button" name="register-submit" id="register-submit" tabindex="4" class="btn btn-green pl-5 pr-5" value="Register Now">இரகசிய குறியீட்டை  உறுதி செய்க</button>
						</div>
					</form>
			</div>
		</div>
		<div class="row pt-1">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center pb-5">
				<div class="form-group">
					<div class="text-center fnt-green">
					<h4>ஏற்கனவே பதிவு செய்யப்பட்டவரா ? <a id="gotologin" href="index.php" class="fnt-green">உள்நுழைய</a></h4>
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
	var userReference=firebase.database().ref().child("users");
	userReference.on("value",function(snapshot){
		snapshot.forEach(function(childsnapshot){
			var person=childsnapshot.val();
			userna.push(person.username);
		});
	});
	$("#sendverification").click(function()
  	{
		var email=$("#regEmail").val();
		var username=$("#username").val();
		var nic=$("#nic").val();
		var gender=$("#gender").val();
		var mobileno=$("#mobile").val();
		if(email=="" ||username=="" ||nic=="" ||mobileno=="" ||gender==""){
			window.alert("தயவு செய்து அனைத்து வெற்றிடங்களையும் நிரப்புக")
		}else if(!ValidateNIC(nic)){
			window.alert("தயவுசெய்து ஆள் அடையாள அட்டை இலக்கத்தை பதிவு செய்யவும்\"123456789V!\"(9 letters) or \"123456789123\"(12 letters)")
		}else if(!ValidateEmail(email)){
			window.alert("சரியான மின்னஞ்சல் முகவரி பதிவிடப்படவில்லை")
		}else if (mobileno.toString().length!=12){
			alert("நீங்கள் தவறானகையடக்க தொலைபேசி எண்ணை உள்ளீடு செய்துளீர்கள்.உதாரணம் (+94771234567)")
		}else if(lat11=="6" && long11=="79"){
			window.alert("தற்போதய இடத்தினை சேர்க்கவும்")
		}else{
			var detail ={
				email:$("#regEmail").val(),
				gender:$("#gender").val(),
				mobile:$("#mobile").val(),
				lat:lat11,
				long:long11,
				type:"user",
				nic:$("#nic").val(),
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
					alert("குறியீடு அனுப்பப்பட்டது");
				}).catch(function (error) {
					alert(error.message);
				});
			}else{
				window.alert("ஏற்கனவே இந்த பயனர் பெயர் எடுக்கப்பட்டுள்ளது, தயவுசெய்து வேறு பெயரைத் தட்டச்சு செய்க.")
			}
		}
	});
	$("#register-submit").click(function(){
		var code=document.getElementById('verificationCode').value;
        coderesult.confirm(code).then(function (result) {
            window.alert("உங்கள் கணக்கு உருவாக்கப்பட்டது")
        }).catch(function (error) {
            alert(error.message);
		});
	});
	
	function addDetail(d){
		if(d.nic==""){
			window.alert("பயனர் புதுப்பிக்கப்படவில்லை மீண்டும் முயற்சிக்கவும்")
		}else{
			firebase.database().ref('users/' + d.nic).set(d);
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
