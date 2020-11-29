<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>Admin Account - DigitalCovid19</title>
  <meta name="description" content="My Account - DigitalCovid19">
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
<?php require_once '../layout/head.php'; ?>
<div class="container-fluid mt-5 pt-5 pb-5">
	<div class="row pt-4 pr-0">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 pl-4 pr-4 pb-4">
			<div class="shadow-sm border userbox">
				<a class="fnt-green" href="user.php"><i class="fas fa-poll"></i> Dashboard</a><br>
				<hr>
				<a class="fnt-green" href="user_profile.php"><i class="fas fa-user"></i> My Profile</a><br>
				<hr>
				<a class="fnt-green" href="messages.php"><i class="fas fa-list"></i> Messages</a><br>

			</div>
		</div>
		
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 pr-4">
			<div id="myMap"></div>
			<div id="showEvent" class="container-fluid">
				
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
	class TreeNode {
		constructor(nic,lat,long,name,mobile) {
			this.nic = nic;
			this.lat = lat;
			this.long = long;
			this.name=name;
			this.mobile=mobile;
			this.node = [];
		}
	}

    var status="";
    var nic="";
    var lat="6.927079";
	var long="79.861244";
	firebase.auth().onAuthStateChanged(function(user) {
		if (user) {
			currentUser=user;
			var mobile = user.phoneNumber;
		} else {
			window.location.href="../index.php";
		}
	});
	var infected=Array();
	var possible=Array();
	var possible2=Array();

	var userReference=firebase.database().ref().child("admin");
	userReference.on("value",function(snapshot){
		var x=false;
		snapshot.forEach(function(childsnapshot){
			var person=childsnapshot.val();
			if(currentUser.email==null){
				cumobile=currentUser.phoneNumber;
				if(cumobile==person.mobile){
					if(person.type=="doctor"){
						
					}else if(person.type=="admin"){
						window.location.href="../admin/user.php";
					}else if(person.type=="isp"){
						window.location.href="../isp/user.php";
					}else{
						firebase.auth().signOut();
					}
					x=true;
				}
			}
		});
		if(x==false){
			firebase.auth().signOut();
		}
	});
	var userReference=firebase.database().ref().child("users");
	userReference.on("value",function(snapshot){
		snapshot.forEach(function(childsnapshot){
			var person=childsnapshot.val();
			if(person.status=="infected"){
				var b=[];
				b.push(person.nic);
				b.push(person.username);
				infected.push(b);
			}else if(person.status=="possible"){
				var b=[];
				b.push(person.nic);
				b.push(person.username);
				possible.push(b);
			}else if(person.status=="possible2"){
				var b=[];
				b.push(person.nic);
				b.push(person.username);
				possible2.push(b);
			}
		});
	});
	var userWiseEvents=Array();
	var userReference=firebase.database().ref().child("userWiseEvents");
	userReference.on("value",function(snapshot){
		snapshot.forEach(function(childsnapshot){
			var person=childsnapshot.val();
			var b=[];
			b.push(childsnapshot.key);
			childsnapshot.forEach(function(cc){
				b.push(cc.val());
			});
			userWiseEvents.push(b);
		});
	});
	var eventWiseUsers=[];
	var userReference=firebase.database().ref().child("eventWiseUsers");
	userReference.on("value",function(snapshot){
		snapshot.forEach(function(childsnapshot){
			var person=childsnapshot.val();
			childsnapshot.forEach(function(cc){
				var a=[];
				a.push(childsnapshot.key);
				childsnapshot.forEach(function(cc){
					a.push(cc.val());
				});
				eventWiseUsers.push(a);
			});
		});
	});
	
	var usertByloc=[];
	var userReference=firebase.database().ref().child("users");
	userReference.on("value",function(snapshot){
		snapshot.forEach(function(childsnapshot){
			var person=childsnapshot.val();
			var a=[];
			a.push(person.nic);
			a.push(person.lat);
			a.push(person.long);
			a.push(person.username);
			a.push(person.mobile);
			usertByloc.push(a);
		});
	});

	var data=Array();
	
	setTimeout(	
	function gohead(){	
		for (var i = 0; i <infected.length; i++) { 
			for (var q = 0; q <usertByloc.length; q++) { 
				if(usertByloc[q][0]==infected[i][0]){
					data[i] =new TreeNode(infected[i][0],usertByloc[q][1],usertByloc[q][2],usertByloc[q][3],usertByloc[q][4]); 
				}
			}
		}
		for (var i = 0; i <infected.length; i++) { 
			var p=0;
			for (var j = 0; j <userWiseEvents.length; j++) {
				if(userWiseEvents[j][0]==infected[i][0]){
					for (var s = 1; s <userWiseEvents[j].length; s++) { 
						for (var k = 0; k <eventWiseUsers.length; k++) { 
							if(userWiseEvents[j][s]==eventWiseUsers[k][0]){
								for (var r = 1; r <eventWiseUsers[k].length; r++) { 
									if(eventWiseUsers[k][r]!=infected[i][0]){
										for(var ii = 0; ii < usertByloc.length; ii++) {
											if(usertByloc[ii][0] ==infected[i][0]) {
												usertByloc[ii][0]=0;
											}
										}
										for (var q = 0; q <usertByloc.length; q++) { 
											if(usertByloc[q][0]==eventWiseUsers[k][r]){
												data[i].node[p]=new TreeNode(eventWiseUsers[k][r],usertByloc[q][1],usertByloc[q][2],usertByloc[q][3],usertByloc[q][4]);
												var p1=0;
												for (var j1 = 0; j1 <userWiseEvents.length; j1++) {
													if(userWiseEvents[j1][0]==eventWiseUsers[k][r]){
														for (var s1 = 1; s1 <userWiseEvents[j1].length; s1++) { 
															for (var k1 = 0; k1 <eventWiseUsers.length; k1++) { 
																if(userWiseEvents[j1][s1]==eventWiseUsers[k1][0]){
																	for (var r1 = 1; r1 <eventWiseUsers[k1].length; r1++) { 
																		if(eventWiseUsers[k1][r1]!=eventWiseUsers[k][r]){
																			for (var q1 = 0; q1 <usertByloc.length; q1++) { 
																				if(usertByloc[q1][0]==eventWiseUsers[k1][r1]){
																					data[i].node[p].node[p1]=new TreeNode(eventWiseUsers[k1][r1],usertByloc[q1][1],usertByloc[q1][2],usertByloc[q1][3],usertByloc[q1][4]);
																					p1=p1+1;
																				}
																			}
																		}
																	}	
																	break;
																}
															}
														}
													}
												}
												p=p+1;
											}
										}
									}
								}	
								break;
							}
						}
					}
				}
			}
		}
	}
	, 3000 );

	var map;
	var marker;
	var allMarkers = [];
	var myLatlng1 = new google.maps.LatLng(6.927079,79.961244);
	var myLatlng2 = new google.maps.LatLng(6.827079,79.961244);
	var myLatlng3 = new google.maps.LatLng(6.727079,79.961244);
	var geocoder = new google.maps.Geocoder();
	var infowindow = new google.maps.InfoWindow();
	var clat;
	var clng;
	/*not need to call set all values to ths array the automaticaly take all now*/
	var arr=[["red",6.927079,79.961244],["orange",6.827079,80.961244],["yello",6.727079,79.961244]];
	var orangeMarker = new google.maps.MarkerImage("http://www.googlemapsmarkers.com/v1/ffbf00/");
	var redMarker = new google.maps.MarkerImage("http://www.googlemapsmarkers.com/v1/ff0000/");
	var yelloMarker = new google.maps.MarkerImage("http://www.googlemapsmarkers.com/v1/F5EC42/");
	var greenMarker = new google.maps.MarkerImage("http://www.googlemapsmarkers.com/v1/07FC13/");
	var coords = [];
	
	setTimeout(
	function initialize(){
		var check=false;
		var mapOptions = {
			zoom: 9,
			center: myLatlng2,
			mapTypeId: 'roadmap'
		};
		map = new google.maps.Map(document.getElementById("myMap"), mapOptions);
		var cicon;

		for (var k = 0; k < data.length; k++) {
		//alert(parseFloat(data[k].lat), parseFloat(data[k].long));
		var positionI=new google.maps.LatLng(parseFloat(data[k].lat), parseFloat(data[k].long));
		marker = new google.maps.Marker({
		position: positionI,
		map: map,
		icon:redMarker
		});
		//coords.push(positionI);
		allMarkers.push(marker);

		var infowindow=new google.maps.InfoWindow({
				content:"Name:"+data[k].name+"<br>NIC:"+data[k].nic+"<br>Ph.No:"+data[k].mobile
		});

        infowindow.open(map,marker);
		for (var j = 0; j < data[k].node.length; j++) {
			//alert(data[k].node[j].nic);
			var positionp1=new google.maps.LatLng(parseFloat(data[k].node[j].lat), parseFloat(data[k].node[j].long));
			marker = new google.maps.Marker({
			position: positionp1,
			map: map,
			icon:orangeMarker
			});
			var infowindow=new google.maps.InfoWindow({
            	content:"Name:"+data[k].node[j].name+"<br>NIC:"+data[k].node[j].nic+"<br>Ph.No:"+data[k].node[j].mobile
			});

			infowindow.open(map,marker);
			allMarkers.push(marker);
			coords.push(positionI);
			coords.push(positionp1);
			var line= new google.maps.Polyline({
				path: coords,
				geodesic: true,
				strokeColor: '#0000FF',
				strokeOpacity: 1.0,
				strokeWeight: 2
			});

			line.setMap(map);
			coords=[];

			for (var i = 0; i < data[k].node[j].node.length; i++) {
				//alert(data[k].node[j].node[i].nic);
				var positionp2=new google.maps.LatLng(parseFloat(data[k].node[j].node[i].lat), parseFloat(data[k].node[j].node[i].long));
				marker = new google.maps.Marker({
				position: positionp2,
				map: map,
				icon:yelloMarker
			});
			var infowindow=new google.maps.InfoWindow({
                content:"Name:"+data[k].node[j].node[i].name+"<br>NIC:"+data[k].node[j].node[i].nic+"<br>Ph.No:"+data[k].node[j].node[i].mobile
              });

			infowindow.open(map,marker);
			allMarkers.push(marker);
			coords.push(positionp1);
			coords.push(positionp2);

			var line= new google.maps.Polyline({
				path: coords,
				geodesic: true,
				strokeColor: '#0000FF',
				strokeOpacity: 1.0,
				strokeWeight: 2
			});

			line.setMap(map);
			coords=[];

			}
		}
		}
		setTimeout(
			function(){
				for (var k = 0; k < data.length; k++) {
					for (var j = 0; j < data[k].node.length; j++) {
						var positionp1=new google.maps.LatLng(parseFloat(data[k].node[j].lat), parseFloat(data[k].node[j].long));
						marker = new google.maps.Marker({
						position: positionp1,
						map: map,
						icon:orangeMarker
						});
					}
				}
			}
		, 7000 );
	}
	, 3100 );
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
</body>
</html>
