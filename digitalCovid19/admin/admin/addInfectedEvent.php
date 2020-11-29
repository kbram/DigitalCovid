<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>My Profile - DigitalCovid19</title>
  <meta name="description" content="My Profile - DigitalCovid19">
  <meta name="keywords" content="">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:url" content=" "/>
  <meta property="og:type" content="website" />
  <meta property="og:title" content=""/>
  <meta property="og:description" content="" />
  <meta property="og:image" content="../img/logo.jpg" />
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <script type="text/javascript" src="../js/main.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-database.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-storage.js"></script>
  <!-- Load jQuery, jQuery UI and jQuery ui styles from jQuery website -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtu-gWA2AQO5HqQUAcsEQzZUOsKiSSIAI&libraries=places&callback=initMap">
</script>
</head>

<body>
<!-- Load jQuery because we need overide firebase jquery -->
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<?php require_once '../layout/head.php'; ?>
<div class="container-fluid mt-5 pt-5 pb-5">
	<div class="row pt-4">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 pl-4 pr-4 pb-4">
			<div class="shadow-sm border userbox">
				<a class="fnt-green" href="user.php"><i class="fas fa-poll"></i> Dashboard</a><br>
				<hr>
				<a class="fnt-green" href="user_profile.php"><i class="fas fa-user"></i> My Profile</a><br>
				<hr>
				<a class="fnt-green" href="infected.php"><i class="fas fa-list"></i> Infected List</a><br>
				<hr>
				<a class="fnt-green" href="addInfected.php"><i class="fas fa-list-alt"></i> Add Infected User</a><br>
				<hr>
				<a class="fnt-green" href="addInfectedEvent.php"><i class="fas fa-box"></i> Add Infected Event</a><br>
				<hr>
				<a class="fnt-green" href="userRoles.php"><i class="fas fa-box"></i> User Roles</a><br>

			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 pl-2 pr-2">
			<h2 class="fnt-green pl-1">Add a Infected Event</h2>
			<div class="loginbox pl-4 pr-4 pt-2">
			<form>
				<div class="form-group">
					<input required type="text" name="nic" id="nic" class="form-control userName" placeholder="NIC Number">
				</div>
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
			<a href=""><img src="../img/playstore.png" alt="playstore" class="img-fluid"></a>
			
		</div>
		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-3">
			<a href=""><img src="../img/appstore.png" alt="appstore" class="img-fluid"></a>
		</div>
	</div>
</div>

<!-- Footer -->
<footer>
<?php require_once '../layout/footer.php'; ?>
</footer>
<script>
	var userNicArra=[];//use this for auto complete for (already registered nic)
	var userReference=firebase.database().ref().child("users");
	userReference.on("value",function(snapshot){
		snapshot.forEach(function(childsnapshot){
			var person=childsnapshot.val();
			if(person.status=="infected"){
				userNicArra.push(person.nic);
			}
		});
	});
	
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
	
//autocomplete NIC PART

$(document).ready(
	function () {
	 $("#nic").autocomplete({
	 source: userNicArra,
	 autoFocus: true,
	});
});
$("#btn_saveform").click(function(){
		var nic=$('#nic').val();
		var x=false;
		for (var i = 0; i <userNicArra.length; i++) { 
			if(userNicArra[i]==nic){
				if($('#nic').val()==""|| $('#eDate').val()=="" ||$("#eventName").val()=="" ||$("#location").val()=="" ){
					window.alert("please fill out all Form field")
				}else if(!ValidateNIC(nic)){
					window.alert("Please Enter NIC like \"123456789V!\"(9 letters) or \"123456789123\"(12 letters)")
				}else{
					var event ={
						date:$('#eDate').val(),
						lat:lat11,
						long:long11,
						name:$("#eventName").val(),
						place:$("#location").val()
					}
					addEvent(event,nic);
				}
				window.location.href="addInfectedEvent.php";
				x=true;
			}
		}
		if(x==false){
			window.alert("This nic is not registered go to (Add Infected User) Menu")
		}
});
function addEvent(e,nic){
	if(e.name==""){
		window.alert("Event are not updated please try Again")
	}else{
		firebase.database().ref('events/' + e.name).set(e);
		firebase.database().ref('eventWiseUsers/' + e.name+"/"+Date.now()).set(nic);
		firebase.database().ref('userWiseEvents/' + nic+"/"+Date.now()+"/").set(e.name);
		firebase.database().ref('userWiseDates/' + nic+"/"+Date.now()+"/").set(e.date);
		firebase.database().ref('infectedEvents/' +Date.now()+"/"+e.name).set(nic);
		window.alert("Infected Events are Updated")
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
</script>
<script type="text/javascript">
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
//autocomplete event names part
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
var x=false;
var userReference=firebase.database().ref().child("admin");
	userReference.on("value",function(snapshot){
		snapshot.forEach(function(childsnapshot){
			var person=childsnapshot.val();
			if(currentUser.email==null){
				cumobile=currentUser.phoneNumber;
				if(cumobile==person.mobile){
					if(person.type=="admin"){
						x=true;
					}
				}
			}
		});
		if(x==false){
			firebase.auth().signOut();
		}
	});
firebase.auth().onAuthStateChanged(function(user) {
		if (user) {
			currentUser=user;
			var mobile = user.phoneNumber;
		} else {
			window.location.href="../index.php";
		}
	});

</script>
<!-- Load jQuery because we need overide firebase jquery -->
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

</body>
</html>
