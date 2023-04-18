<?php

function plaintext2html($t) {
	return nl2br(htmlspecialchars($t));
}

function YTsearch($query, $number) {
	exec(
		'youtube-dl -j --flat-playlist '.
		escapeshellarg(
			'ytsearch'.
				$number.
				':'.
				$query
		),
		$jses
	);
	$jses = '{"results":['.implode(",", $jses).']}';
	return json_decode($jses, true);
}

function YTgetvidjson($v) {
	exec('youtube-dl -j http://youtu.be/'.$v, $jses);
	$jses = implode("", $jses);
	return json_decode($jses, true);
}

function YTrenderResult($result) {
?>
	<tr>
		<td align=middle valign=middle><a href="/video.php?v=<?php echo $result["id"] ?>">
			<img src="/thumbnail.php?v=<?php echo $result["id"] ?>">
		</a></td>
		<td>
			<a href="/video.php?v=<?php echo $result["id"] ?>">
				<b><?php echo $result["title"] ?></b>
			</a><br>
			<?php echo $result["uploader"] ?><br>
			<br>
		</td>
	</tr>
<?php
}

?>