<?php

if (!$_GET['v']) {
	http_response_code(200);
	die();
}

header("Content-Type: image/jpeg");

passthru(
	"curl ".
	"https://img.youtube.com/vi/".$_GET['v']."/3.jpg"
);

?>