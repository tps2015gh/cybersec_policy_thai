<?php
namespace App;

class Config {
   /**
    * path to the sqlite file
    */
    private const PATH_TO_SQLITE_FILE = './DB/sqlitedb1.db' ;
    static function pathToSQLiteFile( $prefix_path ){
        return $prefix_path . "/".  Config::PATH_TO_SQLITE_FILE;
    }
}
