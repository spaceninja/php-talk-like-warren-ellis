<?php
	include("warren.php");
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=8" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Talk Like Warren Ellis</title>
	<link rel="stylesheet" href="/ellis.css" type="text/css" media="screen" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
</head>
<body>

<p class="logo">Talk Like Warren Ellis <small>(Reload for another)</small></p>

<ul>
<?php for($i=0;$i<100;$i++) {
    echo '<li>' . ellis_complete_phrase() . '</li>';

    // To avoid repetition, words are deleted from the array when used.
    // Parts of the array will empty out completely after about five 
    // phrases are generated, leading to blank results, so reload
    // it each time:
    load_phrase_data(); 
} ?>
</ul>

</div>

</body>
</html>
