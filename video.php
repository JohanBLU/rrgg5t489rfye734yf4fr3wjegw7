<?php

if (!$_GET['v']) {
	http_response_code(200);
	die();
}

require("func.php");
require("head.php");

$v = $_GET['v'];

$vj = YTgetvidjson($v);

?>

<table>
	<tr>
		<td align=middle valign=top><a href="#downloads">
			<img src="/thumbnail.php?v=<?php echo $v ?>">
		</a></td>
		<td>
			<b><?php echo $vj["title"] ?></b><br>
			<?php echo $vj["uploader"] ?><br>
			<br>
			<?php echo nl2br(htmlspecialchars($vj["description"])) ?>
		</td>
	</tr>
</table><br>
<br>

<a id=downloads></a>
<a href="watch3gp.php?v=<?php echo $v ?>">Watch this video (3gp)</a>

<!--
<b>Formats directly availible from YouTube (advanced):</b><br>
<ul>
<?php
/*	foreach ($vj['formats'] as $f) {
?>
	<li><a href="<?php echo $f['url'] ?>">
		<?php echo $f['format'] ?>;
		.<?php echo $f['ext'] ?> file;
		vcodec <?php echo $f['vcodec'] ?>, acodec <?php echo $f['acodec'] ?>
	</a></li>
<?php
	}
?>
</ul>
<?php
echo plaintext2html(var_export($vj, true)); */
?>
-->