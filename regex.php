<?php

if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
	$regex = $_POST['regex'];
	$content = $_POST['content'];
	preg_match_all($regex, $content, $matches);
	$res = print_r($matches);
}

$regex = htmlentities($regex);
$content = htmlentities($content);
$res = htmlentities($res);

echo <<<END_OF_HTML
<html>
<body>
<form action="" method="post">
	<div><input name="regex" value="$regex" size="80"></div>
	<div><textarea rows="20" cols="80" name="content">$content</textarea></div>
	<div>$res</div>
</form>
</body>
</html>
END_OF_HTML;
