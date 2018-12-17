<?php
   session_start();
   if($_SESSION['state'] != true) {
   	header('Location: ../login.php?err=2');
   }
   
   
   $plan = 0;
   
	$user_mail = "";
	$user_registered = "";
	$user_credit = 0.0;

	
	include_once("scripts/db.php");
	include_once("scripts/db_user.php");
   
   
   ?>
<!DOCTYPE HTML>
<!--
   Prologue by HTML5 UP
   html5up.net | @ajlkn
   Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
   -->
<html>
   <head>
      <title>MailScope</title>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
      <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
      <link rel="stylesheet" href="assets/css/main.css" />
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
   </head>
   <body class="is-preload">
      <!-- Header -->
      <div id="header">
         <div class="top">
            <!-- Logo -->
            <div id="logo">
               <?php
                  if(isset($_SESSION['state_id'])) {
                  	include("nav_user.html");
                  } else {
                  	include("nav.html");
                  }
                  						
                  ?>
            </div>
            <!-- Nav -->
            <nav id="nav">
               <ul>
                  <li><a href="index.php#top" id="top-link"><span class="icon fa-home">Home</span></a></li>
               </ul>
            </nav>
         </div>
         <div class="bottom">
            <!-- Social Icons -->
            <ul class="icons">
               <li><a href="soon.php" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
               <li><a href="soon.php" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
               <li><a href="soon.php" class="icon fa-github"><span class="label">Github</span></a></li>
               <li><a href="soon.php" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
            </ul>
         </div>
      </div>
      <!-- Main -->
      <div id="main">
         <!-- Intro -->	
         <section id="top" class="two" >
            <div class="container">
               <header>
                  <h2 class="alt"><strong>Eine Liste beantragen</strong></h2>
                  <hr>
                  <form method="post" action="scripts/request.php" id="listForm">
                     <div class="row">
	                      <div class="col-6 col-12-mobile">
                           <h2>Anzahl Datensätze</h2>
                           
                        </div>
                        <div class="col-6 col-12-mobile">
                          	<input type="text" id="amount" name="amount" value="1000"/>
                          
                        </div>
                        
                        <div class="col-6 col-12-mobile">
                           <h2>Länder auswählen</h2>
                           <img src="https://www.countryflags.io/DZ/flat/64.png" id="country_flag" />
                        </div>
                        <div class="col-6 col-12-mobile">
                           <select name="country" onChange="changeFlag(this.value);" id="country">
                              <option value="loading">Loading...</option>
                           </select>
                           <button onclick="addCountry();">Hinzufügen</button>
                        </div>
                        <div class="col-6 col-12-mobile">
                           <h2>Ausgewählte Länder</h2>
                        </div>
                        <div class="col-6 col-12-mobile">
                           <select name="countries" id="countries" multiple="">
                           </select>
                        </div>
                        
                        <div class="col-6 col-12-mobile">
                           <h2>Regionen auswählen</h2>
                        </div>
                        <div class="col-6 col-12-mobile">
                           <select name="region" id="region">
                              <option value="loading">Loading...</option>
                           </select>
                           <button onclick="addRegion();">Hinzufügen</button>
                        </div>
                        
                        <div class="col-6 col-12-mobile">
                           <h2>Ausgewählte Regionen</h2>
                        </div>
                        <div class="col-6 col-12-mobile">
                           <select name="regions" id="regions" multiple="">
                           </select>
                        </div>
                        
                        <div class="col-6 col-12-mobile">
                           <h2>Städte auswählen</h2>
                        </div>
                        <div class="col-6 col-12-mobile">
                           <select name="city" id="city">
                              <option value="loading">Loading...</option>
                           </select>
                           <button onclick="addCity();">Hinzufügen</button>
                        </div>
                        
                        <div class="col-6 col-12-mobile">
                           <h2>Ausgewählte Städte</h2>
                        </div>
                        <div class="col-6 col-12-mobile">
                           <select name="cities" id="cities" multiple="">
                           </select>
                        </div>
                                              
                         <div class="col-6 col-12-mobile">
                           <h2>Zusätzliche Nachrichten</h2>
                        </div>
                        <div class="col-6 col-12-mobile">
                        	<textarea id="additional_message" name="additional_message"></textarea>
                        </div>
                        
                         <div class="col-6 col-12-mobile">
                           <h2>Zusätzliche Daten (Kosten pro Datensatz)</h2>
                        </div>
                        <div class="col-6 col-12-mobile">
                        	<fieldset>      					   
								<input type="checkbox" name="fn" id="fn" value="1" onclick="calcPrice();">Vollständiger Name<br>      
								<input type="checkbox" name="prof" id="prof" value="2" onclick="calcPrice();">Job<br>      
								<input type="checkbox" name="add" id="add" value="3" onclick="calcPrice();">Adresse<br>
								<input type="checkbox" name="smp" id="smp" value="4" onclick="calcPrice();">Social Media Profil<br>  
							</fieldset>  
                        </div>
                      

                        
               
                        
                        
                        <div class="col-12">
	                        <h2 id="price">0.00 BTC</h2>
							<button onclick="calcPrice();">Preis berechnen</button><hr>
	                        
                           <a href="dashboard.php">Abbrechen</a>
                           <input type="submit" value="Beantragen" onclick="requestList();"/>
                        </div>
                        <div class="col-12">
                           <div id="result">
                              <?php 
                                 if(isset($_GET['err'])) {
                                 	$code = $_GET['err'];
                                 	if($code == 1) {
                                 		echo "<h2 style='color:red;'>Ein Fehler ist aufgetreten! Bitte erneut versuchen.</h2>";
                                 	}
                                 	
                                 }
                                 ?>
                           </div>
                        </div>
                     </div>
                  </form>
               </header>
               <footer style="padding-bottom: 15px;">
                  <!--<a href="#plans" class="button scrolly">Take a look</a>-->
               </footer>
            </div>
         </section>
      </div>
      <!-- Footer -->
      <div id="footer">
         <!-- Copyright -->
         <ul class="copyright">
            <li>2018 &copy; MailScope. All rights reserved.</li>
         </ul>
      </div>
      <!-- Scripts -->
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/jquery.scrolly.min.js"></script>
      <script src="assets/js/jquery.scrollex.min.js"></script>
      <script src="assets/js/browser.min.js"></script>
      <script src="assets/js/breakpoints.min.js"></script>
      <script src="assets/js/util.js"></script>
      <script src="assets/js/main.js"></script>
      <script src="assets/js/particles.js"></script>
      <script>
         $(document).ready(init());
         
         
    
         
         function init() {
	         loadCountries();
	         loadRegions();
	         loadCities();
         }
         
         function loadCountries() {
         	$.ajax({url: "scripts/countries.php"}).done(function( html ) {
         		$("#country").empty();
         	    $("#country").append(html);
         	});
         	
         						
         }
         
         function loadRegions() {
         	$.ajax({url: "scripts/regions.php"}).done(function( html ) {
         		$("#region").empty();
         	    $("#region").append(html);
         	});
         	
         						
         }
         
         function loadCities() {
         	$.ajax({url: "scripts/cities.php"}).done(function( html ) {
         		$("#city").empty();
         	    $("#city").append(html);
         	});
         	
         						
         }
         
         $("#listForm").submit(function() {
         
         	return false;
         });
         
         
         function addCountry() {
         	var country_select = document.getElementById('country');
         	
         	
         	
         	var country = country_select.text;
         	var val = country_select.value;
         	
         	var option = document.createElement("option");
         	option.text = country_select.options[country_select.selectedIndex].text;;
         	option.value = val;
         	
         	
         	var inList = 0;
         	var country_options = $('#countries option');
         	var values = $.map(country_options, function(option_) {
			    
			    
			    if(option_.value == val) {
				    inList = 1;
			    }
			    
			});

         	if(inList != 1) {
	         	document.getElementById('countries').add(option);

         	}
         	
         	         calcPrice();	
         	
         }
         
         function addRegion() {
         	         	
         	var region_select = document.getElementById('region');
         	var region = region_select.text;
         	var val = region_select.value;
         	
         	var option = document.createElement("option");
         	option.text = region_select.options[region_select.selectedIndex].text;;
         	option.value = val;
         	
         	
         	var inList = 0;
         	var region_options = $('#regions option');
         	var values = $.map(region_options, function(option_) {
			    
			    
			    if(option_.value == val) {
				    inList = 1;
			    }
			    
			});

         	if(inList != 1) {
	         	document.getElementById('regions').add(option);

         	}

         	calcPrice();
         	
         }
         
         function addCity() {
         	var city_select = document.getElementById('city');
         	
         	
         	
         	var city = city_select.text;
         	var val = city_select.value;
         	
         	var option = document.createElement("option");
         	option.text = city_select.options[city_select.selectedIndex].text;;
         	option.value = val;
         	
         	
         	var inList = 0;
         	var city_options = $('#cities option');
         	var values = $.map(city_options, function(option_) {
			    
			    
			    if(option_.value == val) {
				    inList = 1;
			    }
			    
			});

         	if(inList != 1) {
	         	document.getElementById('cities').add(option);

         	}

         	calcPrice();
         	
         }
         
         function changeFlag(flag) {
         	var flag_url = flag;
         	
         	if(flag == "UK") {
         		flag_url = "GB";
         	} 
         	if(flag == "YU") {
         		flag_url = "MK";
         	} 
         	document.getElementById('country_flag').setAttribute("src", "https://www.countryflags.io/" + flag_url + "/flat/64.png");
         	
         }
         
         function requestList() {
	        var country_str = "";
			var city_str = "";
			var regions_str = "";
	         
	        
	        var country_arr = [];
	        var city_arr = [];
	        var region_arr = [];
	        
	        var country_options = $('#countries option');
	        var city_options = $('#cities option');
	        var region_options = $('#regions option');

	        
	        
			var values = $.map(country_options, function(option) {
			    country_arr.push(option.value);
			    country_str +=  option.value + ", ";
			    
			});
			
			 
	       	values = $.map(city_options, function(option) {
			    city_arr.push(option.value);
			    city_str +=  option.value + ", ";
			});
			
			 
	        
			values = $.map(region_options, function(option) {
			    region_arr.push(option.value);
			    regions_str += option.value + ", ";
			    
			});
			
			console.log(country_str);
			console.log(city_str);
			console.log(regions_str);

			
			
			var additional_text = document.getElementById('additional_message').value;
			console.log(additional_text);
			
			var amount = document.getElementById('amount').value;
			console.log(amount);
			
			
			var additional_data =  "";
			
			if (document.getElementById('fn').checked == true){
				additional_data += "Full Name;";
				
			}
			if (document.getElementById('prof').checked == true){
				additional_data += "Profession;";
			}

			if (document.getElementById('add').checked == true){
				additional_data += "Address;"
			}
			if (document.getElementById('smp').checked == true){
				additional_data += "SocialMedia;"
			}


			
			
			
			
			
			
			
			$.post( "scripts/createList.php", {'countries': country_str, 'cities': city_str, 'regions': regions_str, 'message': additional_text, 'amount': amount, 'additional_data': additional_data})
		  .done(function( data ) {
		   
		    if( data.includes('error')) {
			    window.location.replace('requestList.php?err=1');
		    } else {
			    window.location.replace('list_requested.php');
		    }
		  });
	                 
         }
         
         function calcPrice() {
					
					var price_mail 			= 0.000000175;
					var price_country 		= 0.00000175;//0.0000087;
					var price_region 		= 0.00000175;//0.0000087;
					var price_city 			= 0.00000175;//0.0000087;
					var price_fullname 		= 0.0000260;
					var price_profession 	= 0.0000780;
					var price_address 		= 0.0000260;
					var price_socialmedia 	= 0.0000430;
					
					var price_sum = 0.0;
					var price_txt = document.getElementById("price");
					
					
					var cnt_countries = document.getElementById("countries").length;
					var cnt_regions = document.getElementById("regions").length;
					var cnt_cities = document.getElementById("cities").length;
					var cnt = document.getElementById("amount").value;
					
					var field_fullname =  document.getElementById("fn").checked;
					var field_profession =  document.getElementById("prof").checked;
					var field_address =  document.getElementById("add").checked;
					var field_socialmedia =  document.getElementById("smp").checked;
					
					
					if(cnt_countries == 0) { cnt_countries = 1;}
					if(cnt_regions == 0) { cnt_regions = 1;}
					if(cnt_cities == 0) { cnt_cities = 1;}
					if(cnt == 0) { cnt = 1;}
					
					var price_countries = (cnt * (price_country * cnt_countries));
					var price_regions = (cnt * (price_region * cnt_regions));
					var price_cities = (cnt * (price_city * cnt_cities));
					var price_mails = (cnt * price_mail);
				
					price_sum = (price_countries + price_regions + price_cities + price_mails); 
					
					
					if(field_fullname) {
						price_sum += cnt * price_fullname;
					}
					if(field_profession) {
						price_sum += cnt * price_profession;
					}
					if(field_address) {
						price_sum += cnt * price_address;
					}
					if(field_socialmedia) {
						price_sum += cnt * price_socialmedia;
					}
					
					price_txt.innerHTML = price_sum.toFixed(8) + " BTC";
				}
         
         
      </script>
   </body>
</html>