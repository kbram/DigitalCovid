<?php

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>எனது அறிகுறிகள் - எண்ணிம கோவிட் -19</title>
  <meta name="description" content="My Symptoms - DigitalCovid19">
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
	
  <script type="text/javascript" src="js/main.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-database.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-storage.js"></script>
	
</head>

<body>
<?php require_once 'layout/head.php'; ?>
<div class="container-fluid mt-5 pt-5 pb-5">
	<div class="row pt-4">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 pl-4 pr-4 pb-4">
		<div class="shadow-sm border userbox">
				<a class="fnt-green" href="user.php"><i class="fas fa-bell"></i> தகவல்தளம்</a><br>
				<hr>
				<a class="fnt-green" href="data.php"><i class="fas fa-poll"></i> புள்ளிவிபரம்</a><br>
				<hr>
				<a class="fnt-green" href="user_profile.php"><i class="fas fa-user"></i> சுயவிபரம்</a><br>
				<hr>
				<a class="fnt-green" href="user_symptoms.php"><i class="fas fa-heartbeat"></i> எனது அறிகுறிகள்</a><br>
				<hr>
				<a class="fnt-green" href="user_events.php"><i class="fas fa-calendar-alt"></i>எனது நிகழ்ச்சிகள்</a><br>
				<hr>
				<a class="fnt-green" href="getMedicalAdvice.php"><i class="fas fa-comments"></i> மருத்துவ ஆலோசனையை அணுக..</a><br>
			</div>
		</div>
		<div  class="col-xs-12 col-sm-12 col-md-8 col-lg-9 fnt-gray pl-2 pr-2">
			<div class="well" id="show-symptoms">
				
			</div>
			<h2 class="fnt-green">எனது அறிகுறிகளை சேர்க்க</h2><br>
			<div class="loginbox pl-4 pr-4">
				<form>
				<div class="form-check">
				  <label class="form-check-label">
				    <input id="breathing" type="checkbox" class="form-check-input" value="breathing_difficulties">சுவாச இடர்பாடுகள்
				  </label>
				</div>
				<div class="form-check">
				  <label class="form-check-label">
				    <input id="losssmell" type="checkbox" class="form-check-input" value="losssmell">நுகர்வுத் திறன் குறைபாடு
				  </label>
				</div>
				<div class="form-check">
				  <label class="form-check-label">
				    <input id="ferver" type="checkbox" class="form-check-input" value="fever">காய்ச்சல்
				  </label>
				</div>
				<div class="form-check">
				  <label class="form-check-label">
				    <input id="headache" type="checkbox" class="form-check-input" value="headache">தலைவலி
				  </label>
				</div>
				<div class="form-check">
				  <label class="form-check-label">
				    <input id="cough" type="checkbox" class="form-check-input" value="cough">இருமல்
				  </label>
				</div>
				<div class="form-check">
				  <label class="form-check-label">
				    <input id="sore_throat" type="checkbox" class="form-check-input" value="sore_throat">தொண்டை நோவு
				  </label>
				</div>
				<div class="form-group pt-3">
				<label>உங்களுக்கு நோய்கள் ஏதும் உள்ளதா?</label>
				<br>
				<textarea id="DiseaseHistory" class="form-control" value="DiseaseHistory" placeholder="Disease History"></textarea>
				</div>
				<div class="form-group pt-3">
					<label>நிங்கள் கடந்த சில கிழமைகளுள் வெளிநாடு ஏதும் சென்று வந்தீர்களா?</label><br>
					<div class="custom-control custom-radio custom-control-inline">
					    <input checked type="radio" class="custom-control-input" id="abroadid" name="abroad" value="abroad">
					    <label class="custom-control-label" for="abroadid">ஆம்</label>
					 </div>
					<div class="custom-control custom-radio custom-control-inline">
					    <input type="radio" class="custom-control-input" id="notabroadid" name="abroad" value="notAbroad">
					    <label class="custom-control-label" for="notabroadid">இல்லை</label>
					</div>
				</div>
				<div class="form-group">
			      <label for="country">எந்த நாடு</label>
			      <select class="form-control" id="country" name="country">
			        <option value="Afganistan">Afghanistan</option>
						   <option value="Albania">Albania</option>
						   <option value="Algeria">Algeria</option>
						   <option value="American Samoa">American Samoa</option>
						   <option value="Andorra">Andorra</option>
						   <option value="Angola">Angola</option>
						   <option value="Anguilla">Anguilla</option>
						   <option value="Antigua & Barbuda">Antigua & Barbuda</option>
						   <option value="Argentina">Argentina</option>
						   <option value="Armenia">Armenia</option>
						   <option value="Aruba">Aruba</option>
						   <option value="Australia">Australia</option>
						   <option value="Austria">Austria</option>
						   <option value="Azerbaijan">Azerbaijan</option>
						   <option value="Bahamas">Bahamas</option>
						   <option value="Bahrain">Bahrain</option>
						   <option value="Bangladesh">Bangladesh</option>
						   <option value="Barbados">Barbados</option>
						   <option value="Belarus">Belarus</option>
						   <option value="Belgium">Belgium</option>
						   <option value="Belize">Belize</option>
						   <option value="Benin">Benin</option>
						   <option value="Bermuda">Bermuda</option>
						   <option value="Bhutan">Bhutan</option>
						   <option value="Bolivia">Bolivia</option>
						   <option value="Bonaire">Bonaire</option>
						   <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
						   <option value="Botswana">Botswana</option>
						   <option value="Brazil">Brazil</option>
						   <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
						   <option value="Brunei">Brunei</option>
						   <option value="Bulgaria">Bulgaria</option>
						   <option value="Burkina Faso">Burkina Faso</option>
						   <option value="Burundi">Burundi</option>
						   <option value="Cambodia">Cambodia</option>
						   <option value="Cameroon">Cameroon</option>
						   <option value="Canada">Canada</option>
						   <option value="Canary Islands">Canary Islands</option>
						   <option value="Cape Verde">Cape Verde</option>
						   <option value="Cayman Islands">Cayman Islands</option>
						   <option value="Central African Republic">Central African Republic</option>
						   <option value="Chad">Chad</option>
						   <option value="Channel Islands">Channel Islands</option>
						   <option value="Chile">Chile</option>
						   <option value="China">China</option>
						   <option value="Christmas Island">Christmas Island</option>
						   <option value="Cocos Island">Cocos Island</option>
						   <option value="Colombia">Colombia</option>
						   <option value="Comoros">Comoros</option>
						   <option value="Congo">Congo</option>
						   <option value="Cook Islands">Cook Islands</option>
						   <option value="Costa Rica">Costa Rica</option>
						   <option value="Cote DIvoire">Cote DIvoire</option>
						   <option value="Croatia">Croatia</option>
						   <option value="Cuba">Cuba</option>
						   <option value="Curaco">Curacao</option>
						   <option value="Cyprus">Cyprus</option>
						   <option value="Czech Republic">Czech Republic</option>
						   <option value="Denmark">Denmark</option>
						   <option value="Djibouti">Djibouti</option>
						   <option value="Dominica">Dominica</option>
						   <option value="Dominican Republic">Dominican Republic</option>
						   <option value="East Timor">East Timor</option>
						   <option value="Ecuador">Ecuador</option>
						   <option value="Egypt">Egypt</option>
						   <option value="El Salvador">El Salvador</option>
						   <option value="Equatorial Guinea">Equatorial Guinea</option>
						   <option value="Eritrea">Eritrea</option>
						   <option value="Estonia">Estonia</option>
						   <option value="Ethiopia">Ethiopia</option>
						   <option value="Falkland Islands">Falkland Islands</option>
						   <option value="Faroe Islands">Faroe Islands</option>
						   <option value="Fiji">Fiji</option>
						   <option value="Finland">Finland</option>
						   <option value="France">France</option>
						   <option value="French Guiana">French Guiana</option>
						   <option value="French Polynesia">French Polynesia</option>
						   <option value="French Southern Ter">French Southern Ter</option>
						   <option value="Gabon">Gabon</option>
						   <option value="Gambia">Gambia</option>
						   <option value="Georgia">Georgia</option>
						   <option value="Germany">Germany</option>
						   <option value="Ghana">Ghana</option>
						   <option value="Gibraltar">Gibraltar</option>
						   <option value="Great Britain">Great Britain</option>
						   <option value="Greece">Greece</option>
						   <option value="Greenland">Greenland</option>
						   <option value="Grenada">Grenada</option>
						   <option value="Guadeloupe">Guadeloupe</option>
						   <option value="Guam">Guam</option>
						   <option value="Guatemala">Guatemala</option>
						   <option value="Guinea">Guinea</option>
						   <option value="Guyana">Guyana</option>
						   <option value="Haiti">Haiti</option>
						   <option value="Hawaii">Hawaii</option>
						   <option value="Honduras">Honduras</option>
						   <option value="Hong Kong">Hong Kong</option>
						   <option value="Hungary">Hungary</option>
						   <option value="Iceland">Iceland</option>
						   <option value="Indonesia">Indonesia</option>
						   <option value="India">India</option>
						   <option value="Iran">Iran</option>
						   <option value="Iraq">Iraq</option>
						   <option value="Ireland">Ireland</option>
						   <option value="Isle of Man">Isle of Man</option>
						   <option value="Israel">Israel</option>
						   <option value="Italy">Italy</option>
						   <option value="Jamaica">Jamaica</option>
						   <option value="Japan">Japan</option>
						   <option value="Jordan">Jordan</option>
						   <option value="Kazakhstan">Kazakhstan</option>
						   <option value="Kenya">Kenya</option>
						   <option value="Kiribati">Kiribati</option>
						   <option value="Korea North">Korea North</option>
						   <option value="Korea Sout">Korea South</option>
						   <option value="Kuwait">Kuwait</option>
						   <option value="Kyrgyzstan">Kyrgyzstan</option>
						   <option value="Laos">Laos</option>
						   <option value="Latvia">Latvia</option>
						   <option value="Lebanon">Lebanon</option>
						   <option value="Lesotho">Lesotho</option>
						   <option value="Liberia">Liberia</option>
						   <option value="Libya">Libya</option>
						   <option value="Liechtenstein">Liechtenstein</option>
						   <option value="Lithuania">Lithuania</option>
						   <option value="Luxembourg">Luxembourg</option>
						   <option value="Macau">Macau</option>
						   <option value="Macedonia">Macedonia</option>
						   <option value="Madagascar">Madagascar</option>
						   <option value="Malaysia">Malaysia</option>
						   <option value="Malawi">Malawi</option>
						   <option value="Maldives">Maldives</option>
						   <option value="Mali">Mali</option>
						   <option value="Malta">Malta</option>
						   <option value="Marshall Islands">Marshall Islands</option>
						   <option value="Martinique">Martinique</option>
						   <option value="Mauritania">Mauritania</option>
						   <option value="Mauritius">Mauritius</option>
						   <option value="Mayotte">Mayotte</option>
						   <option value="Mexico">Mexico</option>
						   <option value="Midway Islands">Midway Islands</option>
						   <option value="Moldova">Moldova</option>
						   <option value="Monaco">Monaco</option>
						   <option value="Mongolia">Mongolia</option>
						   <option value="Montserrat">Montserrat</option>
						   <option value="Morocco">Morocco</option>
						   <option value="Mozambique">Mozambique</option>
						   <option value="Myanmar">Myanmar</option>
						   <option value="Nambia">Nambia</option>
						   <option value="Nauru">Nauru</option>
						   <option value="Nepal">Nepal</option>
						   <option value="Netherland Antilles">Netherland Antilles</option>
						   <option value="Netherlands">Netherlands (Holland, Europe)</option>
						   <option value="Nevis">Nevis</option>
						   <option value="New Caledonia">New Caledonia</option>
						   <option value="New Zealand">New Zealand</option>
						   <option value="Nicaragua">Nicaragua</option>
						   <option value="Niger">Niger</option>
						   <option value="Nigeria">Nigeria</option>
						   <option value="Niue">Niue</option>
						   <option value="Norfolk Island">Norfolk Island</option>
						   <option value="Norway">Norway</option>
						   <option value="Oman">Oman</option>
						   <option value="Pakistan">Pakistan</option>
						   <option value="Palau Island">Palau Island</option>
						   <option value="Palestine">Palestine</option>
						   <option value="Panama">Panama</option>
						   <option value="Papua New Guinea">Papua New Guinea</option>
						   <option value="Paraguay">Paraguay</option>
						   <option value="Peru">Peru</option>
						   <option value="Phillipines">Philippines</option>
						   <option value="Pitcairn Island">Pitcairn Island</option>
						   <option value="Poland">Poland</option>
						   <option value="Portugal">Portugal</option>
						   <option value="Puerto Rico">Puerto Rico</option>
						   <option value="Qatar">Qatar</option>
						   <option value="Republic of Montenegro">Republic of Montenegro</option>
						   <option value="Republic of Serbia">Republic of Serbia</option>
						   <option value="Reunion">Reunion</option>
						   <option value="Romania">Romania</option>
						   <option value="Russia">Russia</option>
						   <option value="Rwanda">Rwanda</option>
						   <option value="St Barthelemy">St Barthelemy</option>
						   <option value="St Eustatius">St Eustatius</option>
						   <option value="St Helena">St Helena</option>
						   <option value="St Kitts-Nevis">St Kitts-Nevis</option>
						   <option value="St Lucia">St Lucia</option>
						   <option value="St Maarten">St Maarten</option>
						   <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
						   <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
						   <option value="Saipan">Saipan</option>
						   <option value="Samoa">Samoa</option>
						   <option value="Samoa American">Samoa American</option>
						   <option value="San Marino">San Marino</option>
						   <option value="Sao Tome & Principe">Sao Tome & Principe</option>
						   <option value="Saudi Arabia">Saudi Arabia</option>
						   <option value="Senegal">Senegal</option>
						   <option value="Seychelles">Seychelles</option>
						   <option value="Sierra Leone">Sierra Leone</option>
						   <option value="Singapore">Singapore</option>
						   <option value="Slovakia">Slovakia</option>
						   <option value="Slovenia">Slovenia</option>
						   <option value="Solomon Islands">Solomon Islands</option>
						   <option value="Somalia">Somalia</option>
						   <option value="South Africa">South Africa</option>
						   <option value="Spain">Spain</option>
						   <option value="Sri Lanka">Sri Lanka</option>
						   <option value="Sudan">Sudan</option>
						   <option value="Suriname">Suriname</option>
						   <option value="Swaziland">Swaziland</option>
						   <option value="Sweden">Sweden</option>
						   <option value="Switzerland">Switzerland</option>
						   <option value="Syria">Syria</option>
						   <option value="Tahiti">Tahiti</option>
						   <option value="Taiwan">Taiwan</option>
						   <option value="Tajikistan">Tajikistan</option>
						   <option value="Tanzania">Tanzania</option>
						   <option value="Thailand">Thailand</option>
						   <option value="Togo">Togo</option>
						   <option value="Tokelau">Tokelau</option>
						   <option value="Tonga">Tonga</option>
						   <option value="Trinidad & Tobago">Trinidad & Tobago</option>
						   <option value="Tunisia">Tunisia</option>
						   <option value="Turkey">Turkey</option>
						   <option value="Turkmenistan">Turkmenistan</option>
						   <option value="Turks & Caicos Is">Turks & Caicos Is</option>
						   <option value="Tuvalu">Tuvalu</option>
						   <option value="Uganda">Uganda</option>
						   <option value="United Kingdom">United Kingdom</option>
						   <option value="Ukraine">Ukraine</option>
						   <option value="United Arab Erimates">United Arab Emirates</option>
						   <option value="United States of America">United States of America</option>
						   <option value="Uraguay">Uruguay</option>
						   <option value="Uzbekistan">Uzbekistan</option>
						   <option value="Vanuatu">Vanuatu</option>
						   <option value="Vatican City State">Vatican City State</option>
						   <option value="Venezuela">Venezuela</option>
						   <option value="Vietnam">Vietnam</option>
						   <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
						   <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
						   <option value="Wake Island">Wake Island</option>
						   <option value="Wallis & Futana Is">Wallis & Futana Is</option>
						   <option value="Yemen">Yemen</option>
						   <option value="Zaire">Zaire</option>
						   <option value="Zambia">Zambia</option>
						   <option value="Zimbabwe">Zimbabwe</option>
			      </select>
			  	</div>
				<div class="form-group">
				 <label >எங்கிருந்து</label>
				 <input required type="date" id="abroadFrom" name="abroadFrom" max="3000-12-31" min="1000-01-01" class="form-control">
				</div>
				<div class="form-group">
				 <label >எங்கு</label>
				 <input required type="date" id="abroadTo" name="abroadTo" min="1000-01-01" max="3000-12-31" class="form-control">
				</div>
				<div class="form-group text-left">
					<button type="button" name="save-submit" id="btn_saveform" tabindex="5" class="btn btn-green" value="save-submit">அறிகுறியை சேர்க்கவும்</button>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid bg-light">
	<div class="row pt-5 pb-5 pl-2 pr-2">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fnt-green">
			<h1><b>பயன்பாட்டை பதிவிறக்கம் செய்ய</b></h1>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 fnt-green pt-1">
			<p class="text-justify">பின்வரும் இணைப்புகளிலிருந்து நீங்கள் Andriod/iOS பயன்பாடுகளை பதிவிறக்கம் செய்துகொள்ள முடியும் . பின்னர் உங்கள் தரவுகளை பதிவு செய்வதன் மூலம் இலங்கையில் கொரோனா பரவுவதை நிறுத்த பங்களிப்பு செய்வோம்</p>
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
$('#notabroadid').click(function() {
      if ($(this).is(':checked')) {
            $('#abroadFrom').prop('disabled', true);
            $('#abroadTo').prop('disabled', true);
            $('#country').prop('disabled', true);
      }
});
$('#abroadid').click(function() {
      if ($(this).is(':checked')) {
            $('#abroadFrom').prop('disabled', false);
            $('#abroadTo').prop('disabled', false);
            $('#country').prop('disabled', false);
      }
});
$("#btn_saveform").click(function(){
	var breathing =$('#breathing').prop('checked');
	var ferver =$('#ferver').prop('checked');
	var headache =$('#headache').prop('checked');
	var cough =$('#cough').prop('checked');
	var sore_throat =$('#sore_throat').prop('checked');
	var losssmell=$('#losssmell').prop('checked');
	var diabetes=$('#diabetes').prop('checked');
	var DiseaseHistory=$('#DiseaseHistory').val();

	if($('#abroadid').prop('checked')){
		var country=$('#country').val();
		var abroadFrom=$('#abroadFrom').val();
		var abroadTo=$('#abroadTo').val();
	}else{
        var country="";
        var abroadFrom="";
        var abroadTo="";
	}
	var da=abroadFrom+ "<->"+ abroadTo;
	
	if((abroadFrom=="" ||abroadTo=="" ||country=="" )&& $('#abroadid').prop('checked')){
		window.alert("தயவு செய்து அனைத்து வெற்றிடங்களையும் நிரப்புக")
	}else if(abroadFrom>abroadTo){
		window.alert("தரவு பிழையாக உள்ளீடு செய்யப்பட்டுள்ளது.")
	}else{
		var symptoms ={
			abroad:$('#abroadid').prop('checked'),
			breathin:breathing,
			losssmell:losssmell,
			cough:cough,
			country:country,
  			date:da,
  			ferver:ferver,
  			headache:headache,
  			throat:sore_throat,
			DiseaseHistory:DiseaseHistory
		  }
		  addSymptom(symptoms);
	}
});	
var nic="";
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
function addSymptom(d){
	if(nic==""){
		window.alert("அறிகுறிகள் புதுப்பிக்கப்படவில்லை, மீண்டும் முயற்சிக்கவும்.")
	}else{
		firebase.database().ref('symptoms/' + nic).set(d);
		window.alert("அறிகுறிகள் புதுப்பிக்கப்பட்டன.")
	}
}
firebase.auth().onAuthStateChanged(function(user) {
		if (user) {
			currentUser=user;
			var mobile = user.phoneNumber;
		} else {
			window.location.href="index.php";
		}
});
var symptomsReference=firebase.database().ref().child("symptoms");

