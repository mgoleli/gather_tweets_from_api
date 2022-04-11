<?php 
class Connection {
    private $dbHost;
    private $dbUser;
    private $dbPass;
    private $dbName;
    private $charset;
    public $db = null;

    function __construct()
    {
        try {
            $this->dbHost = "localhost";
            $this->dbUser = "root";
            $this->dbPass = "";
            $this->dbName = 'proje';
            $this->charset = 'Utf8';

            $this->db = new PDO("mysql:host=$this->dbHost;dbname=$this->dbName;charset=$this->charset", $this->dbUser, $this->dbPass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
    function myQuery(string $sql, array $params = [])
    {
        $query = $this->db->prepare($sql);
        $query->execute($params);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    function myQueryAll(string $sql, array $params = []):array
    {
        $query = $this->db->prepare($sql);
        $query->execute($params);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


}