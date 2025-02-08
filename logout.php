<?php
session_start();
session_destroy();
header('Location: /codepad/index.html');
exit;
?>