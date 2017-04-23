<?php $_SESSION = array();
if (isset($_COOKIE[session_name()])) {
	setcookie(session_name(), '', time()-42000, '/');
}
session_destroy();
?>
<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="1; url=http://enos.itcollege.ee/~rpurge/kontrolleriga/kontroller.php?page=pealeht">
        <script type="text/javascript">
            window.location.href = "http://enos.itcollege.ee/~rpurge/kontrolleriga/kontroller.php?page=pealeht"
        </script>
        <title>Page Redirection</title>
    </head>