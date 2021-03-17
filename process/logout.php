<?php

    include("../include/connection.php");
    //if(isset($_POST['logout'])){
        session_destroy();
        session_destroy();
     //  echo "<script>document.location='index.php'</script>";
    //}
    ?>

<script type="text/javascript">
   window.location = "../index.php"
</script>