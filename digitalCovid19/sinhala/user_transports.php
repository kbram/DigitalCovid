<?php

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>My Travels - DigitalCovid19</title>
  <meta name="description" content="My Travels - DigitalCovid19">
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
 
</head>

<body>
<?php require_once 'layout/head.php'; ?>
<div class="container-fluid mt-5 pt-5 pb-5">
	<div class="row pt-4">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 pl-4 pr-4 pb-4">
			<div class="shadow-sm border userbox">
				<a class="fnt-green" href="user.php"><i class="fas fa-poll"></i> Dashboard</a><br>
				<hr>
				<a class="fnt-green" href="user_profile.php"><i class="fas fa-user"></i> Profile</a><br>
				<hr>
				<a class="fnt-green" href="user_symptoms.php"><i class="fas fa-heartbeat"></i> My Symptoms</a><br>
				<hr>
				<a class="fnt-green" href="user_transports.php"><i class="fas fa-bus-alt"></i> My Transports</a><br>
				<hr>
				<a class="fnt-green" href="user_events.php"><i class="fas fa-calendar-alt"></i> My Events</a><br>
				<hr>
				<a class="fnt-green" href="user_network.php"><i class="fas fa-users"></i> My Network</a><br>
				
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 fnt-gray pl-2 pr-2">
			<h2 class="fnt-green pl-1">Add New Travel</h2>
			<div class="loginbox pl-4 pr-4">
				<form action="transport_editpage.php" method="post" role="form">
				<div class="form-group pt-3">
					<label>What type of transportation did you used to travel?</label><br>
					<div class="custom-control custom-radio custom-control-inline">
					    <input required type="radio" class="custom-control-input" id="private" name="transport" value="private">
					    <label class="custom-control-label" for="private">Private</label>
					 </div>
					<div class="custom-control custom-radio custom-control-inline">
					    <input required type="radio" class="custom-control-input" id="public" name="transport" value="public">
					    <label class="custom-control-label" for="public">Public</label>
					</div>
				</div>
				<div class="form-group pt-3">
					<label>What kind of vehicle did you use to travel?</label><br>
					<div class="custom-control custom-radio custom-control-inline">
					    <input required type="radio" class="custom-control-input" id="train" name="kind" value="train">
					    <label class="custom-control-label" for="train">Train</label>
					 </div>
					<div class="custom-control custom-radio custom-control-inline">
					    <input required type="radio" class="custom-control-input" id="bus" name="kind" value="bus">
					    <label class="custom-control-label" for="bus">Bus</label>
					</div>
				</div>
				<div class="form-group">
					<input required type="text" name="busNumber" id="busNumber" class="form-control" placeholder="Bus Number">
				</div>
				<div class="form-group">
					<input required type="text" name="route" id="route" class="form-control" placeholder="Route">
				</div>
				<div class="form-group">
					<label >Date</label>
					<input required type="date" id="tDate" name="tDate" max="3000-12-31" min="1000-01-01" class="form-control">
				</div>
				<div class="form-group">
					<label for="">With Whom?</label>
					<input required type="text" name="withWhom" id="withWhom" class="form-control" placeholder="NIC Number">
				</div>
				<div class="form-group text-left">
					<button type="submit" name="save-submit" id="btn_saveform" class="btn btn-green" value="save-submit">Add Transport</button>
				</div>
			</form>
			</div><br>
			<h2 class="fnt-green">My Travels</h2><br>
			<div class="container-fluid text-center">
				<div class="addedItems shadow-sm p-3 text-center">
					<p class="fnt-green"><i class="fas fa-bus-alt"></i></p>
					<p><small>2020-03-02</small><br>
						Public:Bus(NA-3453)<br>
						Route:87<br>
						With:941881513v<br>
					</p>
				</div>
				<div class="addedItems shadow-sm p-3 text-center">
					<p class="fnt-green"><i class="fas fa-train"></i></p>
					<p><small>2020-03-02</small><br>
						Public:Train<br>
						Route:87<br>
						With:941881513v<br>
					</p>
				</div>
				<div class="addedItems shadow-sm p-3 text-center">
					<p class="fnt-green"><i class="fas fa-car"></i></p>
					<p><small>2020-03-02</small><br>
						Private<br>
						Route:87<br>
						With:941881513v<br>
					</p>
				</div>
				<div class="addedItems shadow-sm p-3 text-center">
					<p class="fnt-green"><i class="fas fa-bus-alt"></i></p>
					<p><small>2020-03-02</small><br>
						Public:Bus(NA-6453)<br>
						Route:15<br>
						With:9411181513v<br>
					</p>
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
<script type="text/javascript">
$('#public').click(function() {
      if ($(this).is(':checked')) {
            $('#withWhom').prop('disabled', true);
            $('#train').prop('disabled', false);
            $('#bus').prop('disabled', false);
            $('#busNumber').prop('disabled', false);
            $('#route').prop('disabled', false);
      }
});
$('#private').click(function() {
      if ($(this).is(':checked')) {
            $('#train').prop('disabled', true);
            $('#bus').prop('disabled', true);
            $('#busNumber').prop('disabled', true);
            $('#route').prop('disabled', true);
            $('#withWhom').prop('disabled', false);
      }
});
$('#train').click(function() {
      if ($(this).is(':checked')) {
            $('#busNumber').prop('disabled', true);
            $('#route').prop('disabled', true);
      }
});
$('#bus').click(function() {
      if ($(this).is(':checked')) {
            $('#busNumber').prop('disabled', false);
            $('#route').prop('disabled', false);
      }
});
</script>
</body>
</html>
