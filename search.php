<?php

if ($_GET["q"]) {
	
	require("func.php");
	require("head.php");

	?><table>
<?php

	foreach (YTsearch($_GET["q"],10)["results"] as $r) {
		YTrenderResult($r);
	}

	?></table>
<?php

} else {

?>
<b>No search query</b>
<meta http-equiv="refresh" content="2; url=/"/>
<?php
	die();

}

?>