<?php
namespace App;

/**
 * PHP SQLite Insert Demo
 */
class SQLiteInsert {

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
     * Insert a new project into the projects table
     * @param string $projectName
     * @return the id of the new project
     */
    public function insertProject($projectName) {
        $sql = 'INSERT INTO projects(project_name) VALUES(:project_name)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':project_name', $projectName);
        $stmt->execute();

        return $this->pdo->lastInsertId();
    }

    /**
     * Insert a new task into the tasks table
     * @param type $taskName
     * @param type $startDate
     * @param type $completedDate
     * @param type $completed
     * @param type $projectId
     * @return int id of the inserted task
     */
    public function insertTask($taskName, $startDate, $completedDate, $completed, $projectId) {
        $sql = 'INSERT INTO tasks(task_name,start_date,completed_date,completed,project_id) '
                . 'VALUES(:task_name,:start_date,:completed_date,:completed,:project_id)';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':task_name' => $taskName,
            ':start_date' => $startDate,
            ':completed_date' => $completedDate,
            ':completed' => $completed,
            ':project_id' => $projectId,
        ]);

        return $this->pdo->lastInsertId();
    }
    /**
     * Insert a new task into the tasks table
     * @param type $node_id
     * @param type $parent_node_id
     * @param type $node_text
     * @param type $node_level
     * @param type $status
     * @return int id of the inserted task
     */    
    public function insertNode($parent_node_id,$node_text) {
        $sql = 'INSERT INTO nodes( parent_node_id,node_text,node_level,status) '
                .' VALUES( :parent_node_id,:node_text,:node_level,:status)';

        $stmt = $this->pdo->prepare($sql);
        $node_level = 0 ;
        $status = "ok";
        $stmt->execute([
            ':parent_node_id' => $parent_node_id
            ,':node_text' => trim($node_text)
            ,':node_level' => $node_level
            ,':status' => $status
        ]);
        $last_id = $this->pdo->lastInsertId();
        echo "<br>insert node . last_id=$last_id  $node_text";
        return $last_id ;
    }
    public function deleteAllNode() {
        $sql = 'DELETE  from nodes';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $this->pdo->lastInsertId();
    }    
}