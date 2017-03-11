<?php
	include("warren.php");
	function widont($str = '') {
		return preg_replace( '|([^\s])\s+([^\s]+)\s*$|', '$1&nbsp;$2', $str);
	}
	$phrase = ellis_complete_phrase();
	$phrasew = widont($phrase);
	$phraseurl = urlencode($phrase);
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

<h1><?php echo $phrasew ?></h1>

<ul class="sharewith">
	<li class="twitter"><a href="http://twitter.com/home?status=<?php echo $phraseurl ?>http%3A%2F%2Ftalklikewarrenellis.com" title="Post to Twitter">Post to Twitter</a></li>
	<li class="delicious"><a href="http://delicious.com/save?v=5&amp;url=http%3A%2F%2Ftalklikewarrenellis.com&amp;title=Talk Like Warren Ellis" title="Share on Delicious">Share on Delicious</a></li>
	<li class="facebook"><a href="http://www.facebook.com/share.php?u=http%3A%2F%2Ftalklikewarrenellis.com&amp;t=Talk Like Warren Ellis" title="Share on Facebook">Share on Facebook</a></li>
	<li class="digg"><a href="http://digg.com/submit?url=http%3A%2F%2Ftalklikewarrenellis.com&amp;title=Talk Like Warren Ellis" title="Digg This">Digg this</a></li>
	<!-- <li class="speech"><a href="http://say.expressivo.com/eric/<?php echo $phraseurl ?>">Hear this</a></li> -->
</ul>

<div id="footer">

	<p class="credits"><small>This page randomly generates a <a href="http://warrenellis.com/">Warren Ellis</a>-like greeting based on his <a href="http://twitter.com/warrenellis/">tweets</a>. All respect and credit for the words here should be given directly to him, we just thought it would be funny to do this. Please don’t destroy us, Mr. Ellis.</small></p>

	<p class="updated"><small>Vocabulary list last updated <?=date("F j, Y",filemtime("warren.php"));?></small></p>

	<p class="credits"><small>A Six-Sided Space Ninja Production by <a href="http://spaceninja.com/">Scott Vandehey</a> and <a href="http://sixsided.org/">Miles Johnson</a>.<br />You can follow us on Twitter: <a href="http://twitter.com/spaceninja">@spaceninja</a> and <a href="http://twitter.com/sixsided">@sixsided</a>.</small></p>

</div>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-10417095-1");
pageTracker._trackPageview();
} catch(err) {}</script>

</body>
</html>
