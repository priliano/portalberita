<?php
class Database
{
    private $host = "127.0.0.1";
    private $user = "root";
    private $pass = "admin";
    private $DB = "portalberita";

    private $con;

    public function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->pass, $this->DB) or die(mysqli_error($this->con));
    }

    public function con()
    {
        return $this->con;
    }

    public function checkHealth()
    {
        return mysqli_ping($this->con);
    }

    public function excerpt($string)
    {
        return substr($string, 0, 100) . " ...";
    }

    public function query($query)
    {
        return mysqli_query($this->con, $query);
    }

    public function escape($data)
    {
        return mysqli_real_escape_string($this->con, $data);
    }

    public function plainText($text)
    {
        $text = strip_tags($text, '<br><p><li>');
        $text = preg_replace('/<[^>]*>/', PHP_EOL, $text);
        return $text;
    }
}
