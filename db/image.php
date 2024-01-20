<?php

class Image
{
    protected $targetDir = "uploads/";
    protected $allowedFileTypes = ["jpg", "jpeg", "png", "gif"];
    protected $maxFileSize = 500000;
    protected $uploadOk = true;

    protected mysqli $con;

    public function __construct($con)
    {
        $this->con = $con;

        if (!file_exists($this->targetDir)) {
            mkdir($this->targetDir, 0777, true);
        }
    }

    public function findById($id)
    {
        $stmt = $this->con->prepare("SELECT * FROM images WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function save($fileInputName)
    {
        if (!is_uploaded_file($_FILES[$fileInputName]["tmp_name"])) {
            return "File upload failed.";
        }

        $targetFile = $this->targetDir . basename($_FILES[$fileInputName]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $this->checkFileType($imageFileType);
        $this->checkFileExistence($targetFile);
        $size = $this->checkFileSize($fileInputName);

        if ($this->uploadOk) {
            if (move_uploaded_file($_FILES[$fileInputName]["tmp_name"], $targetFile)) {
                $uploadedFileName = htmlspecialchars(basename($_FILES[$fileInputName]["name"]));
                $fileLocation = $this->targetDir . $uploadedFileName;

                $stmt = $this->con->prepare("INSERT INTO images (filename, size, url) VALUES (?, ?, ?)");
                $stmt->bind_param("sis", $uploadedFileName, $size, $fileLocation);
                $stmt->execute();

                return "The file $uploadedFileName has been uploaded. Location: $fileLocation";
            } else {
                return "Sorry, there was an error uploading your file.";
            }
        } else {
            return "Sorry, your file was not uploaded.";
        }
    }


    private function checkFileType($imageFileType)
    {
        if (!in_array($imageFileType, $this->allowedFileTypes)) {
            $this->uploadOk = false;
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
    }

    private function checkFileSize($fileInputName)
    {
        if ($_FILES[$fileInputName]["size"] > $this->maxFileSize) {
            $this->uploadOk = false;
            echo "Sorry, your file is too large.";
        }
        return $_FILES[$fileInputName]["size"];
    }

    private function checkFileExistence($targetFile)
    {
        if (file_exists($targetFile)) {
            $this->uploadOk = false;
            echo "Sorry, file already exists.";
        }
    }
}
