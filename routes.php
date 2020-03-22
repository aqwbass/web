<?php
$controllers = array('pages'=>['home','error'],'staff'=>['index','newstaff','addstaff','updateform','update','deleteconfirm','delete']
,'seagrass'=>['index','newseagrass','addseagrass','updateform','update','deleteconfirm','delete']
,'area'=>['index','newarea','addarea','updateform','update','deleteconfirm','delete']
,'pick_seagrass'=>['index','newpick_seagrass','addpick_seagrass','updateform','update','deleteconfirm','delete']
,'seagrass_in_area'=>['index','newseagrass_in_area','addseagrass_in_area','updateform','update','deleteconfirm','delete']);
//list controller and action
function call($controller, $action)
{
 require_once("controllers/".$controller."_controller.php");
 switch($controller)
 {
     case "pages": $controller =new PagesController();
                   break;

     case "staff": require_once("models/staffModel.php");
                      $controller = new StaffController();
                      break;

     case "seagrass":  require_once("models/seagrassModel.php");
                      $controller = new SeagrassController();
                      break;

     case "area":  require_once("models/areaModel.php");
                      $controller = new AreaController();
                      break;

     case "seagrass_in_area":  require_once("models/seagrass_in_areaModel.php");
                        require_once("models/areaModel.php");
                        require_once("models/seagrassModel.php");
                      $controller = new Seagrass_in_areaController();
                      break;
      case "pick_seagrass": require_once("models/pick_seagrassModel.php");
                      $controller = new Pick_seagrassController();
                      break;
                    

 }
 $controller->{$action}();

}
if(array_key_exists($controller,$controllers))
{
if(in_array($action,$controllers[$controller]))
{
    call($controller,$action);
}
else
{
call('pages','error');
}
}
else
{
call('pages','error'); }
?>
