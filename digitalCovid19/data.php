<?php

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>My Account - DigitalCovid19</title>
  <meta name="description" content="My Account - DigitalCovid19">
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
<?php require_once 'layout/head.php'; ?>
<div class="container-fluid mt-5 pt-5 pb-5">
	<div class="row pt-4 pr-0">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 pl-4 pr-4 pb-4">
			<div class="shadow-sm border userbox">
				<a class="fnt-green" href="user.php"><i class="fas fa-bell"></i> Dashboard</a><br>
				<hr>
				<a class="fnt-green" href="data.php"><i class="fas fa-poll"></i> Statistics</a><br>
				<hr>
				<a class="fnt-green" href="user_profile.php"><i class="fas fa-user"></i> Profile</a><br>
				<hr>
				<a class="fnt-green" href="user_symptoms.php"><i class="fas fa-heartbeat"></i> My Symptoms</a><br>
				<hr>
				<a class="fnt-green" href="user_events.php"><i class="fas fa-calendar-alt"></i> My Events</a><br>
				<hr>
				<a class="fnt-green" href="getMedicalAdvice.php"><i class="fas fa-comments"></i> Seeking Medical Advice</a><br>
			</div>
		</div>
		
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 text-center">
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

<!-- Footer -->
<footer>
<?php require_once 'layout/footer.php'; ?>
</footer>
<script>
	
	firebase.auth().onAuthStateChanged(function(user) {
		  if (user) {
		    currentUser=user;
		  } else {
			window.location.href="index.php";
		  }
	});
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
</body>
</html>
