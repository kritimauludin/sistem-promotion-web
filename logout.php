<?php
session_start();

// mengkosongkan variabel data pada sesion
session_unset();

//menghapus seluruh data yang teregristasi disession
session_destroy();

header("Location: index.php");
exit;

?>