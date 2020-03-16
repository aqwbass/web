<?php
class AreaController
{
    public function index()
    {
        $area_list = area::getAll();
        require_once('views/area/index_area.php') ;
    }
    
    public function addarea()
    {
        //$staff_ID = NULL ;
        //ปิดการแจ้งเตือนerror
        @ini_set('display_errors', '0');
        $area_Name =$_GET['area_Name'];
        $generality =$_GET['generality'];
        $distance=$_GET['distance'] ;
        $size_area=$_GET['size_area'] ;
        // กันการไม่มีข้อมูล
        if($area_Name == NULL){
            echo "<script>alert('Error');</script>";
           AreaController::index(); 
        }
        else{
        area::Add($area_Name,$generality,$distance,$size_area);
        AreaController::index(); 
        }
        
        
        
    }
    
   public function updateform()
   {
        error_reporting(~E_NOTICE);
        $area_ID =$_GET['area_ID'];
        $area = area::get($area_ID);
        
        require_once('views/area/updateform.php');

   }
    public function update()
   {  
    $area_ID =$_GET['area_ID'];  
    $area_Name =$_GET['area_Name'];
    $generality =$_GET['generality'];
    $distance=$_GET['distance'] ;
    $size_area=$_GET['size_area'] ;
    area::update($area_ID,$area_Name,$generality,$distance,$size_area);
    AreaController::index(); 
   }
   
   public function deleteconfirm()
   {
      error_reporting(~E_NOTICE);
      $area_ID =$_GET['area_ID'];
      $area = area::get($area_ID); 
      //require_once('views/staff/deleteconfirm.php');
   }
   public function delete()
   {
    $area_ID =$_GET['area_ID'];
    area::delete($area_ID);
    AreaController::index(); 
   
   }
   

   
}
?>