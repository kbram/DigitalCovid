<?php

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>Get medical advice - DigitalCovid19</title>
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
<style type="text/css">
			.chatDoctor{
				text-align: center;
				padding: 10px;
				border: 2px solid #4cad5c;
				border-radius: 20px;
				margin: 5px 5px;
				background-color: #fff;
				color: #444;
				max-width: 400px;
				display: inline-block;
			}
			.chatDoctor:hover{
				border: 2px solid #444;
				background-color: #eee;
			}
			.chatDark{
				border: 2px solid #444;
				background-color: #eee;
			}
			.left-msg{
				margin: 5px;
				text-align: left;
				word-wrap: break-word;
				border-bottom-left-radius: 25px;
				border-top-right-radius: 25px;
				background-color: LightSkyBlue;
				padding:10px;
				width: 51%;
				float: left;
			}
			.right-msg{
				margin: 5px;
				text-align: right; 
				word-wrap: break-word;
				border-bottom-right-radius: 25px;
				border-top-left-radius: 25px;
				background-color:LightPink ;
				padding:10px;
				width: 51%;
				float: right;
			}
		</style>
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
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 pl-1 pr-1">
			<h2 class="fnt-green">සම්බන්ධ කරගත හැකි වෛද්‍යවරුන්</h2><br>
			<span class="chatDark" id="emptyId" hidden="hidden"></span>
			<div id="show-symptoms">

			</div>
			<div class="border rounded-lg mt-5 mb-3 p-5" style="max-height: 500px;overflow-y:scroll;">
				<div class="container" id="show-messages">
					
				</div>
			</div>
			<div class="border rounded-lg mt-1 mb-2 p-5 pb-3" style="padding-bottom: 10px;">
				<div class="pb-2">
					<textarea class="form-control" id="message" style="width:100%"></textarea>
					<button class="btn btn-green mt-1 mb-3" id="send" style="float:right;"><i class='fas fa-send'></i>&nbsp;Send</button>
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

