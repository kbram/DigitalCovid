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
					<h3 class="mb-3 text-center fnt-green">ඇතුල්වීම</h3>
					 <form>
							<div class="form-group">
								<input required type="text" name="mobile0" id="mobile0" tabindex="1" class="form-control" placeholder="දුරකථන අංකය" value="+94">
							</div>
							<div class="text-center pt-2 pb-2 text-center">
								<div class="text-center" style="display: inline-block;" id="recaptcha-container"></div>
							</div>
							<div class="form-group text-center">
								<button type="button" name="sendverification0" id="sendverification0" tabindex="4" class="btn btn-green pl-5 pr-5" value="Register Now">කේතය ලබාගන්න </button>
							</div>
							<div class="form-group">
								<input  type="text" name="verificationCode0" id="verificationCode0" tabindex="1" class="form-control" placeholder="තහවුරු කිරීමේ කේතය ඇතුලත් කරන්න" >
							</div>
							<div class="form-group text-center">
								<button type="button" name="register-submit0" id="register-submit0" tabindex="4" class="btn btn-green pl-5 pr-5" value="Register Now">තහවුරු කර ඇතුල්වන්න</button>
							</div>
							<a class="fnt-green" href="register.php">ලියාපදිංචි වන්න</a>
					</form>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 text-center">
			<div class="container-fluid">
				<p class="fnt-green"><b>ශ්‍රී ලංකාව</b></p>
				<div class="addedItems2">
					<p class="h2" id="local_new_cases"></p>
					<p>නව වාර්ථාවීම්</p>
				</div>
				<div class="addedItems2">
					<p class="h2" id="local_total_cases"></p>
					<p>මුළු වාර්ථාවීම්</p>
				</div>
				<div class="addedItems2">
					<p class="h2" id="local_deaths"></p>
					<p>මරණ ගණන</p>
				</div>
				<div class="addedItems2">
					<p class="h2" id="local_recovered"></p>
					<p>සුවවීම්</p>
				</div>

			</div>
			<div class="container-fluid">
				<p class="fnt-green"><b>ගෝලීය</b></p>
				<div class="addedItems2">
					<p class="h2" id="global_new_cases"></p>
					<p>නව වාර්ථාවීම්</p>
				</div>
				<div class="addedItems2">
					<p class="h2" id="global_total_cases"></p>
					<p>මුළු වාර්ථාවීම්</p>
				</div>
				<div class="addedItems2">
					<p class="h2" id="global_deaths"></p>
					<p>මරණ ගණන</p>
				</div>
				<div class="addedItems2">
					<p class="h2" id="global_recovered"></p>
					<p>සුවවීම්</p>
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
			<h1><b>කොරෝනා වෛරසය (COVID-19) </b></h1>
			<p class="text-justify">කොරෝනා වෛරසය යනු සතුන් තුළ දක්නට ලැබුන වෛරසයක් වන අතර පසුව සතුන්ගෙන් මිනිසුන්ට සම්ප්‍රේෂණය වී වර්තමානය වනවිට පුද්ගලයාගෙන් පුද්ගලයාට ඉතා සීඝ්‍ර ලෙස ව්‍යාප්ත වෙමින් පවතී. COVID-19 රෝග ලක්ෂණ මතු වීමට, නිරාවරණය වීමෙන් දින 2-14 ක් පමන ගතවේ. දුර්වල ප්‍රතිශක්තිකරණ පද්ධතියක් ඇති අයට නියුමෝනියාව හෝ බ්රොන්කයිටිස් වැනි බරපතල රෝග ලක්ෂණ ඇතිවිය හැකිය. COVID-19 වලට නිරාවරණය වීමෙන් පසු ඔබට කිසි විටෙකත් රෝග ලක්ෂණ ඇති නොවිය හැකිය. මේ දක්වා, බොහෝ රෝගීන් වැඩිහිටියන් වන නමුත් සමහර දරුවන් ද ආසාදනය වී ඇත. එම නිසා මේ තත්වයේ ඇති බරපතලකම වටහාගෙන ආරක්ෂාකාරීව ජීවත් වීමට උත්සුක වෙමු..</p>
		</div>
	</div>
</div>
<div class="container-fluid bg-light">
	<div class="row pt-5 pb-5 pl-2 pr-2">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fnt-green">
			<h1><b>ඇප් එක ලබා ගන්න </b></h1>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 fnt-green pt-1">
			<p class="text-justify">මෙම ලින්ක් මගින් ඔබට ඇප් එක ලබාගත හැකි අතර ඉන්පසු එහි ඇති උපදෙස් අනුව ලියාපදිංචි වී මෙම රෝගය මැඩලීමට සහ ව්‍යාප්තිය පාලනය කිරීම සදහා සහය වන්න.</p>
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
					alert("කෙටි පණිවිඩය යවන ලදී");
				}).catch(function (error) {
					alert(error.message);
				});
			}else{
				window.alert("කරුණාකර ලියාපදිංචි වන්න")
			}
		}else{
			window.alert("දුරකථන අංකය වැරදියි. මෙම ආකාරයෙන් ඇතුලත් කරන්න! උදා: +94771234567")
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
			window.alert("ඇතුලත් වීම අසාර්ථකයි.")
		}else{
			firebase.database().ref('users/' + d.nic).set(d);
		}
	}
	firebase.auth().onAuthStateChanged(function(user) {
		  if (user) {
			if(user.phoneNumber=="+94767000249"){
					window.location.href="admin/user.php";
			}else{
				window.location.href="user.php";
			}
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
                    alert("ගිණුම ලියාපදිංචි කර නොමැත...");
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
