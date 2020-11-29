<?php

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>My Events - DigitalCovid19</title>
  <meta name="description" content="My Events - DigitalCovid19">
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
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyBtu-gWA2AQO5HqQUAcsEQzZUOsKiSSIAI"></script>

  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script type="text/javascript" src="js/main.js"></script>

  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-database.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-storage.js"></script>
  <!-- Load jQuery, jQuery UI and jQuery ui styles from jQuery website -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
</head>

<body>
<?php require_once 'layout/head.php'; ?>
<!-- Load jQuery because we need overide firebase jquery -->
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<div class="container-fluid mt-5 pt-5 pb-5">
	<div class="row pt-4">
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
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 fnt-gray pl-2 pr-2">
			<h2 class="fnt-green pl-1">Attending an Event</h2>
			<div class="loginbox pl-4 pr-4 pt-2">
				<form >
				<div class="form-group">
					<input required type="text" onchange="fillLocation(this.value)" name="eventName" id="eventName" class="form-control eventName" placeholder="Event Name">
				</div>
				<div class="form-group">
					<input required type="text" name="location" id="location" class="form-control" placeholder="Location Name">
				</div>
				<div class="form-group">
					<label class="pl-2">Date</label>
					<input required type="date" id="eDate" name="eDate" max="3000-12-31" min="1000-01-01" class="form-control">
				</div>
				<div class="form-group text-left">
					<button type="button" name="save-submit" id="btn_saveform" class="btn btn-green" value="save-submit">Add Event</button>
				</div>
			</form>
			</div><br>
			<h2 class="fnt-green pl-1">My Events</h2><br>
			<div id="showEvent" class="container-fluid text-center">
				
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
<script type="text/javascript">
	var nic="";
	var uid="";
	var lat11="6.927079";
	var long11="79.861244";
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
	firebase.auth().onAuthStateChanged(function(user) {
		if (user) {
			currentUser=user;
			var mobile = user.phoneNumber;
		} else {
			window.location.href="index.php";
		}
	});
	var userReference=firebase.database().ref().child("users");
	userReference.on("value",function(snapshot){
		snapshot.forEach(function(childsnapshot){
			var person=childsnapshot.val();
			if(currentUser.email==null){
				cumobile=currentUser.phoneNumber;
				if(cumobile==person.mobile){
					nic =person.nic;
				}
			}
		});
	});
	$("#btn_saveform").click(function(){
		if($('#eDate').val()=="" ||$("#eventName").val()=="" ||$("#location").val()=="" ){
			window.alert("please fill out all Form field")
		}else{
			var event ={
				date:$('#eDate').val(),
				lat:lat11,
				long:long11,
				name:$("#eventName").val(),
				place:$("#location").val()
			}
			addEvent(event);
		}
		window.location.href="user_events.php";
	});
	function addEvent(e){
		if(e.name==""){
			window.alert("Event are not updated please try Again")
		}else{
			firebase.database().ref('events/' + e.name).set(e);
			firebase.database().ref('eventWiseUsers/' + e.name+"/"+currentUser.uid).set(nic);
			firebase.database().ref('userWiseEvents/' + nic+"/"+currentUser.uid+Date.now()+"/").set(e.name);
			firebase.database().ref('userWiseDates/' + nic+"/"+currentUser.uid+Date.now()+"/").set(e.date);
			window.alert("Events are Updated")
		}

	}
	var arr=Array();
    var num="0"
	var userReference=firebase.database().ref().child("userWiseEvents");
	userReference.on("value",function(snapshot){
		snapshot.forEach(function(childsnapshot){
			var person=childsnapshot.val();
			if(nic==childsnapshot.key){
                num=childsnapshot.numChildren();
                childsnapshot.forEach(function(cc){
                    arr.push(cc.val());
                });
			}
		});
	});
	var heroHTMLItems="";
	setTimeout(
	function(){
		arr.forEach(function(item){
			var EventsReference=firebase.database().ref().child("events");
			EventsReference.on("value",function(snapshot){
				$("#showEvent").empty();
				var mess=0;
				snapshot.forEach(function(childsnapshot){
					var events=childsnapshot.val();
					if(events.name==item){
						heroHTMLItems+="<div class='addedItems shadow-sm p-3 text-center'><p class='fnt-green'><i class='fas fa-calendar-alt'></i></p><p><small>"+events.date+"</small><br>"+events.place+"<br>"+events.name+"<br></p></div>";
						mess=1;
					}
				});
				if(mess==0){
					heroHTMLItems+="<p align='center'>No Event Found ,Please Update</p><br><br>";
				}
			});
		});
		
	}
	, 3000 );
	setTimeout(
		function(){
			$("#showEvent").html(heroHTMLItems);
		}
	, 5000 );


</script>
<script type="text/javascript">
	//autocomplete events name part
	var eventByloc=[];
	var eventPlaces=[];
	var userReference=firebase.database().ref().child("events");
	userReference.on("value",function(snapshot){
		snapshot.forEach(function(childsnapshot){
			var events=childsnapshot.val();
	        eventByloc.push(events.name);
		});
	});
</script>
<script>
$(document).ready(
	function () {
	 $("#eventName").autocomplete({
	 source: eventByloc,
	 autoFocus: true,
	});
});
</script>
<script>
function fillLocation(val) {
  var userReference=firebase.database().ref().child("events");
	userReference.on("value",function(snapshot){
		snapshot.forEach(function(childsnapshot){
			var person=childsnapshot.val();
			if(val==childsnapshot.key){
                num=childsnapshot.numChildren();
                var events=childsnapshot.val();
                document.getElementById('location').value=events.place;
                var eDate=events.date;
                document.getElementById('eDate').value=eDate.toString();
			}
		});
	});
}
</script>


</body>
</html>