symptomsReference.on("value",function(snapshot){
	$("#show-symptoms").empty();
	var heroHTMLItems="<h2 class='fnt-green'>எனது அறிகுறி</h2><br>";
	var mess=0;
	snapshot.forEach(function(childsnapshot){
		var symptom=childsnapshot.val();
		if(childsnapshot.key==nic){
			heroHTMLItems+="<p><b>அறிகுறி : </b>";
			if(symptom.breathin==true){
				heroHTMLItems+="சுவாச இடர்பாடுகள் |";
			}if(symptom.losssmell==true){
				heroHTMLItems+="நுகர்வுத் திறன் குறைபாடு |";
			}if(symptom.ferver==true){
				heroHTMLItems+=" காய்ச்சல் |";
			}if(symptom.headache==true){
				heroHTMLItems+="தலைவலி |";
			}if(symptom.cough==true){
				heroHTMLItems+="இருமல் |";
			}if(symptom.throat==true){
				heroHTMLItems+="தொண்டை நோவு |";
			}
			if(symptom.DiseaseHistory){
				heroHTMLItems+="<br><strong>ஏற்கனவே உள்ள நோய்: </strong>"; 
				heroHTMLItems+=symptom.DiseaseHistory;
			}
			heroHTMLItems+="</p>";
			if(symptom.abroad==true){
				heroHTMLItems+="</p><p><b>வெளிநாடு:</b>"+symptom.country +" ("+symptom.date+")</p><br><br>";
			}else{
				heroHTMLItems+="</p><p><b>வெளிநாடு:</b>Not</p><br><br>";
			}
			mess=1;
		}
		
	});
	if(mess==0){
			heroHTMLItems+="<p align='left'>அறிகுறிகள் இல்லை</p><br><br>";
	}
$("#show-symptoms").html(heroHTMLItems);
});

</script>
</body>
</html>