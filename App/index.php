<?php 


// // use App\SQLiteConnection;
// use App\SQLiteConnection;
// $pdo = (new SQLiteConnection())->connect();
// if ($pdo != null)
//     echo 'Connected to the SQLite database successfully!';
// else
//     echo 'Whoops, could not connect to the SQLite database!';

use App\Config;

echo Config::PATH_TO_SQLITE_FILE;