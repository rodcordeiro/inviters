<?php
class InviteService{

    // Connection instance
    private $connection;

    // table name
    private $table_name = "smsMessages";

    // table columns
    public $id;
    public $content;
    public $createdAt; 
    public $updatedAt;

    public function __construct($connection){
        $this->connection = $connection;
    }

    //C
    public function create(){
      $query = "INSERT INTO `" . $this->table_name . "`(content) VALUES ('". $this->content ."')";
      $stmt = $this->connection->prepare($query);
      try{
        $stmt->execute();
      }catch(PDOException $exception){
        echo "Error: " . $exception->getMessage();
      }
      return $stmt;
    }
    //R
    public function read(){
        $query = "SELECT * FROM `" . $this->table_name . "`;";
        $stmt = $this->connection->prepare($query);

        $stmt->execute();
        $count = $stmt->rowCount();
        
        $msgs = array();
        $msgs["messages"] = array();
        $msgs["count"] = $count;
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          extract($row);
          $p = array(
            "id" => $id,
            "content" => $content,
            "createdAt" => $createdAt,
            "updatedAt" => $updatedAt
          );
          array_push($msgs["messages"], $p);
        }
        return $msgs;
    }
    //U
    public function update(){}
    //D
    public function delete(){}
}
?>