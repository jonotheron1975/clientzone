<?php
$password = '@Barbara@';

$hash = password_hash($password, PASSWORD_DEFAULT);

echo $hash;
?>