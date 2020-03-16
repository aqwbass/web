<?php
class Pick_seagrassController
{
    public function index()
    {
        $pick = pick_seagrass::getAll();
        $pick_date =pick_seagrass::getAllDate();

        require_once('views/pick_seagrass/index_pick_seagrass.php') ;
    }

    public function addpick_seagrass()
    {
        //$staff_ID = NULL ;
        //ปิดการแจ้งเตือนerror
        @ini_set('display_errors', '0');
        $staffID =$_GET['staffID'];
        $areaID =$_GET['areaID'];
        $seagrassID=$_GET['seagrassID'] ;
        $amount=$_GET['amount'] ;
        $date_pick=$_GET['date_pick'] ;
        // กันการไม่มีข้อมูล
        if($staff_Name == NULL){
            echo "<script>alert('Error');</script>";
            Pick_seagrassController::index(); 
        }
        else{
            pick_seagrass::Add($staffID,$areaID,$seagrassID,$amount,$date_pick);
            Pick_seagrassController::index(); 
        }
        
        
        
    }
    
   public function updateform()
   {
        error_reporting(~E_NOTICE);
        $pickID =$_GET['pickID'];
        $pick_seagrass = pick_seagrass::get($pickID);
        
        require_once('views/pick_seagrass/updateform.php');

   }
   /*
    public function update()
   {  
        $staff_ID =$_GET['staff_ID'];
        $staff_team_ID =$_GET['staff_team_ID'];
        $staff_Name =$_GET['staff_Name'];
        $staff_Date=$_GET['staff_Date'] ;
        pick_seagrass::update($staff_ID,$staff_team_ID,$staff_Name,$staff_Date);
    Pick_seagrassController::index(); 
   }*/
   
   public function deleteconfirm()
   {
      error_reporting(~E_NOTICE);
      $pickID =$_GET['pickID'];
      $pick_seagrass = pick_seagrass::get($pickID); 
      //require_once('views/staff/deleteconfirm.php');
   }
   public function delete()
   {
    $pickID =$_GET['pickID'];
    pick_seagrass::delete($pickID);
    Pick_seagrassController::index(); 
   
   }
   

   
}
?>