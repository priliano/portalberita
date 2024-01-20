<?php

class Logger
{
    private static $instance = null;
    private static $initiated = false;
    private static $logFile = 'logs/info.log';

    private function __construct()
    {
        // Prevent instance creation
    }

    private static function getInstance($file = null)
    {
        if (self::$instance == null) {
            self::$instance = new self();
            if ($file != null) {
                self::$logFile = $file;
            }
        }

        return self::$instance;
    }

    private static function initiateFile()
    {
        $logDir = dirname(self::$logFile);

        // Check if directory exists, if not, create it
        if (!file_exists($logDir)) {
            mkdir($logDir, 0777, true);
        }

        if (!file_exists(self::$logFile)) {
            $fileHandle = fopen(self::$logFile, 'w') or die("Can't create log file: " . self::$logFile);
            fclose($fileHandle);
        }
        self::$initiated = true;
    }

    private static function rotateFile()
    {
        $fileSize = filesize(self::$logFile);
        // If the file is larger than 5MB, rotate it
        if ($fileSize > 5 * 1024 * 1024) {
            $newFileName = self::$logFile . '.' . date('Y-m-d_H-i-s');
            rename(self::$logFile, $newFileName);
            self::$initiated = false;
        }
    }

    public static function info($message)
    {
        if (self::$instance == null) {
            self::getInstance();
        }

        if (!self::$initiated) {
            self::initiateFile();
        }

        self::rotateFile();

        $time = date('Y-m-d H:i:s');
        $message = $time . " - " . $message . "\n";

        file_put_contents(self::$logFile, $message, FILE_APPEND);
    }
}
