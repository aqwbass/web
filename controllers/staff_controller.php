<?php
class StaffController
{
    public function index()
    {
        $staff_list = staff::getAll();
        require_once('views/staff/index_staff.php') ;
    }
    
    public function addstaff()
    {
        //$staff_ID = NULL ;
        //ปิดการแจ้งเตือนerror
        @ini_set('display_errors', '0');
        //$staff_team_ID =$_GET['staff_team_ID'];
        $staff_Name =$_GET['staff_Name'];
        $staff_Date=$_GET['staff_Date'] ;
        // กันการไม่มีข้อมูล
        if($staff_Name == NULL){
            echo "<script>alert('Error');</script>";
            StaffController::index(); 
        }
        else{
        staff::Add($staff_Name,$staff_Date);
        StaffController::index(); 
        }
        
        
        
    }
    
   public function updateform()
   {
        error_reporting(~E_NOTICE);
        $staff_ID =$_GET['staff_ID'];
        $staff = staff::get($staff_ID);
        
        require_once('views/staff/updateform.php');

   }
    public function update()
   {  
        $staff_ID =$_GET['staff_ID'];
        //$staff_team_ID =$_GET['staff_team_ID'];
        $staff_Name =$_GET['staff_Name'];
        $staff_Date=$_GET['staff_Date'] ;
    staff::update($staff_ID,$staff_Name,$staff_Date);
    StaffController::index(); 
   }
   
   public function deleteconfirm()
   {
      error_reporting(~E_NOTICE);
      $staff_ID =$_GET['staff_ID'];
      $staff = staff::get($staff_ID); 
      //require_once('views/staff/deleteconfirm.php');
   }
   public function delete()
   {
    $staff_ID =$_GET['staff_ID'];
    staff::delete($staff_ID);
    StaffController::index(); 
   
   }
   

   
}
?>