<?php

class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "admin";
    private $DB = "portalberita";

    protected $con;

    public function __construct() {
        $this->con = mysqli_connect($this->host, $this->user, $this->pass, $this->DB) or die(mysqli_error());
    }

    public function checkHealth() {
        return (mysqli_ping($this->con)) ? true : false;
    }

    public function excerpt($string) {
        return substr($string, 0, 100) . " ...";
    }

    public function result($query) {
        return mysqli_query($this->con, $query) or die('gagal menampilkan data');
    }

    public function run($query) {
        return (mysqli_query($this->con, $query)) ? true : false;
    }

    public function escape($data) {
        return mysqli_real_escape_string($this->con, $data);
    }

    public function plainText($text) {
        $text = strip_tags($text, '<br><p><li>');
        $text = preg_replace('/<[^>]*>/', PHP_EOL, $text);
        return $text;
    }
}

class Image {
    protected $targetDir = 'uploads';
    protected $allowedFileTypes = ["jpg", "jpeg", "png", "gif"];
    protected $maxFileSize = 500000;

    protected $DB; 

    public function __construct(Database $DB) {
        $this->DB = $DB;
    }

    public function finDById($id) {
        $query = $this->DB->result("SELECT * FROM images WHERE id = $id");
        return mysqli_fetch_assoc($query);
    }

    public function save($fileInputName) {
        $targetFile = $this->targetDir . basename($_FILES[$fileInputName]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
        $this->checkFileType($imageFileType);
        $this->checkFileExistence($targetFile);
        $size = $this->checkFileSize($fileInputName);
    
        if ($this->uploadOk) {
            if (move_uploaded_file($_FILES[$fileInputName]["tmp_name"], $targetFile)) {
                $uploadedFileName = htmlspecialchars(basename($_FILES[$fileInputName]["name"]));
                $fileLocation = $this->targetDir . $uploadedFileName;

                $this->run("INSERT INTO images (filename, filesize, url) VALUES ($uploadedFileName, $size, $fileLocation)");
    
                return "The file $uploadedFileName has been uploaded. Location: $fileLocation";
            } else {
                return "Sorry, there was an error uploading your file.";
            }
        } else {
            return "Sorry, your file was not uploaded.";
        }
    }
    

    private function checkFileType($imageFileType) {
        if (!in_array($imageFileType, $this->allowedFileTypes)) {
            $this->uploadOk = false;
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
    }

    private function checkFileSize($fileInputName) {
        if ($_FILES[$fileInputName]["size"] > $this->maxFileSize) {
            $this->uploadOk = false;
            echo "Sorry, your file is too large.";
        }
        return $_FILES[$fileInputName]["size"];
    }

    private function checkFileExistence($targetFile) {
        if (file_exists($targetFile)) {
            $this->uploadOk = false;
            echo "Sorry, file already exists.";
        }
    }
}

$DB = new Database();
if ($DB->checkHealth()) {
    echo "connected to database";
}

$IMAGE = new Image($DB);
?>
