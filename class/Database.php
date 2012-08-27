<?php
class Database {

    private $_mySqlLink;

    public function __construct() {
        require_once 'include/db.php';
        $this->_mySqlLink = mysql_connect($server, $username, $password);
        if (!$this->_mySqlLink) die('Error connecting to database');
        if (!mysql_select_db($database, $this->_mySqlLink)) die('Error selecting database');
    }

    public function fetch_single($query_string) {
        $result = mysql_query($query_string, $this->_mySqlLink);
        return mysql_fetch_assoc($result);
    }

    public function fetchAll($queryString) {
        $result = mysql_query($queryString, $this->_mySqlLink);
        while ( ($row = mysql_fetch_assoc($result)) ) {
            $returnArray[] = $row;
        }
        return $returnArray;
    }

    public function query($query_string) {
        return mysql_query($query_string);
    }
}
