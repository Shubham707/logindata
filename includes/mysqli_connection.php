<?php
function pr($data,$s =false){
    echo "<pre>";
    print_r($data);
    // if($s)die;
    echo "</pre>";
}
class MysqlDB {

    var $con;
    protected $query;
            function __construct() {
        
    }
    

    function connect() {
        $this->con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    }

    function get_data($query){ //to get data in the form of array of object.
        $data = mysqli_query($this->con, $query);
        //print_r($data);
        if (mysqli_num_rows($data)>0){
            $array= array();
            while($line = mysqli_fetch_object($data)){
                array_push($array, $line);
            }

            return $array;
        }
        else
        {
            return 0;
        }
    }

    function select($fields = '*', $table, $conditons = 1, $single = true) {
        $query = "SELECT ".$fields." FROM $table WHERE " . $conditons;
        $result = mysqli_query($this->con, $query);
        if ($single){
            if($result->num_rows > 0)
                return $result->fetch_assoc();
            else return false;
        }
        else{
            $data = array();
            while($row = $result->fetch_assoc())
                $data[] = $row;
            return $data;
        }

        
        return null;
    }

    function insert($table, $data, $exclude = array()) {
        $fields = $values = array();
        if (!is_array($exclude))
            $exclude = array($exclude);
        foreach (array_keys($data) as $key) {
            if (!in_array($key, $exclude)) {
                $fields[] = "`$key`";
                $values[] = "'" . mysqli_real_escape_string($this->con, $data[$key]) . "'";
            }
        }
        $fields = implode(",", $fields);
        $values = implode(",", $values);
        
        if (mysqli_query($this->con, "INSERT INTO `$table` ($fields) VALUES ($values)")) {
            return array("mysql_error" => false,
                "last_insert_id" => mysqli_insert_id($this->con),
                "mysql_affected_rows" => mysqli_affected_rows($this->con),
                "mysql_info" => mysqli_info($this->con)
            );
        } else {
            return array("mysql_error" => mysqli_error($this->con));
        }
    }

    function queryLog(){
        echo $this->query;
    }

    function update($table,$data,$condition=1){
        $query = "UPDATE `".$table."` SET ";
        foreach($data as $k=>$v){
            $query.= "`$k` = '$v', ";
        }
        $a = $this->query = substr($query,0,strlen($query)-2)." WHERE ".$condition;
        //print_r($a); die();
        if (mysqli_query($this->con, $this->query)) {
            return array("mysql_error" => false,
                "last_insert_id" => mysqli_insert_id($this->con),
                "mysql_affected_rows" => mysqli_affected_rows($this->con),
                "mysql_info" => mysqli_info($this->con),
                'status'=>true
            );
        } else {
            return array('status'=>false,"mysql_error" => mysqli_error($this->con));
        }

    }
    function executeQuery($query = "") {
        $result = mysqli_query($this->con, $query);
        if ($result) {
            return array(
                "result"=>$result,
                "mysql_error" => false,
                "mysql_affected_rows" => mysqli_affected_rows($this->con),
                "mysql_info" => mysqli_info($this->con),
                'status'=>true
            );
        } else {
            return array('status'=>false,"mysql_error" => mysqli_error($this->con));
        }
    }

    function runQuery($fields = '*', $table, $conditons = '', $single = false) {
     $query = "SELECT ".$fields." FROM $table WHERE " . $conditons; 
        $result = mysqli_query($this->con,$query);   
        while($row=mysqli_fetch_assoc($result)) {  
            $resultset[] = $row;
        }       
        if(!empty($resultset))
            return $resultset;
    }

    function runBetween($fields = '*', $table, $from, $to) {

        $query = "SELECT ".$fields." FROM ".$table." WHERE current_date_time between '".$from."' AND '".$to."' "; 
        $result = mysqli_query($this->con,$query);   
        while($row=mysqli_fetch_assoc($result)) {  
            $resultset[] = $row;
        }       
        if(!empty($resultset))
            return $resultset;
    }

    function findKey($array, $keySearch)
    {   foreach ($array as $key => $item) {
            if ($array[$key]['product_name'] == $keySearch) { 
                return true;
            }else{
                return false;
            }
        }
        return false;
    }

    function disconnect() {
        if ($this->con) {
            mysqli_close($this->con);
        }
    }

}
