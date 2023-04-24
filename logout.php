<?php
session_start();
include('connect.php');
$_SESSION['email']=="";
session_unset();
session_destroy();
?>
<script language="javascript">
document.location="./index.php";
</script>