<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $servername = 'localhost';
            $username = 'root';
            $password = '1234';
            
            try {
                $conn = new PDO('mysql:host=localhost;dbname=testdb', $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
            
            require_once 'Tree.php';
            
            $tree = new Tree($conn);  // создание дерева по таблице

        ?>
    </body>
</html>
