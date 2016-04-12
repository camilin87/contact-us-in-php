<?php
class SettingsReader{
    public function read(){
        return [
            "DB_CONN_STR" => "mysql:host=127.0.0.1;dbname=TddContactUs",
            "DB_USER"     => "root",
            "DB_PWD"      => ""
        ];
    }
}
?>