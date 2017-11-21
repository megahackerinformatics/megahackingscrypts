<?php
session_start();
session_destroy();
header('Location: ../guestbook/guestbook.html');
?>