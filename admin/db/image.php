<?php

class Image
{
    protected $targetDir = "uploads/";
    protected $allowedFileTypes = ["jpg", "jpeg", "png", "gif"];
    protected $maxFileSize = 500000;
    protected $uploadOk = true;

    protected mysqli $con;

    public function __construct($con, $targetDir)
    {
        $this->con = $con;
        $this->targetDir = $targetDir;

        if (!file_exists($this->targetDir)) {
            mkdir($this->targetDir, 0777, true);
        }
    }

    public function list()
    {
        $stmt = $this->con->prepare("SELECT * FROM images");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function findById($id)
    {
        $stmt = $this->con->prepare("SELECT * FROM images WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function save($fileInputName, $alt)
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
                $fileLocation = ltrim($this->targetDir . $uploadedFileName, '../');

                $stmt = $this->con->prepare("INSERT INTO images (filename, size, url, alt) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("siss", $uploadedFileName, $size, $fileLocation, $alt);
                $stmt->execute();

                // Get the ID of the inserted image
                $imageId = $this->con->insert_id;

                return $imageId;
            } else {
                return "Sorry, there was an error uploading your file.";
            }
        } else {
            return "Sorry, your file was not uploaded.";
        }
    }

    public function delete($id)
    {
        // First, get the image record to find the file location
        $qry = "SELECT * FROM images WHERE id = ?";
        $stmt = mysqli_prepare($this->con, $qry);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $image = mysqli_fetch_assoc($result);

        if ($image) {
            // Delete the file from the server
            $fileLocation = $image['url'];
            if (file_exists($fileLocation)) {
                unlink($fileLocation);
            }

            // Delete the record from the database
            $qry = "DELETE FROM images WHERE id = ?";
            $stmt = mysqli_prepare($this->con, $qry);
            mysqli_stmt_bind_param($stmt, 'i', $id);
            return mysqli_stmt_execute($stmt);
        } else {
            return false;
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
