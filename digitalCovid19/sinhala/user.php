<?php

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>DigitalCovid19 - ගිණුම</title>
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
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-3">
			<h2 class="fnt-green text-center">ඔබගේ වර්තමාන තත්වය</h2>
			<div id="showActivity" class="pt-1 pb-4 text-center">
				
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 pr-4">
			<div id="myMap"></div>
			<div id="showEvent" class="container-fluid">
				
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
	var status="";
    var nic="";
    var lat="6.927079";
	var long="79.861244";
	var data=Array()
	firebase.auth().onAuthStateChanged(function(user) {
		if (user) {
			currentUser=user;
			var mobile = user.phoneNumber;
		} else {
			window.location.href="index.php";
		}
	});
	var infected=Array();
	var possible=Array();
	var possible2=Array();
	var userReference=firebase.database().ref().child("users");
	userReference.on("value",function(snapshot){
		snapshot.forEach(function(childsnapshot){
			var person=childsnapshot.val();
			if(currentUser.email==null){
				cumobile=currentUser.phoneNumber;
				if(cumobile==person.mobile){
					nic =person.nic;
					status =person.status;
					var a=[];
					a.push("yello");
					a.push(person.lat);
					a.push(person.long);
					data.push(a);
				}
			}
			
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
	
	
	var arr2=[];
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
				arr2.push(a);
			});
		});
	});
	var arr1=Array();
	var userReference=firebase.database().ref().child("userWiseEvents");
	userReference.on("value",function(snapshot){
		snapshot.forEach(function(childsnapshot){
			var person=childsnapshot.val();
			if(nic==childsnapshot.key){
				childsnapshot.forEach(function(cc){
					arr1.push(cc.val());
				});
			}
		});
	});
	var eventByloc=[];
	var userReference=firebase.database().ref().child("events");
	userReference.on("value",function(snapshot){
		snapshot.forEach(function(childsnapshot){
			var person=childsnapshot.val();
			var a=[];
			a.push(person.name);
			a.push(person.lat);
			a.push(person.long);
			a.push(person.date);
			a.push(person.place);
			eventByloc.push(a);
		});
	});
	
	var HTMLItems="";
	setTimeout(
	function getLocation(){
		if(status=="undefined" || status==""  || status=="safe" ){ //yello
			HTMLItems+="<div class='notif-yellow shadow-sm p-3 text-center'><p>";
			HTMLItems+="<span class='fnt-yellow h2'><i class='fas fa-heartbeat'></i></span><br>";
			HTMLItems+="ඔබ ආරක්ෂිතයි.<br>කරුණාකර නිවසේම රැඳී සිටින්න<br></p></div>";
		}else if(status=="possible"){
			var c=0; //yeelow
			HTMLItems+="<div  class='notif-yellow shadow-sm p-3 text-center'><p>";
			HTMLItems+="<span class='fnt-yellow h2'><i class='fas fa-heartbeat'></i></span><br>";
			HTMLItems+="ඔබට දෙවැනි මට්ටමේ අවදානමක් ඇත.<br>වහාම වෛද්‍ය උපදෙස් ලබාගන්න<br></p></div>";
			for (var j = 0; j <arr1.length; j++) {
				loop:
				for (var r = 0; r <eventByloc.length; r++) { 
					if(eventByloc[r][0]==arr1[j]){
						for (var k = 0; k <arr2.length; k++) { 
							if(arr1[j]==arr2[k][0]){
								for (var i = 0; i <infected.length; i++) { 
									for (var s = 1; s <arr2[k].length; s++) { 
										if(arr2[k][s]==infected[i][0]){
                							var a=[];
                							a.push("red");
								            a.push(eventByloc[r][1]);
								            a.push(eventByloc[r][2]);
								            data.push(a); //redd
											HTMLItems+="<div  class='notif-red shadow-sm p-3 text-center'><p>";
											HTMLItems+="<span class='fnt-red h2'><i class='fas fa-heartbeat'></i></span><br>";
											HTMLItems+="අවසාන මට්ටම(රෝගය පැතිරීම )<br>";
											HTMLItems+="දිනය: <small>"+eventByloc[r][3]+"</small><br>";
											HTMLItems+="රෝග වාහකයා: <small>"+infected[i][1]+"</small><br>";
											HTMLItems+="ස්ථානය: <small>("+eventByloc[r][4]+")</small><br> "+eventByloc[r][0]+"<br>";
											HTMLItems+="</p></div>";
											c=1;
											break loop;
                						}
                					}
                				}
                			}
                		}
                	}
	            }
			}
			if(c==0){//red
				HTMLItems+="<div  class='notif-red shadow-sm p-3 text-center'><p>";
				HTMLItems+="<span class='fnt-red h2'><i class='fas fa-heartbeat'></i></span><br>";
				HTMLItems+=" අවදානම්සහගත සහභාගීවීම් දැනට දක්නට නැත<br>";
				HTMLItems+="</p></div>";
			}
		}else if(status=="possible2"){
			var c=0;
			var d=0; //yello
			HTMLItems+="<div  class='notif-yellow shadow-sm p-3 text-center'><p>";
			HTMLItems+="<span class='fnt-yellow h2'><i class='fas fa-heartbeat'></i></span><br>";
			HTMLItems+="ඔබට පළමු මට්ටමේ අවදානමක් ඇත.<br>වහාම වෛද්‍ය උපදෙස් ලබාගන්න<br></p></div>";
			
			for (var j = 0; j <arr1.length; j++) {
				loop1:
				for (var r = 0; r <eventByloc.length; r++) { 
					if(eventByloc[r][0]==arr1[j]){
						for (var k = 0; k <arr2.length; k++) { 
							if(arr1[j]==arr2[k][0]){
								for (var i = 0; i <possible.length; i++) { 
									for (var s = 1; s <arr2[k].length; s++) { 
										if(arr2[k][s]==possible[i][0]){
                							var a=[];
                							a.push("orange");
								            a.push(eventByloc[r][1]);
								            a.push(eventByloc[r][2]);
								            data.push(a); //orange
											HTMLItems+="<div  class='notif-orange shadow-sm p-3 text-center'><p>";
											HTMLItems+="<span class='fnt-orange h2'><i class='fas fa-heartbeat'></i></span><br>";
											HTMLItems+="මීළඟ මට්ටම<br>";
											HTMLItems+="දිනය: <small>"+eventByloc[r][3]+"</small><br>";
											HTMLItems+="රෝග වාහකයා: <small>"+possible[i][1]+"</small><br>";
											HTMLItems+="ස්ථානය: <small>("+eventByloc[r][4]+")</small><br> "+eventByloc[r][0]+"<br>";
											HTMLItems+="</p></div>";
								            arr1=[];
	                    					var userReference=firebase.database().ref().child("userWiseEvents");
											userReference.on("value",function(snapshot){
												snapshot.forEach(function(childsnapshot){
													var person=childsnapshot.val();
													if(possible[i][0]==childsnapshot.key){
										                childsnapshot.forEach(function(cc){
										                    arr1.push(cc.val());
										                });
													}
												});
											});
								            for (var j = 0; j <arr1.length; j++) {
												loop2:
												for (var r = 0; r <eventByloc.length; r++) { 
													if(eventByloc[r][0]==arr1[j]){
														for (var k = 0; k <arr2.length; k++) { 
															if(arr1[j]==arr2[k][0]){
																for (var i = 0; i <infected.length; i++) { 
																	for (var s = 1; s <arr2[k].length; s++) { 
																		if(arr2[k][s]==infected[i][0]){
								                							var a=[];
								                							a.push("red");
																            a.push(eventByloc[r][1]);
																            a.push(eventByloc[r][2]);
																            data.push(a); //red
																			HTMLItems+="<div  class='notif-red shadow-sm p-3 text-center'><p>";
																			HTMLItems+="<span class='fnt-red h2'><i class='fas fa-heartbeat'></i></span><br>";
																			HTMLItems+="අවසාන මට්ටම(රෝගය පැතිරීම )<br>";
																			HTMLItems+="දිනය: <small>"+eventByloc[r][3]+"</small><br>";
																			HTMLItems+="රෝග වාහකයා: <small>"+infected[i][1]+"</small><br>";
																			HTMLItems+="ස්ථානය: <small>("+eventByloc[r][4]+")</small><br> "+eventByloc[r][0]+"<br>";
																			HTMLItems+="</p></div>";
																			d=1;
																			break loop2;
																        }
																    }
																}
												
															}
														}
													}
												}
											}
											if(d==0){ //red
												HTMLItems+="<div  class='notif-red shadow-sm p-3 text-center'><p>";
												HTMLItems+="<span class='fnt-red h2'><i class='fas fa-heartbeat'></i></span><br>";
												HTMLItems+=" අවසාන මට්ටම(රෝගය පැතිරීම )<br>";
												HTMLItems+=" අවදානම්සහගත සහභාගීවීම් දැනට දක්නට නැත<br>";
												HTMLItems+="</p></div>";
											}
		                    				c=1;
											break loop1;
                						}
                					}
                				}
                			}
                		}
                	}
	            }
			}	
			if(c==0){ //orng
				HTMLItems+="<div  class='notif-orange shadow-sm p-3 text-center'><p>";
				HTMLItems+="<span class='fnt-orange h2'><i class='fas fa-heartbeat'></i></span><br>";
				HTMLItems+="මීළඟ මට්ටම<br>";
				HTMLItems+=" අවදානම්සහගත සහභාගීවීම් දැනට දක්නට නැත<br>";
				HTMLItems+="</p></div>";
			}
		}else if(status=="infected"){ //red
			HTMLItems+="<div  class='notif-red shadow-sm p-3 text-center'><p>";
			HTMLItems+="<span class='fnt-red h2'><i class='fas fa-heartbeat'></i></span><br>";
			HTMLItems+="ඔබ මෙම රෝගී තත්වයෙන් පෙළෙන්නෙකි.<br></p></div>";
		}
	}, 5000 );


	var map;
	var marker;
	var myLatlng1 = new google.maps.LatLng(7.927079,79.961244);
	var myLatlng2 = new google.maps.LatLng(6.427079,79.961244);
	var myLatlng3 = new google.maps.LatLng(6.927079,79.961244);
	var geocoder = new google.maps.Geocoder();
	var infowindow = new google.maps.InfoWindow();
	var clat;
	var clng;

	var orangeMarker = new google.maps.MarkerImage("http://www.googlemapsmarkers.com/v1/ffbf00/");
	var redMarker = new google.maps.MarkerImage("http://www.googlemapsmarkers.com/v1/ff0000/");
	var yelloMarker = new google.maps.MarkerImage("http://www.googlemapsmarkers.com/v1/F5EC42/");

	setTimeout(
	function initialize(){
		
	  var mapOptions = {
	    zoom: 9,
	    center: myLatlng2,
	    mapTypeId: 'roadmap'
	  };
	  map = new google.maps.Map(document.getElementById("myMap"), mapOptions);
	  var cicon;
	  for (i = 0; i < data.length; i++) {
	    if(data[i][0]=="red"){
	      cicon=redMarker;
	    }
	    else if(data[i][0]=="yello"){
	      cicon=yelloMarker;
	    }
	    else{
	      cicon=orangeMarker;
	    }
	    marker = new google.maps.Marker({
	      position: new google.maps.LatLng(data[i][1], data[i][2]),
	      map: map,
	      icon:cicon
	    });
	  }
	}, 5500 );
	setTimeout(
	function(){
		$("#showActivity").html(HTMLItems);
	}
	, 5550 );
	google.maps.event.addDomListener(window, 'load', initialize);
	firebase.auth().onAuthStateChanged(function(user) {
		  if (user) {
		    var email = user.email;
		    currentUser=user;
		  } else {
			window.location.href="index.php";
		  }
	});
</script>
</body>
</html>
