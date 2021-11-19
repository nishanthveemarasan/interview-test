<?php
class DbConn
{
    //connect to database
    protected function connect()
    {

        $dbUsername = 'root';
        $dbPassword = '';
        $dbHost = 'localhost';
        $dbName = 'test_db';
        $dbConnection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        if (!$dbConnection) {
            print_r("MYSQL Conncetion error: " . $dbConnection->connect_error . "</br>");
            exit();
        }
        return $dbConnection;
    }
}
