<?php
    session_start();

    if(isset($_POST["button"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if($username == "admin" && $password == "admin") {
            $_SESSION["access"] = true;
            header("Location: ../index.php"); 
        }else{
            echo"
                <script>
                    alert('Akses ditolak');
                    document.location.href = '../login.php';
                </script>
            ";
        }
    }

    function checkHasAccess() {
        if($_SESSION["access"] != true){
            echo"
                <script>
                    alert('Silahkan login terlebih dahulu')
                    document.location.href = '../login.php'
                </script>
            ";
        }
    }

    function checkHasNoAccess() {
        if(isset($_SESSION["access"])){
            if($_SESSION["access"] != false){
                header("Location: ../index.php");
            }
        }
    }
    
?>