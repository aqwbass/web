<?php
class seagrass_in_area{
        public $area_ID ;
        public $seagrass_ID;
        public $amount_seagrass;
       

        
        
        //add methond here
        public function seagrass_in_area($area_ID,$seagrass_ID,$amount_seagrass)
        {
                $this->area_ID = $area_ID;
                $this->seagrass_ID = $seagrass_ID;
                $this->amount_seagrass = $amount_seagrass ;
                
                
        }
        public static function getAll_Inarea()
        {
            // จำนวนหญ้าทั้งหมดในพื้นที่ 
                $seagrass_in_arealist = [] ;
                require("connection_connect.php");
                $sql = "SELECT seagrass_in_area.area_ID,SUM(seagrass_in_area.amount_seagrass)AS  amount_seagrass FROM `seagrass_in_area`
GROUP BY seagrass_in_area.area_ID";
                $result = $conn->query($sql);
                while($my_row=$result->fetch_assoc())
                {
                     $area_ID =$my_row['area_ID'];
                     $amount_seagrass =$my_row['amount_seagrass'];
                     $seagrass_in_arealist[]=new seagrass_in_area($area_ID,NULL ,$amount_seagrass);
                }
                require("connection_close.php");
                return $seagrass_in_arealist;
        }
        public static function getAll_Seagrass()
        {
            // จำนวนหญ้าทั้งหมดในพื้นที่ 
                $seagrass_in_arealist = [] ;
                require("connection_connect.php");
                $sql = "SELECT seagrass_in_area.seagrass_ID,SUM(seagrass_in_area.amount_seagrass)AS  amount_seagrass FROM `seagrass_in_area`
                GROUP BY seagrass_in_area.seagrass_ID";
                $result = $conn->query($sql);
                while($my_row=$result->fetch_assoc())
                {
                     $seagrass_ID =$my_row['seagrass_ID'];
                     $amount_seagrass =$my_row['amount_seagrass'];
                     $seagrass_in_arealist[]=new seagrass_in_area( NULL,$seagrass_ID,$amount_seagrass);
                }
                require("connection_close.php");
                return $seagrass_in_arealist;
        }
        public static function getAll()
        {
            // จำนวนหญ้าทั้งหมดในพื้นที่ 
                $seagrass_in_arealist = [] ;
                require("connection_connect.php");
                $sql = "SELECT * FROM `seagrass_in_area`";
                $result = $conn->query($sql);
                while($my_row=$result->fetch_assoc())
                {
                    $area_ID =$my_row['area_ID'];
                    $seagrass_ID =$my_row['seagrass_ID'];
                     $amount_seagrass =$my_row['amount_seagrass'];
                     $seagrass_in_arealist[]=new seagrass_in_area($area_ID,$seagrass_ID,$amount_seagrass);
                }
                require("connection_close.php");
                return $seagrass_in_arealist;
        }
        
        public static function Add($area_ID,$seagrass_ID,$amount_seagrass)
    {
        require("connection_connect.php");
        $sql = "INSERT INTO `seagrass_in_area`(`area_ID`, `seagrass_ID`, `amount_seagrass`) 
        VALUES ($area_ID,$seagrass_ID,$amount_seagrass)";
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
    public static function get($area_ID,$seagrass_ID) {
        require("connection_connect.php"); 
       $sql = "SELECT  * FROM seagrass_in_area  WHERE seagrass_ID = $seagrass_ID AND area_ID = $area_ID"; 
       $result = $conn ->query($sql) ;
        $my_row = $result -> fetch_assoc() ;
        $area_ID =$my_row['area_ID']; 
        $seagrass_ID =$my_row['seagrass_ID'];
        $amount_seagrass =$my_row['amount_seagrass'];
       require ("connection_close.php");
        return new seagrass_in_area($area_ID,$seagrass_ID,$amount_seagrass); }

    public static function update($area_ID,$seagrass_ID,$amount_seagrass)
    {
        
        require("connection_connect.php");
        $sql="UPDATE `seagrass_in_area` SET `seagrass_ID`= $seagrass_ID,`area_ID`=$area_ID,`amount_seagrass`=$amount_seagrass
         WHERE seagrass_ID = $seagrass_ID AND area_ID = $area_ID";
        $result=$conn->query($sql);
        require("connection_close.php");
        return "$result";
    }
    public static function delete($area_ID,$seagrass_ID)
    {
        require("connection_connect.php");
        $sql ="DELETE from seagrass_in_area Where  seagrass_ID = $seagrass_ID AND area_ID = $area_ID";
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