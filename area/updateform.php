 <form class="needs-validation" novalidate method="get" action="">
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">Area_Name</label>
      <input type="text" class="form-control" id="validationCustom01" placeholder="Name" name = "area_Name" value = <?php echo $area->area_Name ?>>
      <div class="invalid-feedback">
      Please choose a name
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustomUsername">generality</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
        </div>
        <input type="text" class="form-control" id="validationCustomUsername" placeholder="generality" aria-describedby="inputGroupPrepend" name = "generality" value = <?php echo $area->generality ?>>
        <div class="invalid-feedback">
          Please choose a  generality.
        </div>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">distance</label>
      <input type="int" class="form-control" id="validationCustom03" placeholder="distance" name ="distance" value = <?php echo $area->distance ?>>
      <div class="invalid-feedback">
        Please provide a distance.
      </div>
    </div>
    
    
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">size_area</label>
      <input type="int" class="form-control" id="validationCustom03" placeholder="size_area" name ="size_area" value = <?php echo $area->size_area ?>>
      <div class="invalid-feedback">
        Please provide a size_area.
      </div>
    </div>
    
    
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>
  <input type ="hidden"name="controller" value="area"/>
  <input type ="hidden"name = "area_ID" value = <?php echo (int)($area->area_ID) ?>>
  <button class="btn btn-primary" type="submit" name="action" value="update" data-toggle="modal" data-target="#exampleModalLong" >Submit form</button>
  

</form>
