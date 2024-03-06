<?php
//menghapus session user yang telalh login lalu mengarahkan ke halaman login
session_destroy();
header("Location: login.php");
