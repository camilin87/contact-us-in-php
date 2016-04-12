<?php 
class DbConnectionFactory {
    public function createNew($dbConnStr, $dbUser, $dbPwd){
        return new PDO($dbConnStr, $dbUser, $dbPwd);
    }
}
?>