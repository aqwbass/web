<?php
class SeagrassController
{
    public function index()
    {
        $seagrass_list = seagrass::getAll();
        require_once('views/seagrass/index_seagrass.php') ;
    }
    
    public function addseagrass()
    {
        //$staff_ID = NULL ;
        //ปิดการแจ้งเตือนerror
        @ini_set('display_errors', '0');
        $seagrass_name =$_GET['seagrass_name'];
        // กันการไม่มีข้อมูล
        
        seagrass::Add($seagrass_name);
        SeagrassController::index(); 
        
        
        
        
    }
    
   public function updateform()
   {
        error_reporting(~E_NOTICE);
        $seagrass_ID =$_GET['seagrass_ID'];
        $seagrass = seagrass::get($seagrass_ID);
        
        require_once('views/seagrass/updateform.php');

   }
    public function update()
   {  
    error_reporting(~E_NOTICE);   
    $seagrass_ID =$_GET['seagrass_ID'];
    $seagrass_name =$_GET['seagrass_name'];
        
    seagrass::update($seagrass_ID,$seagrass_name);
    SeagrassController::index(); 
   }
   
   public function deleteconfirm()
   {
      error_reporting(~E_NOTICE);
      $seagrass_ID =$_GET['seagrass_ID'];
      $seagrass = seagrass::get($seagrass_ID); 
      //require_once('views/staff/deleteconfirm.php');
   }
   public function delete()
   {
    $seagrass_ID =$_GET['seagrass_ID'];
    seagrass::delete($seagrass_ID);
    SeagrassController::index(); 
   
   }
   

   
}
?>