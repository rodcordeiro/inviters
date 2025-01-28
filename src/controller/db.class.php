<?php
class DBClass
{
    public $connection;

    // get the database connection
    public function getConnection()
    {
        $host = getenv('CONN_URI');
        $username = getenv('CONC_MYSQL_USER');
        $password = getenv('CONC_MYSQL_PASSWORD');
        $database = getenv('CONC_MYSQL_DATABASE');

        $this->connection = null;

        try {
            $this->connection = new PDO("mysql:host=" . $host . ";dbname=" . $database, $username, $password);
            $this->connection->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Error: " . $exception->getMessage();
        }

        return $this->connection;
    }
}
