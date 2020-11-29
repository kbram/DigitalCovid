<?php

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>DigitalCovid19- මුරපදය අලුත් කරන්න</title>
  <meta name="description" content="">
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
  <div class="row pt-5">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-5 text-center">
      <div class="shadow-sm border loginbox p-5 mx-auto">
        <h2>මුරපදය අලුත් කරන්න</h2><br>
        <form >
          <div class="form-group">
            <input required type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="ඊමේල් ලිපිනය">
          </div>
          <div class="form-group text-center">
            <button type="button" name="reset-pswd" id="reset-pswd" tabindex="4" class="btn btn-green pl-5 pr-5" value="reset-pswd">මුරපදය අලුත් කරන්න</button>
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
$("#reset-pswd").click(function()
    {
      var auth = firebase.auth();
    var emailAddress = $("#email").val();
    auth.sendPasswordResetEmail(emailAddress).then(function() {

    }).catch(function(error) {

    });
     window.alert("Please check your emails for the password reset link")
     window.location.href="index.php";
});
firebase.auth().onAuthStateChanged(function(user) {
      if (user) {
      var email = user.email;
      currentUser=user;
      if (!user.emailVerified){
        window.alert("Please Verify email")
        window.location.href="index.php";
      }
      } else {
      window.location.href="index.php";
      }
});
</script>
</body>
</html>
