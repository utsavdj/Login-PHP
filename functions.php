<?php include "db.php"; ?>

<?php

    function createUser(){
        global $connection;
        if(isset($_POST["submit"])){
            $username = $_POST["username"];
            $password = $_POST["password"];

            $username = mysqli_real_escape_string($connection, $username);
            $password = mysqli_real_escape_string($connection, $password);

            $hashFormat = "$6$" . "rounds=5000$";
            $salt = "usesomecrazystringforsalt22";
            $hashF_and_salt= $hashFormat . $salt;
            $password = crypt($password, $hashF_and_salt);

            $query = "INSERT INTO users(username, password) VALUES ('$username', '$password')";
            $result = mysqli_query($connection, $query);

            if(!$result){
                die("Query failed: " . mysqli_error());
            }else{
                echo "User Created.";
            }
        }
    }

    function readData(){
        global $connection;
        $query = "SELECT * FROM users";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query failed: " . mysqli_error());
        }

         while($row = mysqli_fetch_assoc($result)){
             print_r($row);
         }
    }

    function showAllData(){
        global $connection;
        $query = "SELECT * FROM users";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query failed: " . mysqli_error());
        }

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            echo "<option value='$id'>$id</option>";
        }
    }

    function updateData(){
        if(isset($_POST["submit"])) {
            global $connection;
            $username = $_POST['username'];
            $password = $_POST['password'];
            $id = $_POST['id'];

            $username = mysqli_real_escape_string($connection, $username);
            $password = mysqli_real_escape_string($connection, $password);

            $query = "UPDATE users SET username = '$username', ";
            $query .= "password = '$password' WHERE id = '$id'";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("Query failed: " . mysqli_error());
            } else {
                echo "User Updated.";
            }
        }
    }

    function deleteData(){
        if(isset($_POST["submit"])) {
            global $connection;
            $id = $_POST['id'];

            $query = "DELETE FROM users ";
            $query .= "WHERE id = '$id'";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("Query failed: " . mysqli_error());
            } else {
                echo "User Deleted.";
            }
        }
    }
?>