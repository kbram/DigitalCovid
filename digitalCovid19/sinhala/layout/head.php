<script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-database.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-storage.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
</script>
<div class="container-fluid bg-green mb-5">	
	<div class="row"> 
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
			<nav id="navId" class="navbar bg-green navbar-expand-lg fixed-top shadow-sm">
			  <a class="navbar-brand fnt-white" href="#">
			    <img src="img/logo.jpg" alt="logo"> Digitalcovid19
			  </a>
			  <p class="langbar">
			  	<a href="../index.php">English</a> | 
			  	<a href="index.php">සිංහල</a> | 
			  	<a href="../tamil/index.php">தமிழ்</a>
			  </p>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"><i class="fa fa-align-justify"></i></span>
			  </button>
			  <div class="collapse navbar-collapse justify-content-between pr-4 pl-2" id="collapsibleNavbar">
			    <ul class="navbar-nav mr-auto text-left">
			      <li class="nav-item"><a style="" class="nav-link" href="#">මුල් පිටුව</a></li>
				  <li class="nav-item"><a style="" class="nav-link" href="#">අප පිලිබදව</a></li>
			      <li class="nav-item"><a style="" class="nav-link" href="#">සම්බන්ධ වීමට</a></li>
			    </ul>
			    <ul type="hidden" id="UNameTop" class="navbar-nav text-left pr-2">
			    	<li class="nav-item">
			    		<div class="safeStatus">
			    			<p id="userNameHeader" class="my-auto" style="font-weight: bold;"> ගිණුම</p>
			    		</div>
			    	</li>
			    	<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="user.php" id="navbardrop" data-toggle="dropdown">
							<img src="img/user.png" class="rounded-circle profilePic">
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="user.php">මගේ ගිණුමට</a>
							<button id="logout-button"  class="dropdown-item" >ඉවත්වීමට</button>
						</div>
					</li>
			    </ul>
			  </div>
			</nav>
		</div>
	</div>
</div>
<script>

	$("#logout-button").click(function()
  	{
  		firebase.auth().signOut();
		  $("#userNameHeader").val(heroname);
	});
	firebase.auth().onAuthStateChanged(function(user) {
		  if (user) {
			var phoneNumber = user.phoneNumber;
			document.getElementById("userNameHeader").innerHTML = phoneNumber;
			$("#UNameTop").show();
		  } else {
		    $("#UNameTop").hide();
		  }
	});
</script>