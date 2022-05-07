
<!-- <?php pr($form_data)  ?> -->
<div class="container">
  <div class="form-control">
    <form class="row g-3 needs-validation" novalidate enctype="multipart/form-data" action="<?= base_url('home/submit_form') ?>" method="post">
      <?php foreach ($form_data as $data) {
        if ($data->type == 'date' || $data->type == 'text' || $data->type == 'number' || $data->type == 'email') {
      ?>
        <div class="col-md-4">
          <label for="<?= $data->key ?>" class="form-label"><?= $data->label ?> <?= ($data->unit !='')? '( '. $data->unit .' )' : ''; ?></label>
          <input type="<?= $data->type ?>" class="form-control" id="<?= $data->key ?>" value="<?= $data->key ?>" <?= ($data->isReadonly == '1')? 'readonly':''; ?> <?= ($data->isRequired == '1')? 'required':''; ?> >
          <div class="invalid-feedback">
            Please Enter <?= $data->label ?> <?= ($data->unit !='')? ' in '. $data->unit : ''; ?>
          </div>
        </div>

      <?php }elseif ($data->type == 'dropdown') { ?>

        <div class="col-md-4">
          <label for="<?= $data->key ?>" class="form-label"><?= $data->label ?></label>
          <select name="<?= $data->key ?>" class="form-control" id="<?= $data->key ?>">
            
            <?php 
              if (!empty($data->items)) { ?>
                <!-- <option value="">Select <?= $data->label ?></option> -->
                <?php foreach ($data->items as $options) { ?>

                <option value="<?= $options->value ?>"><?= $options->text ?></option>

            <?php }}else{ ?>
              <option value="">No Data</option>
            <?php } ?>

          </select>
          <div class="invalid-feedback">
            Please choose a <?= $data->label ?>
          </div>
        </div>
        
      <?php } }?>
      
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Submit form</button>
      </div>
    </form>
  </div>
</div>

<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>

