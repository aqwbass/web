<?php
class Seagrass_in_areaController
{
    public function index()
    {
        $seagrass_in_area_list = seagrass_in_area::getAll_Inarea();// จำนวนทั้งหมดไม่ได้แบ่งหญ้า
        $seagrass_in_list = seagrass_in_area::getAll_Seagrass();// จำนวนญ้าแบบแบ่ง
        $table = seagrass_in_area::getAll() ;
        $seagrass_list = seagrass::getAll();
        $area_list = area::getAll();
        require_once('views/seagrass_in_area/index_seagrass_in_area.php') ;
    }
    
    public function addseagrass_in_area()
    {
        //$staff_ID = NULL ;
        //ปิดการแจ้งเตือนerror
        @ini_set('display_errors', '0');
        $area_ID =$_GET['area_ID'];
        $seagrass_ID =$_GET['seagrass_ID'];
        $amount_seagrass =$_GET['amount_seagrass'];
        // กันการไม่มีข้อมูล
        seagrass_in_area::Add($area_ID,$seagrass_ID,$amount_seagrass);

        Seagrass_in_areaController::index(); 
        
        
        
        
    }
    
   public function updateform()
   {
        error_reporting(~E_NOTICE);
        $area_ID =$_GET['area_ID'];
        $seagrass_ID =$_GET['seagrass_ID'];
        $seagrass_in_area = seagrass_in_area::get($area_ID,$seagrass_ID);
        $seagrass_list = seagrass::getAll();
        $area_list = area::getAll();
        require_once('views/seagrass_in_area/updateform.php');

   }
    public function update()
   {  
    error_reporting(~E_NOTICE);   
    $area_ID =$_GET['area_ID'];
    $seagrass_ID =$_GET['seagrass_ID'];
    $amount_seagrass =$_GET['amount_seagrass'];
        
    seagrass_in_area::update($area_ID,$seagrass_ID,$amount_seagrass);
    Seagrass_in_areaController::index(); 
   }
   
   public function deleteconfirm()
   {
      error_reporting(~E_NOTICE);
      $area_ID =$_GET['area_ID'];
      $seagrass_ID =$_GET['seagrass_ID'];
      $seagrass = seagrass_in_area::get($area_ID,$seagrass_ID);
      //require_once('views/staff/deleteconfirm.php');
   }
   public function delete()
   {
    $area_ID =$_GET['area_ID'];
    $seagrass_ID =$_GET['seagrass_ID'];
    seagrass_in_area::delete($area_ID,$seagrass_ID);
    Seagrass_in_areaController::index(); 
   
   }
   

   
}
?>