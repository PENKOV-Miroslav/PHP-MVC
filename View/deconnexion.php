<?php
session_destroy();
$redirection = '?action=authentification'; // Redirection en cas d'erreur
header("Location: $redirection");
exit;
