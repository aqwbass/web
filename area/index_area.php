<!DOCTYPE html>
<html>
<head>
</head>
<body>
    
<table id="editable_table" class="table table-bordered table-striped">
     <thead>
  <tr>
    <th>area_ID</th>
    <th>area_Name</th>
    <th>generality</th>
    <th>distance</th>
    <th>size_area</th>
    <th><i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>
    <th><i class="fa fa-trash-o" aria-hidden="true"></i></th>
  </tr>
  </thead>
    <script language="javascript">
  function show_more_menu(e) {
  if( !confirm(`Are you sure  ?`) ) e.preventDefault();
}
  </script>
     <tbody>
  <?php foreach($area_list as $area)
{
    echo"
    <td>$area->area_ID</td> <td>$area->area_Name</td> <td>$area->generality</td>
    <td>$area->distance</td> <td>$area->size_area</td> 
    <td><a href=?controller=area&action=updateform&area_ID=$area->area_ID>update</a></td> 
    
    <td><a href=?controller=area&action=delete&area_ID=$area->area_ID 
    onclick=show_more_menu(event)>delete</a></td>
    
    </tr>"
    ;
    
}
    ?>

    </tbody>
</table>

</div>  
</div>  
</body>
</html>
