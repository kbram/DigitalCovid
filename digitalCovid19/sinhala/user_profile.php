<?php

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>ගිණුමේ විස්තර - DigitalCovid19</title>
  <meta name="description" content="My Profile - DigitalCovid19">
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtu-gWA2AQO5HqQUAcsEQzZUOsKiSSIAI&libraries=places&callback=initMap">
</script>
</head>

<body>
<?php require_once 'layout/head.php'; ?>
<div class="container-fluid mt-5 pt-5 pb-5">
	<div class="row pt-4">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 pl-4 pr-4 pb-4">
			<div class="shadow-sm border userbox">
				<a class="fnt-green" href="user.php"><i class="fas fa-bell"></i> ගිණුම් සාරාංශය</a><br>
				<hr>
				<a class="fnt-green" href="data.php"><i class="fas fa-poll"></i> තොරතුරු</a><br>
				<hr>
				<a class="fnt-green" href="user_profile.php"><i class="fas fa-user"></i> ගිණුමේ විස්තර</a><br>
				<hr>
				<a class="fnt-green" href="user_symptoms.php"><i class="fas fa-heartbeat"></i> රෝග ලක්ෂණ</a><br>
				<hr>
				<a class="fnt-green" href="user_events.php"><i class="fas fa-calendar-alt"></i> සහභාගී වීම්</a><br>
				<hr>
				<a class="fnt-green" href="getMedicalAdvice.php"><i class="fas fa-comments"></i> වෛද්‍ය උපදෙස් ලබාගන්න</a><br>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 pl-2 pr-2">
			<h2 class="fnt-green">ගිණුමේ විස්තර</h2><br>
			<div class="loginbox pl-4 pr-4">
				<form>
				<div class="form-group">
					<input required readonly type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="නම" value="">
				</div>
				<div class="form-group">
					<input required readonly type="text" name="nic" id="nic" tabindex="1" class="form-control" placeholder="ජාතික හැදුනුම්පත් අංකය" value="">
				</div>
				<div class="form-group">
					<input required readonly type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="ඊමේල් ලිපිනය" value="">
				</div>
				<div class="form-group">
					<input required readonly type="text" name="mobile" id="mobile" tabindex="1" class="form-control" placeholder="දුරකථන අංකය" value="">
				</div>
				<div class="form-group">
					<input type="text" name="location" id="location" tabindex="2" class="form-control hidden" placeholder="ස්ථානය" value="Colombo, Sri Lanka">
				</div>
				<div class="form-group text-left">
					<button type="button" id="btn_editform" tabindex="4" class="btn btn-green">වෙනස් කරන්න</button>
					<button type="button" name="save-submit" id="btn_saveform" tabindex="5" class="btn btn-green hidden" value="save-submit">ඇතුලත් කරන්න</button>
					<button type="button" id="back" tabindex="4" class="btn btn-secondary hidden mt-1">අවලංගු කරන්න</button>
				</div>
			</form>
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

<!-- Footer -->
<footer>
<?php require_once 'layout/footer.php'; ?>
</footer>
<script>
	var lat11="6.927079";
	var long11="79.861244";
	var searchInput = 'location';
	var stat="";

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
	
	var heroReference=firebase.database().ref().child("users");
		heroReference.on("value",function(snapshot){
		snapshot.forEach(function(childsnapshot){
			var person=childsnapshot.val();
			if(currentUser.email==null){
				cumobile=currentUser.phoneNumber;
				if(cumobile==person.mobile){
					$("#name").val(person.username);
					$("#nic").val(person.nic);
					$("#email").val(person.email);
					$("#mobile").val(person.mobile);
					lat11=person.lat;
					long11=person.long;
					stat=person.status;
				}
			}
		});
	});

	firebase.auth().onAuthStateChanged(function(user) {
		if (user) {
			currentUser=user;
			var mobile = user.phoneNumber;
		} else {
			window.location.href="index.php";
		}
	});
	$("#btn_editform").click(function()
  	{
		$("#name").removeAttr('readonly');

	});
	$("#back").click(function()
  	{
		window.location.href="user_profile.php";
	});  
	$("#btn_saveform").click(function()
  	{
		var detail ={
				email:$("#email").val(),
				mobile:$("#mobile").val(),
				nic:$("#nic").val(),
				username:$("#name").val(),
				lat:lat11,
				long:long11,
				status:stat
			}
  			addDetail(detail);
	});
	function addDetail(d){
		if( d.nic==""){
			window.alert("ජාතික හැදුනුම්පත් අංකය ඇතුලත් කරන්න")
		}else{
			firebase.database().ref('users/' + d.nic).set(d);
			$("#name").attr('readonly','readonly');
			$("#mobile").attr('readonly','readonly');
			$("#nic").attr('readonly','readonly');
			$("#email").attr('readonly','readonly');
			window.location.href="user_profile.php";
		}
	}
</script>
</body>
</html>
