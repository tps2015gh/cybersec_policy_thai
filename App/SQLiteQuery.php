<?php
namespace App;

/**
 * PHP SQLite Query Demo
 *  REF :  https://www.sqlitetutorial.net/sqlite-php/query/
 */
class SQLiteQuery {

    /**
     * PDO object
     * @var \PDO
     */
    private $pdo;

    /**
     * Initialize the object with a specified PDO object
     * @param \PDO $pdo
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    /**
     * Get the project as an object list
     * @return an array of Project objects
     */
    public function getChildNodes($parent_node_id) {
        // print_r($this->pdo);
        try{ 

            $stmt = $this->pdo->prepare( ' Select * from nodes '
                 . '  WHERE parent_node_id = :parent_node_id ');
        }
        catch (PDOException $e)
        {
            echo "Db Prepare Error: " . $e->getMessage();
            die();
        }

        if(!$stmt){
            echo " <h2>Error stmt is emepty </h2>";
        }
        $ar_bind = [':parent_node_id' => $parent_node_id] ; 
        $stmt->execute( $ar_bind );

        $child_nodes = [];
        while ($node = $stmt->fetchObject()) {
            $child_nodes[] = $node;
        }

        return $child_nodes;
    }
}// class 