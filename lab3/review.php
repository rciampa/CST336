<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Lab Three: PHP Arrays</title>
		
		<meta name="description" content="Lab three, using php arrays">
		<meta name="author" content="Richard Ciampa">
		
		<link type="text/css" rel="stylesheet" href="Styles/theme.css" />
		<link type="text/css" rel="stylesheet" href="./Styles/theme-common.css" />

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	</head>

	<body>
		<div id="container">
			<header>
				<h1 align="center">PHP Arrays</h1>
			</header>
			<!--
				<nav >
				<p>
					<a href="/review.php">Home</a>
				</p>
			</nav>
			-->

			<div>

				<?php
				$prices = array();

				$prices = array(550, 200, 600);

				echo $prices[0] . "<br/>";

				$prices[] = 100;

				print_r($prices);

				foreach ($prices as $value) {
					echo "<br/>Price : " . $value;
				}

				echo "<br/><hr/> Using sizeOf() <br/> We get the value: ";

				echo sizeof($prices);

				echo "<br/><hr/> Using count()  <br/> We get the value: ";
				echo count($prices);

				$prices = array('Apple Watch' => 550, "iPad Mini" => 250);

				//Add to the array
				$prices['iPad Air'] = 600;

				echo "<br/><hr/> Using print_r  <br/> We get the values: ";
				echo print_r($prices);

				echo "<br/><hr/> Using foreach  <br/> We get the values: ";
				foreach ($prices as $key => $value) {
					echo "<br/>Key is: " . $key . " Value is: " . $value;
				}

				asort($prices);

				echo "<br/><hr/> Using foreach AFTER asort()  <br/> We get the values: ";
				foreach ($prices as $key => $value) {
					echo "<br/>Key is: " . $key . " Value is: " . $value;
				}
				?>
				<hr />


<h1 align="center">Lab Challenge Activity</h1>


<div style="width:300px;margin:0 auto;">
<h3 id="challenge">Code Snippet:</h3>
<code>
<pre>
function passwordGen(){
  $password = array();
  for($i = 0; $i < 8; $i++){
     $password[$i]  = chr(rand(97, 122));
  }
  $password[rand(0, 7)] = rand(0,9);
  return implode($password);
}
	   
//Name + passwordGen call
$map = array();
$map["Richard"] = passwordGen();
$map["Susan"] = passwordGen();
$map["Andy"] = passwordGen();
$map["Brandon"] = passwordGen();
$map["Erin"] = passwordGen();
$map["Bob"] = passwordGen();
$map["Tom"] = passwordGen();
$map["Phillipe"] = passwordGen();
$map["Carlos"] = passwordGen();
$map["Sarah"] = passwordGen();

asort($map);

foreach($map as $key => $val){
   echo $key . " - " . $val . " ";
}
</pre>
</code>
<br/>
<h3>Code Snippet Output:</h3>
<code>
<pre>
<?php
  function passwordGen(){
  	$password = array();
    for($i = 0; $i < 8; $i++){
      $password[$i]  = chr(rand(97, 122));
    }
  	$password[rand(0, 7)] = rand(0,9);
  	return implode($password);
	}
	   
	//Name + passwordGen call
  $map = array();
  $map["Richard"] = passwordGen();
  $map["Susan"] = passwordGen();
  $map["Andy"] = passwordGen();
  $map["Brandon"] = passwordGen();
  $map["Erin"] = passwordGen();
  $map["Bob"] = passwordGen();
  $map["Tom"] = passwordGen();
  $map["Phillipe"] = passwordGen();
  $map["Carlos"] = passwordGen();
  $map["Sarah"] = passwordGen();

  asort($map);
  foreach($map as $key => $val){
		echo $key . " - " . $val . "<br />";
  }

?>
</pre>
</code>

</div>

	</div>
		<hr />
			<!-- Footer section -->
			<footer>
				<figure >
					<img class="footerLogoImage" src="./Media/Images/csumb-logo.png"
					alt="Image of Otter and first letters of the university, which are M & B" />
				</figure>
				 Richard Ciampa &copy; All Rights reserved
			</footer>	
		</div>
	</body>
</html>
