<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  ADD
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD AREA DATA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="needs-validation" novalidate method="get" action="">
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">Area_Name</label>
      <input type="text" class="form-control" id="validationCustom01" placeholder="Name" name = "area_Name" required>
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
        <input type="text" class="form-control" id="validationCustomUsername" placeholder="generality" aria-describedby="inputGroupPrepend" name = "generality" required>
        <div class="invalid-feedback">
          Please choose a  generality.
        </div>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">distance</label>
      <input type="int" class="form-control" id="validationCustom03" placeholder="distance" name ="distance" required>
      <div class="invalid-feedback">
        Please provide a distance.
      </div>
    </div>
    
    
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">size_area</label>
      <input type="int" class="form-control" id="validationCustom03" placeholder="size_area" name ="size_area" required>
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
  <button class="btn btn-primary" type="submit" name="action" value="addarea" data-toggle="modal" data-target="#exampleModalLong" >Submit form</button>
  

</form>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
      </div>
      
    </div>
  </div>
</div>