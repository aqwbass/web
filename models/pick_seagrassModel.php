<?php
class pick_seagrass{
        public $pickID ;
        public $staffID ;
        public $areaID ;
        public $seagrassID ;
        public $amount ;
        public $date_pick ;

        
        //add methond here
        public function pick_seagrass($pickID,$staffID,$areaID,$seagrassID,$amount,$date_pick)
        {
                $this->pickID = $pickID;
                $this->staffID = $staffID ;
                $this->areaID = $areaID ;
                $this->seagrassID = $seagrassID ;
                $this->amount = $amount ;
                $this->date_pick = $date_pick ;

                
        }
        public static function getAll()
        {
                $pick_seagrasslist = [] ;
                require("connection_connect.php");
                $sql = "SELECT * from pick_seagrass";
                $result = $conn->query($sql);
                while($my_row=$result->fetch_assoc())
                {
                     $pickID =$my_row['pickID'];
                     $staffID =$my_row['staffID'];
                     $areaID =$my_row['areaID'];
                     $seagrassID =$my_row['seagrassID'];
                     $amount =$my_row['amount'];
                     $date_pick =$my_row['date_pick'];


                     $arealist[]=new pick_seagrass($pickID,$staffID,$areaID,$seagrassID,$amount,$date_pick);
                }
                require("connection_close.php");
                return $pick_seagrasslist;
        }
        public static function getAllDate()
        {
                $pick_seagrasslist = [] ;
                require("connection_connect.php");
                $sql = "SELECT SUM(pick_seagrass.amount)as pick,SUM(seagrass_in_area.amount_seagrass) as have,pick_seagrass.date_pick FROM `pick_seagrass`,seagrass_in_area 
                WHERE pick_seagrass.seagrassID = seagrass_in_area.seagrass_ID
                AND pick_seagrass.areaID = seagrass_in_area.area_ID
                GROUP BY pick_seagrass.date_pick";
                $result = $conn->query($sql);
                while($my_row=$result->fetch_assoc())
                {
                     
                     $have =$my_row['have'];
                     $pick =$my_row['pick'];
                     $date_pick =$my_row['date_pick'];


                     $pick_seagrasslist[]=new pick_seagrass(NULL,$have,$pick,NULL,NULL,$date_pick);
                }
                require("connection_close.php");
                return $pick_seagrasslist;
        }
        
        public static function Add($staffID,$areaID,$seagrassID,$amount,$date_pick)
    {
        require("connection_connect.php");
        $sql = "INSERT INTO `pick_seagrass`(`pickID`, `staffID`, `areaID`, `seagrassID`, `amount`, `date_pick`) 
        VALUES ($staffID,$areaID,$seagrassID,$amount,$date_pick)";
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
    public static function get($pickID) {
        require("connection_connect.php"); 
       $sql = "SELECT  * FROM pick_seagrass  WHERE pickID = $pickID"; 
       $result = $conn ->query($sql) ;
        $my_row = $result -> fetch_assoc() ; 
        $pickID =$my_row['pickID'];
        $staffID =$my_row['staffID'];
        $areaID =$my_row['areaID'];
        $seagrassID =$my_row['seagrassID'];
        $amount =$my_row['amount'];
        $date_pick =$my_row['date_pick'];

       require ("connection_close.php");
        return new pick_seagrass($pickID,$staffID,$areaID,$seagrassID,$amount,$date_pick); }
/*
    public static function update($area_ID,$area_Name,$generality,$distance,$size_area)
    {
        
        require("connection_connect.php");
        $sql="UPDATE `area` SET `area_ID`= $area_ID,`area_Name`='$area_Name',`generality`='$generality',`distance`=$distance,`size_area`=$size_area
         WHERE area_ID = $area_ID";
        $result=$conn->query($sql);
        require("connection_close.php");
        return "$result";
    }*/
    public static function delete($pickID)
    {
        require("connection_connect.php");
        $sql ="DELETE from pick_seagrass Where pickID=$pickID";
        $result=$conn->query($sql);
        require("connection_close.php");
        return "delete success $result row";
    }
    
}
?>