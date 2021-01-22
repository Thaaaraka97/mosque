<?php
class databases{
    public $con;
    public $errors = array();

    private $host = "localhost";
    private $db_name = "db_mosque";
    private $username = "root";
    private $password = "";

    public function __construct()
    {
        $this->con = mysqli_connect($this->host,$this->username,$this->password,$this->db_name);
        if (!$this->con) {
            array_push($this->errors,mysqli_connect_error($this->con)) ;
            echo "database error";
        }
    }

    private $string;
    //Data insert class
    public function insert_data($table_name, $data){
        $this->string = "INSERT INTO ".$table_name." (";
        $this->string .= implode(",",array_keys($data)). ') VALUES (';
        $this->string .= "'". implode("','", array_values($data)). "')";

        if ( mysqli_query($this->con, $this->string) ) {
            return true;
        }
        else {
            array_push($this->errors,mysqli_error($this->con));
            echo "insert error";
        }
    }

    private $array = array();
    //Data retrieve class
    public function select_data($table_name){
        $query = "SELECT * FROM ".$table_name."";
        $result = mysqli_query($this->con,$query);
        if (!$result) {
            array_push($this->errors,mysqli_error($this->con));
        }
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($this->array,$row);
        }
        return $this->array;
    }

}
