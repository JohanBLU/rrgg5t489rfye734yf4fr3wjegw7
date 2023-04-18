<?php

if (!$_GET['v']) {
	http_response_code(200);
	die();
}

$v = $_GET['v'];
error_log("Video ".$v." requested");

require("func.php");

header("Content-Type: video/3gpp");
header("Content-Disposition: attachment; filename=".$v.".3gp");

$fn = $v.".".uniqid().".3gp";
error_log("[".$v."] Unique filename: ".$v);

error_log("[".$v."] Getting URL (format 18)");
$url = exec("youtube-dl -g -f 18 http://youtu.be/".$v);

error_log("[".$v."] Running FFMPEG");
exec(
	"ffmpeg -hide_banner -i".
	' "'.$url.'" '.
	"-f 3gp -s 352x288 -ar 8000 -ac 1 -y ".$fn." 2>&1",
	$op
);
error_log("[".$v."] Done");
error_log("[".$v."] FFMPEG Log:");
error_log(implode("\n",$op));

echo file_get_contents($fn);
unlink($fn);

?>