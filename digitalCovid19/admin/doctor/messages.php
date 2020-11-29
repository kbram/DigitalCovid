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
</style>
</head>

<body>
<?php require_once '../layout/head.php'; ?>
<div class="container-fluid mt-5 pt-5 pb-5">
	<div class="row pt-4">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 pl-4 pr-4 pb-4">
			<div class="shadow-sm border userbox">
				<a class="fnt-green" href="user.php"><i class="fas fa-poll"></i> Dashboard</a><br>
				<hr>
				<a class="fnt-green" href="user_profile.php"><i class="fas fa-user"></i> My Profile</a><br>
				<hr>
				<a class="fnt-green" href="messages.php"><i class="fas fa-list"></i> Messages</a><br>

			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 pl-2 pr-2">
			<h2 class="fnt-green pl-1">Reply to Users</h2><br>
			<span class="chatDark" id="emptyId" hidden="hidden"></span>
			<div id="show-user">

			</div>
			<div class="border rounded-lg mt-5 mb-3 p-5">
				<div class="container" id="show-symptom">
					
				</div>
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
	var mobile="";
	var nic="";
	firebase.auth().onAuthStateChanged(function(user) {
		if (user) {
			currentUser=user;
			mobile = user.phoneNumber;
		} else {
			window.location.href="../index.php";
		}
	});
	
	var userReference=firebase.database().ref().child("admin");
	userReference.on("value",function(snapshot){
		var x=false;
		snapshot.forEach(function(childsnapshot){
			var person=childsnapshot.val();
			if(currentUser.email==null){
				cumobile=currentUser.phoneNumber;
				if(cumobile==person.mobile){
					if(person.type!="doctor"){
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
	var read=Array();
	setTimeout(function(){
	var userReference=firebase.database().ref().child("chatReadByDoctor")
	userReference.on("value",function(snapshot){
		snapshot.forEach(function(childsnapshot){
			if(childsnapshot.key==mobile){
				childsnapshot.forEach(function(cc){
					b=[];
					b.push(cc.key);
					b.push(cc.val());
					read.push(b);
				});
			}
		});
	});
	}, 1000 );
	var user=Array();
	var heroHTMLItems="";

	setTimeout(function(){
	var userReference=firebase.database().ref().child("chatListDoctorWise").child(mobile);
	userReference.on("value",function(snapshot){
		var x=false;
		heroHTMLItems+="<p align='left'>Users By</p>";
		snapshot.forEach(function(childsnapshot){
			heroHTMLItems+="<div class='chatDoctor btn' id='"+childsnapshot.val()+"'><p><i class='fas fa-user'></i>"+childsnapshot.val()+"</p>";
			for (var j = 0; j <read.length; j++) {
				if(read[j][0]==childsnapshot.val()){
					if(read[j][1]=="false"){
						heroHTMLItems+="<i class='fas fa-comments' align='center' style='color:red;' ></i></div>";
					}
				}
			}
			x=true;
		});
		if(x==false){
			heroHTMLItems+="<p align='Center'>No Users</p>";
		}else{
			
		}
	});
	setTimeout(function(){
		$("#show-user").html(heroHTMLItems);
	}, 3000 );
	}, 1000 );

	$(document).on("click",".chatDoctor",function(){
		var heroHTMLItems="";
  		var mono=$(this).attr('id');

		nic=$(this).attr('id');
		firebase.database().ref('chatReadByDoctor/'+mobile+"/"+nic).set("true");
		$('this').attr('style','color: black;');
		var symptomsReference=firebase.database().ref().child("symptoms");
		symptomsReference.on("value",function(snapshot){
			$("#show-symptom").empty();
			heroHTMLItems+="<div align='center'> <i class='fas fa-user'></i>&nbsp;"+mono+"</div>";
			heroHTMLItems+="<h2 class='fnt-green'>User Symptoms</h2><br>";
			var mess=0;
			snapshot.forEach(function(childsnapshot){
				var symptom=childsnapshot.val();
				if(childsnapshot.key==mono){
					heroHTMLItems+="<p><b>Current : </b>";
					if(symptom.breathin==true){
						heroHTMLItems+="Breathing Difficulties |";
					}if(symptom.smell==true){
						heroHTMLItems+="Loss of Smell |";
					}if(symptom.fever==true){
						heroHTMLItems+=" Ferver |";
					}if(symptom.headache==true){
						heroHTMLItems+="Headache |";
					}if(symptom.cough==true){
						heroHTMLItems+="Cough |";
					}if(symptom.throat==true){
						heroHTMLItems+="Sore throat |";
					}
					if(symptom.history){
						heroHTMLItems+="<br><strong>Already have Diseases: </strong>"; 
						heroHTMLItems+=symptom.history;
					}
					heroHTMLItems+="<br><strong>Gender: </strong>"; 
					heroHTMLItems+=symptom.sex;
					heroHTMLItems+="<br><strong>Age: </strong>"; 
					heroHTMLItems+=symptom.age;
					heroHTMLItems+="</p>";
					if(symptom.abroad==true){
						heroHTMLItems+="</p><p><b>Abroad :</b>"+symptom.country +" ("+symptom.date+")</p><br><br>";
					}else{
						heroHTMLItems+="</p><p><b>Abroad : </b>Not</p><br><br>";
					}
					mess=1;
				}
			});
			if(mess==0){
					heroHTMLItems+="<p align='left'>No current symptoms</p><br><br>";
			}
		});
		
		setTimeout(function(){
		$("#show-symptom").html(heroHTMLItems);
		var heroHTMLItems0="<br><br>";
		var messageReference=firebase.database().ref().child("messages");
		messageReference.on("value",function(snapshot){
			var mess=0;
			$("#show-messages").empty();
			snapshot.forEach(function(childsnapshot){
				var message=childsnapshot.val();
				if(message.sender==mobile && message.receiver==mono){
					heroHTMLItems0+="<div align='left' style= 'margin: 5px; position:relative;float: left;word-wrap: break-word; width: 51%;border-bottom-left-radius: 25px;border-top-right-radius: 25px;background-color: LightSkyBlue;padding:10px;'><i class='fas fa-user-md'></i> &nbsp;"+message.message+"</div>";
					mess=1;
				}else if(message.sender==mono && message.receiver==mobile){
					heroHTMLItems0+="<div align='right' style='margin: 5px;position:relative;float: right; word-wrap: break-word; width: 51%;border-bottom-right-radius: 25px;border-top-left-radius: 25px;background-color:LightPink ;padding:10px;'>"+message.message+"&nbsp;<i class='fas fa-user'></i></div>";
					mess=1;
				}
			});
			if(mess==0){
				heroHTMLItems0+="";
			}
			$("#show-messages").html(heroHTMLItems0);
			heroHTMLItems0="<br><br>";
		});
		}, 3000 );
	});
	
	$("#send").click(function(){
		if(nic==""){
			window.alert("Please click User")
		}else{
			var detail ={
				message:$("#message").val(),
				receiver:nic,
				sender:mobile
			}
			firebase.database().ref('messages').push(detail);
			var heroHTMLItems0="<br><br>";
			var messageReference=firebase.database().ref().child("messages");
			messageReference.on("value",function(snapshot){
				var mess=0;
				$("#show-messages").empty();
				snapshot.forEach(function(childsnapshot){
					var message=childsnapshot.val();
					if(message.sender==mobile && message.receiver==nic){
						heroHTMLItems0+="<div align='left' style= 'margin: 5px; position:relative;float: left;word-wrap: break-word; width: 51%;border-bottom-left-radius: 25px;border-top-right-radius: 25px;background-color: LightSkyBlue;padding:10px;'><i class='fas fa-user-md'></i> &nbsp;"+message.message+"</div>";
						mess=1;
					}else if(message.sender==nic && message.receiver==mobile){
						heroHTMLItems0+="<div align='right' style='margin: 5px;position:relative;float: right; word-wrap: break-word; width: 51%;border-bottom-right-radius: 25px;border-top-left-radius: 25px;background-color:LightPink ;padding:10px;'>"+message.message+"&nbsp;<i class='fas fa-user'></i></div>";
						mess=1;
					}
				});
				if(mess==0){
					heroHTMLItems0+="";
				}
				$("#show-messages").html(heroHTMLItems0);
				heroHTMLItems0="<br><br>";
			});
		}
	});
	
</script>
</body>
</html>
