<?php
class staff{
        public $staff_ID ;
        public $staff_team_ID ;
        public $staff_Name ;
        public $staff_Date ;
        
        //add methond here
        public function staff($staff_ID,$staff_team_ID,$staff_Name,$staff_Date)
        {
                $this->staff_ID = $staff_ID;
                $this->staff_team_ID = $staff_team_ID ;
                $this->staff_Name = $staff_Name ;
                $this->staff_Date = $staff_Date ;
                
        }
        public static function getAll()
        {
                $stafflist = [] ;
                require("connection_connect.php");
                $sql = "SELECT * from staff";
                $result = $conn->query($sql);
                while($my_row=$result->fetch_assoc())
                {
                     $staff_ID =$my_row['staff_ID'];
                     $staff_team_ID =$my_row['staff_team_ID'];
                     $staff_Name =$my_row['staff_Name'];
                     $staff_Date =$my_row['staff_Date'];
                     $stafflist[]=new staff($staff_ID,$staff_team_ID,$staff_Name,$staff_Date);
                }
                require("connection_close.php");
                return $stafflist;
        }
        public static function Add($staff_Name,$staff_Date)
    {
        require("connection_connect.php");
        $sql = "INSERT INTO `staff`( `staff_Name`, `staff_Date`)
        VALUES ('$staff_Name','$staff_Date')";
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
    public static function get($staff_ID) {
        require("connection_connect.php"); 
       $sql = "SELECT  * FROM staff  WHERE staff_ID = $staff_ID"; 
       $result = $conn ->query($sql) ;
        $my_row = $result -> fetch_assoc() ; 
        $staff_ID =$my_row['staff_ID'];
        $staff_team_ID =$my_row['staff_team_ID'];
        $staff_Name =$my_row['staff_Name'];
        $staff_Date =$my_row['staff_Date']; 
       require ("connection_close.php");
        return new staff($staff_ID,$staff_team_ID,$staff_Name,$staff_Date); }

    public static function update($staff_ID,$staff_Name,$staff_Date)
    {
        
        require("connection_connect.php");
        $sql="UPDATE `staff` SET `staff_ID`= $staff_ID,`staff_Name`='$staff_Name',`staff_Date`='$staff_Date'
         WHERE staff_ID = $staff_ID";
        $result=$conn->query($sql);
        require("connection_close.php");
        return "$result";
    }
    public static function delete($staff_ID)
    {
        require("connection_connect.php");
        $sql ="DELETE from staff Where staff_ID=$staff_ID";
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