<div class="container">
  <div class="form-control">
    <?php if (!empty($this->session->flashdata('message'))): ?>
      <div class="alert alert-success" role="alert">
        <?= $this->session->flashdata('message') ?>
      </div>
    <?php endif ?>
    <form class="row g-3 needs-validation" novalidate enctype="multipart/form-data" action="<?= base_url('home/json_file') ?>" method="post">
      
      <div class="col-md-6">
        <label for="file" class="form-label">Upload JSON file</label>
        <input type="file" class="form-control" id="file" name="json_file" onchange="return fileValidation()" required data-bv-file-extension="json">
        <div class="invalid-feedback">
          Please upload Json file.
        </div>
      </div>
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Submit form</button>
      </div>
    </form>
  </div>
</div>

<script>
        function fileValidation() {
            var fileInput = 
                document.getElementById('file');
              
            var filePath = fileInput.value;
          
            // Allowing file type
            var allowedExtensions = 
                    /(\.json|\.JSON)$/i;
              
            if (!allowedExtensions.exec(filePath)) {
                alert('Invalid file type, Please upload json/JSON file');
                fileInput.value = '';
                return false;
            } 
            else 
            {
              
                // Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById(
                            'imagePreview').innerHTML = 
                            '<img src="' + e.target.result
                            + '"/>';
                    };
                      
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }
    </script>

<script>
(function () {
  'use strict'

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

