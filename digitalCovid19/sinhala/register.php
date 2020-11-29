<?php


?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>DigitalCovid19 - ලියාපදිංචි වන්න</title>
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
				<h1 class="fnt-green">ලියාපදිංචි වන්න</h1>
			</div>
		</div>
		<div class="row p-5">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<form>
						<div class="form-group pb-2">
							<input required value="" type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="පරිශීලකයා" value="">
						</div>
						<div class="form-group pb-2">
							<input required type="text" name="nic" id="nic" tabindex="1" class="form-control" placeholder="ජාතික හැදුනුම්පත් අංකය" value="">
						</div>
						<div class="form-group pb-2">
							<select id="gender">
								<option value="male">පිරිමි</option>
								<option value="female">ගැහැනු</option>
							</select>
						</div>
						<div class="form-group pb-2">
							<input required type="email"  id="regEmail" tabindex="1" class="form-control" placeholder="ඊමේල් ලිපිනය" value="">
						</div>
						
						<div class="form-group ">
							<input required type="text" name="location" id="location" tabindex="2" class="form-control" placeholder="ස්ථානය">
						</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="form-group text-left">
							<input required type="text" name="mobile" id="mobile" tabindex="1" class="form-control" placeholder="දුරකථන අංකය" value="+94">
						</div>
						<div class="text-left">
							<div class="text-left" id="recaptcha-container0"></div>
						</div>
						<div class="form-group text-left pt-2">
							<button type="button" name="sendverification" id="sendverification" tabindex="4" class="btn btn-green pl-5 pr-5" value="Register Now">කේතය ලබාගන්න </button>
						</div>
						<div class="form-group pt-1 text-left">
							<input  type="text" name="verificationCode" id="verificationCode" tabindex="1" class="form-control" placeholder="තහවුරු කිරීමේ කේතය ඇතුලත් කරන්න" >
						</div>
						<div class="form-group text-left">
							<button type="button" name="register-submit" id="register-submit" tabindex="4" class="btn btn-green pl-5 pr-5" value="Register Now">කේතය ඇතුලත් කරන්න</button>
						</div>
					</form>
			</div>
		</div>
		<div class="row pt-1 pb-3">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-4 pl-2 pr-2 text-center">
				<div class="form-group">
					<div class="text-center fnt-green">
					<h4>දැනටමත් ලියාපදිංචි වී ඇත්ද ? <a id="gotologin" href="index.php" class="fnt-green">ඇතුලුවීමට</a></h4>
					</div>
				</div>
			</div>
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
			window.alert("සියලු තොරතුරු ඇතුලත් කලයුතුයි")
		}else if(!ValidateNIC(nic)){
			window.alert("ජාතික හැදුනුම්පත් අංකය \"123456789V!\"(9 letters) හෝ \"123456789123\"(12 letters)")
		}else if(!ValidateEmail(email)){
			window.alert("ඊමේල් ලිපිනය වැරදියි!")
		}else if (mobileno.toString().length!=12){
			window.alert("දුරකථන අංකය වැරදියි! මෙම ආකාරයෙන් ඇතුලත් කරන්න (+94771234567)")
		}else if(lat11=="6" && long11=="79"){
			window.alert("වර්තමාන පදිංචි ස්ථානය ඇතුලත් කරන්න")
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
					alert("කෙටි පණිවිඩය යවන ලදී");
				}).catch(function (error) {
					alert(error.message);
				});
			}else{
				window.alert("මෙම පරිශීලක නාමය වෙනත් ගිණුමක භාවිතා වේ. කරුණාකර වෙනත් පරිශීලක නාමයක් යොදන්න");
			}
		}
	});
	$("#register-submit").click(function(){
		var code=document.getElementById('verificationCode').value;
        coderesult.confirm(code).then(function (result) {
            window.alert("ඔබගේ ගිණුම සාර්ථකව පිහිටුවන ලදී")
        }).catch(function (error) {
            alert(error.message);
		});
	});
	
	function addDetail(d){
		if(d.nic==""){
			window.alert("ඇතුලත් වීම අසාර්ථකයි")
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
                    alert("ගිණුම ලියාපදිංචි කර නොමැත....");
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
