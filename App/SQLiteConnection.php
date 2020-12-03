<?php

namespace App;


/**
 * SQLite connnection
 */
class SQLiteConnection {
    /**
     * PDO instance
     * @var type 
     */
    private $pdo;

    /**
     * return in instance of the PDO object that connects to the SQLite database
     * @return \PDO
     */
    public function connect($path_prefix) {
        if ($this->pdo == null) {
            $this->pdo = new \PDO("sqlite:" . \App\Config::pathToSQLiteFile($path_prefix) );
        }
         return $this->pdo;

    }
}

// new SQLiteConnection();
// (new SQLiteConnection())->connect();
// // $pdo = (new SQLiteConnection())->connect();
// //print_r($pdo);
// $ret = Config::PATH_TO_SQLITE_FILE;
