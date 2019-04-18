<?php
try{
                $db=new PDO(
                    "mysql:dbname=ffbsq;host=localhost",
                    "root",
                    "root",
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")

                );


            }catch(PDOException $exception){
                echo "Erreur:".$exception->getMessage();
            }
?>