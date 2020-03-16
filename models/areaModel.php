<?php
class area{
        public $area_ID ;
        public $area_Name ;
        public $generality ;
        public $distance ;
        public $size_area ;
        
        //add methond here
        public function area($area_ID,$area_Name,$generality,$distance,$size_area)
        {
                $this->area_ID = $area_ID;
                $this->area_Name = $area_Name ;
                $this->generality = $generality ;
                $this->distance = $distance ;
                $this->size_area = $size_area ;
                
        }
        public static function getAll()
        {
                $arealist = [] ;
                require("connection_connect.php");
                $sql = "SELECT * from area";
                $result = $conn->query($sql);
                while($my_row=$result->fetch_assoc())
                {
                     $area_ID =$my_row['area_ID'];
                     $area_Name =$my_row['area_Name'];
                     $generality =$my_row['generality'];
                     $distance =$my_row['distance'];
                     $size_area =$my_row['size_area'];

                     $arealist[]=new area($area_ID,$area_Name,$generality,$distance,$size_area);
                }
                require("connection_close.php");
                return $arealist;
        }
        public static function Add($area_Name,$generality,$distance,$size_area)
    {
        require("connection_connect.php");
        $sql = "INSERT INTO `area`(`area_Name`, `generality`, `distance`,`size_area`)
        VALUES ('$area_Name','$generality',$distance,$size_area)";
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
    public static function get($area_ID) {
        require("connection_connect.php"); 
       $sql = "SELECT  * FROM area  WHERE area_ID = $area_ID"; 
       $result = $conn ->query($sql) ;
        $my_row = $result -> fetch_assoc() ; 
        $area_ID =$my_row['area_ID'];
        $area_Name =$my_row['area_Name'];
        $generality =$my_row['generality'];
        $distance =$my_row['distance']; 
        $size_area =$my_row['size_area']; 

       require ("connection_close.php");
        return new area($area_ID,$area_Name,$generality,$distance,$size_area); }

    public static function update($area_ID,$area_Name,$generality,$distance,$size_area)
    {
        
        require("connection_connect.php");
        $sql="UPDATE `area` SET `area_ID`= $area_ID,`area_Name`='$area_Name',`generality`='$generality',`distance`=$distance,`size_area`=$size_area
         WHERE area_ID = $area_ID";
        $result=$conn->query($sql);
        require("connection_close.php");
        return "$result";
    }
    public static function delete($area_ID)
    {
        require("connection_connect.php");
        $sql ="DELETE from area Where area_ID=$area_ID";
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