<!-- Footer -->
<footer>
<?php require_once 'layout/footer.php'; ?>
</footer>
<script>
	var lat11="6.927079";
	var long11="79.861244";
	var nic="";
	var currentElement=document.getElementById('emptyId');

	
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
					nic=person.nic;
					lat11 =person.lat;
					long11 =person.long;
				}
			}
		});
	});
	var doctor=["Name","place","mobile","distance"];
	var headDoc=[[" Dr.Erandra Jayasundra ","Homagama Hospital","+94123456789",""]];
	var mess=0;
	
	var heroHTMLItems="";
	setTimeout(function(){
	var userReference=firebase.database().ref().child("admin");
	userReference.on("value",function(snapshot){
		var x=false;
		var min=8;
		var c=8;
		heroHTMLItems+="<p align='left'>ඔබගේ ප්‍රදේශයට ආසන්නම වෛද්‍යවරුන්</p>";
		snapshot.forEach(function(childsnapshot){
			var person=childsnapshot.val();
			if(person.type=="doctor"){
				c=getDestance(lat11,long11,person.lat,person.long);
				if(c<=7){
					if(min>c){
						doctor[0]=person.username;
						doctor[1]=person.place;
						doctor[2]=person.mobile;
						doctor[3]=c;
						min=c;
					}
					heroHTMLItems+="<div class='chatDoctor btn' name='"+person.username+"' id='"+person.mobile+"'><p><i class='fas fa-user-md'></i>"+person.username+"<br>";
					heroHTMLItems+="<small>"+person.place+"</small></p></div>";
					x=true;
				}
			}
		});
		if(x==false){
			heroHTMLItems+="<p align='left'>මෙම අවස්ථාවේදී ඔබගේ ප්‍රදේශයේ සම්බන්ධ කරගත හැකි වෛද්‍යවරුන් නොමැති බැවින් ඔබව ප්‍රධාන කාර්යාලයට සම්බන්ධ කරනු ඇත.</p>";
			heroHTMLItems+="<div class='chatDoctor btn'><p><i class='fas fa-user-md'></i>"+headDoc[0][0]+"<br>";
			heroHTMLItems+="<small>"+headDoc[0][1]+"</small></p></div>";
			doctor[0]=headDoc[0][0];
			doctor[1]=headDoc[0][1];
			doctor[2]=headDoc[0][2];
			doctor[3]=headDoc[0][3];
		}else{
			
		}
	});
	
	setTimeout(function(){
		$("#show-symptoms").html(heroHTMLItems);
		var messageReference=firebase.database().ref().child("messages");
		messageReference.on("value",function(snapshot){
			$("#show-messages").empty();
			heroHTMLItems="";
			mess=0;
			heroHTMLItems+="<div class='clearfix mt-1 pt-1 pb-2' align='center'><h4><i class='fas fa-user-md'></i>&nbsp;"+doctor[0]+"</h4></div>";
			snapshot.forEach(function(childsnapshot){
				var message=childsnapshot.val();
				if(message.sender==nic && message.receiver==doctor[2]){
					heroHTMLItems+="<div class='text-left clearfix'><div class='left-msg'><i class='fas fa-user'></i> &nbsp;"+message.message+"</div></div>";
					mess=1;
				}else if(message.sender==doctor[2] && message.receiver==nic){
					heroHTMLItems+="<div class='text-right clearfix'><div class='right-msg'>"+message.message+"&nbsp;<i class='fas fa-user-md'></i></div></div>";
					mess=1;
				}
				
			});
			if(mess==0){
				heroHTMLItems+="පණිවිඩ නොමැත";
			}
			$("#show-messages").html(heroHTMLItems);
		});
	}, 2000 );
	}, 3000 );
	$(document).on("click",".chatDoctor",function()
  	{	

  		var mono=$(this).attr('id');
  		currentElement.classList.remove("chatDark");
  		currentElement=document.getElementById(mono);
  		currentElement.classList.add("chatDark");

  		var name=$(this).attr('name');
		var messageReference=firebase.database().ref().child("messages");
		messageReference.on("value",function(snapshot){
			$("#show-messages").empty();
			var heroHTMLItems="";
			mess=0;
			heroHTMLItems+="<div class='clearfix mt-1 pt-1 pb-2' align='center'><h4><i class='fas fa-user-md'></i>&nbsp;"+name+"</h4></div>";
			snapshot.forEach(function(childsnapshot){
				var message=childsnapshot.val();
				if(message.sender==nic && message.receiver==mono){
					heroHTMLItems+="<div class='text-left clearfix'><div class='left-msg'><i class='fas fa-user'></i> &nbsp;"+message.message+"</div></div>";
					mess=1;
				}else if(message.sender==mono && message.receiver==nic){
					heroHTMLItems+="<div class='text-right clearfix'><div class='right-msg'>"+message.message+"&nbsp;<i class='fas fa-user-md'></i></div></div>";
					mess=1;
				}
			});
			if(mess==0){
				heroHTMLItems+="";
			}
			$("#show-messages").html(heroHTMLItems);
		});
		doctor[0]=name;
		doctor[2]=mono;
	});
	function getDestance(lat11,lng1,lat22,lng2) {
      	var R = 6373.0;
      	var lat1 = degrees_to_radians(lat11);
		var lon1 = degrees_to_radians(lng1);
		var lat2 = degrees_to_radians(lat22);
		var lon2 = degrees_to_radians(lng2);
     	var dlon = lon2 - lon1;
      	var dlat = lat2 - lat1;
      	var a = Math.sin(dlat / 2)**2 + Math.cos(lat1) * Math.cos(lat2) * Math.sin(dlon / 2)**2;

     	var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
     	var distance = R * c;

      	return distance;
  	}

  	function degrees_to_radians(degrees){
    	var pi = Math.PI;
    	return degrees * (pi/180);
  	}
	$("#send").click(function()
  	{
		var detail ={
			message:$("#message").val(),
			receiver:doctor[2],
			sender:nic
		}
		if(doctor[2]=="mobile"){
			window.alert("Please Select User")
		}else{
			firebase.database().ref('messages').push(detail);
			firebase.database().ref('chatReadByDoctor/'+doctor[2]+"/"+nic).set("false");
			var check=true;

			var userReference=firebase.database().ref().child("chatListDoctorWise").child(doctor[2]);
			userReference.on("value",function(snapshot){
				snapshot.forEach(function(childsnapshot){
					if(nic==childsnapshot.val()){
						check=false;
					}
				});
			});
			setTimeout(function(){
			if(check==true){
				firebase.database().ref('chatListDoctorWise/'+doctor[2]).push(nic);
			}
			}, 3000 );
			var messageReference=firebase.database().ref().child("messages");
			messageReference.on("value",function(snapshot){
				$("#show-messages").empty();
				var heroHTMLItems="";
				mess=0;
				heroHTMLItems+="<div class='clearfix mt-1 pt-1 pb-2' align='center'><h4><i class='fas fa-user-md'></i>&nbsp;"+doctor[0]+"</h4></div>";
				snapshot.forEach(function(childsnapshot){
					var message=childsnapshot.val();
					if(message.sender==nic && message.receiver==doctor[2]){
						heroHTMLItems+="<div class='text-left'><div class='left-msg'><i class='fas fa-user'></i> &nbsp;"+message.message+"</div></div>";
						mess=1;
					}else if(message.sender==doctor[2] && message.receiver==nic){
						heroHTMLItems+="<div class='text-right'><div class='right-msg'>"+message.message+"&nbsp;<i class='fas fa-user-md'></i></div></div>";
						mess=1;
					}
				});
				if(mess==0){
					heroHTMLItems+="";
				}
				$("#show-messages").html(heroHTMLItems);
			});
			
		}
	});
</script>
</body>
</html>
