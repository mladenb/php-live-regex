<?php

if (get_magic_quotes_gpc()) {
    function stripslashes_gpc(&$value)
    {
        $value = stripslashes($value);
    }
    array_walk_recursive($_GET, 'stripslashes_gpc');
    array_walk_recursive($_POST, 'stripslashes_gpc');
    array_walk_recursive($_COOKIE, 'stripslashes_gpc');
    array_walk_recursive($_REQUEST, 'stripslashes_gpc');
}

if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
	$regex = $_POST['regex'];
	$content = $_POST['content'];
	preg_match_all($regex, $content, $matches);
	$res = print_r($matches, true);
}

$regex = htmlentities($regex);
$content = htmlentities($content);
$res = nl2br(htmlentities($res));

echo <<<END_OF_HTML
<html>
<body>
<form action="" method="post">
	<div><input name="regex" value="$regex" placeholder="Regular expression..." style="width: 100%"></div>
	<div><textarea rows="20" name="content" style="width: 100%" placeholder="Content...">$content</textarea></div>
	<div style="background-color: #efefef; min-height:10em">$res</div>
</form>
</body>
</html>
END_OF_HTML;
