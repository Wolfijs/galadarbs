<?php
class Database
{
    protected $host;
    protected $user;
    protected $pass;
    protected $dbname;
    public $conn;

    public function __construct()
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->pass = "";
        $this->dbname = "darbs";
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

        // Check for connection errors
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function closeConnection()
    {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
?>
