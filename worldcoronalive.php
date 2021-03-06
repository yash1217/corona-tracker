<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<?php include 'link/links.php'; ?>
	<?php include 'css/style.php'; ?>
</head>
<body onload="fetch()">

<nav class="navbar navbar-expand-lg nav_style  p-3 navbar-dark">
	<a class="navbar-brand pl-3 count_style" href="#"><img src="images/logo.png"><b> Apex COVID-19 Tracker</b></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav ml-auto pr-5 text-capitalize">
			<li class="nav-item active">
				<a class="nav-link" href="index.php"><b>Home</b> <span class="sr-only">(current)</span></a>
			<li class="nav-item text-center">
				<a class="nav-link" href="indiacoronalive.php"><b>India Corona LIVE</b></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="daywise.php"><b>daywise LIVE</b></a>
			</li>
		</ul>
	</div>
</nav>

<!--***********************  corona latest world updates  ***********************-->


<section class ="corona_update container-fluid">
	<div class="my-5" id ="worldupdates">
		<h3 class="text-uppercase text-center"><b>covid-19 updates of world</b></h3>
	</div>

	<div class = "table-responsive">

		<table class=" table table-bordered table-striped text-center" id="tbval">
			<tr>
				<th>Country</th>
				<th>Total Confirmed</th>
				<th>Total Recovered</th>
				<th>Total Death</th>
				<th>New Confirmed</th>
				<th>New Recovered</th>
				<th>New Deaths</th>
			</tr>
		</table>
		
		
	</div>
</section>

<!-- ******************* top icon ****************** -->


<div class="container scrolltop float-right pr-5">
	<i class=" fa fa-arrow-up" onclick="topFunction()" id= "myBtn"></i>
</div>


<!-- ******************* footer ****************** -->

<footer class="mt-5">
	<div class="footer_style text-white text-center container-fluid">
		< <p>All rights reserve by Yash Chandane and team. copyright by Yash Chandane and team</p>
	</div>
</footer>

<script type="text/javascript">

$('.count').counterUp({
	delay: 10,
	time:2000
})
	//Get the button:
	mybutton = document.getElementById("myBtn");

	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
  		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    	mybutton.style.display = "block";
  		} else {
    	mybutton.style.display = "none";
  		}
	}

	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
  		document.body.scrollTop = 0; // For Safari
  		document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}



function fetch() {
	$.get("https://api.covid19api.com/summary", 
		function(data){
			//console.log(data['Countries'].length);
			var tbval = document.getElementById('tbval');
			for(var i =1;i<(data['Countries'].length); i++){
				var x = tbval.insertRow();


				x.insertCell(0);

				tbval.rows[i].cells[0].innerHTML = data['Countries'][i-1]['Country'];
				tbval.rows[i].cells[0].style.background = '#4a9b91 ';
				tbval.rows[i].cells[0].style.color = '#e3e1e1 ';


				x.insertCell(1);

				tbval.rows[i].cells[1].innerHTML = data['Countries'][i-1]['TotalConfirmed'];
				tbval.rows[i].cells[1].style.background = '#e8e51c ';


				x.insertCell(2);

				tbval.rows[i].cells[2].innerHTML = data['Countries'][i-1]['TotalRecovered'];
				tbval.rows[i].cells[2].style.background = '#37dbc0 ';


				x.insertCell(3);

				tbval.rows[i].cells[3].innerHTML = data['Countries'][i-1]['TotalDeaths'];
				tbval.rows[i].cells[3].style.background = '#e80e41 ';


				x.insertCell(4);

				tbval.rows[i].cells[4].innerHTML = data['Countries'][i-1]['NewConfirmed'];
				tbval.rows[i].cells[4].style.background = '#e8e51c ';


				x.insertCell(5);

				tbval.rows[i].cells[5].innerHTML = data['Countries'][i-1]['NewRecovered'];
				tbval.rows[i].cells[5].style.background = '#37dbc0 ';


				x.insertCell(6);

				tbval.rows[i].cells[6].innerHTML = data['Countries'][i-1]['NewDeaths'];
				tbval.rows[i].cells[6].style.background = '#e80e41';


			}
		}
	);
}
</script>
</body>
</html>