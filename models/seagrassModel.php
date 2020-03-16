<?php
class seagrass{
        public $seagrass_ID ;
        public $seagrass_name ;
        
        
        //add methond here
        public function seagrass($seagrass_ID,$seagrass_name)
        {
                $this->seagrass_ID = $seagrass_ID;
                $this->seagrass_name = $seagrass_name ;
                
                
        }
        public static function getAll()
        {
                $seagrasslist = [] ;
                require("connection_connect.php");
                $sql = "SELECT * from seagrass";
                $result = $conn->query($sql);
                while($my_row=$result->fetch_assoc())
                {
                     $seagrass_ID =$my_row['seagrass_ID'];
                     $seagrass_name =$my_row['seagrass_name'];
                     
                     $seagrasslist[]=new seagrass($seagrass_ID,$seagrass_name);
                }
                require("connection_close.php");
                return $seagrasslist;
        }
        public static function Add($seagrass_name)
    {
        require("connection_connect.php");
        $sql = "INSERT INTO `seagrass`(`seagrass_name`)
        VALUES ('$seagrass_name')";
        $result= $conn->query($sql);
        if($result === TRUE)
        {
            
            echo "<script>alert('Add success');</script>";
            
             
        }
        else 
        echo "Error :".$sql."<br>".$conn->error;
        require("connection_close.php");
        return "add success $result rows";
    }
    public static function get($seagrass_ID) {
        require("connection_connect.php"); 
       $sql = "SELECT  * FROM seagrass  WHERE seagrass_ID = '$seagrass_ID'"; 
       $result = $conn ->query($sql) ;
        $my_row = $result -> fetch_assoc() ; 
        $seagrass_ID =$my_row['seagrass_ID'];
        $seagrass_name =$my_row['seagrass_name'];
       require ("connection_close.php");
        return new seagrass($seagrass_ID,$seagrass_name); }

    public static function update($seagrass_ID,$seagrass_name)
    {
        
        require("connection_connect.php");
        $sql="UPDATE `seagrass` SET `seagrass_ID`= '$seagrass_ID',`seagrass_name`='$seagrass_name'
         WHERE seagrass_ID = $seagrass_ID";
        $result=$conn->query($sql);
        require("connection_close.php");
        return "$result";
    }
    public static function delete($seagrass_ID)
    {
        require("connection_connect.php");
        $sql ="DELETE from seagrass Where seagrass_ID=$seagrass_ID";
        $result=$conn->query($sql);
        require("connection_close.php");
        return "delete success $result row";
    }/*
    public static function get($cus_ID) {
        require("connection_connect.php"); 
       $sql = "SELECT  * FROM customers  WHERE cus_ID = $cus_ID"; 
       $result = $conn ->query($sql) ;
        $my_row = $result -> fetch_assoc() ; 
        $cus_ID =$my_row['cus_ID'];
        $cus_Fname =$my_row['cus_Fname'];
        $cus_Lname =$my_row['cus_Lname'];
        $cus_BDate =$my_row['cus_BDate'];
        $cus_Gender=$my_row['cus_Gender'] ;
        $cus_Nphone =$my_row['cus_Nphone'];
        $cus_Email =$my_row['cus_Email'];
        $Trainer_ID =$my_row['Trainer_ID'];  
       require ("connection_close.php");
        return new customer($cus_ID,$cus_Fname,$cus_Lname,$cus_BDate,$cus_Gender,$cus_Nphone,$cus_Email,$Trainer_ID); }
        */
}
?>