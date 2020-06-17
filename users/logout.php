<?php
if(isset ($_COOKIE["login"])) {
	setcookie("login", "", 0, "/");
	header("Location: /");
}

?>
