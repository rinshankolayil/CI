
<div id="page-content-wrapper">

  <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
  </nav>

  <div class="container">
    <h1 class="mt-4"></h1>
    <div class="row">
      <div class="col">
        <h2>Photo upload</h2>
        <p>Source code (<a href="https://www.w3schools.com/bootstrap4/tryit.asp?filename=trybs_form_custom_file&stacked=h"> https://www.w3schools.com/bootstrap4/tryit.asp?filename=trybs_form_custom_file&stacked=h</a>) </p>
        <?php
        if(isset($message)){
          if($message !=''){
            ?>
            <div class="alert alert-warning" role="alert">
                <?=$message;?>
            </div>
          <?php
          }
        }

        ?>
        <form action="<?=site_url('admin/upload')?>" method="post" enctype="multipart/form-data">
          <p>Custom file:</p>
          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="file" name="file" required>
            <label class="custom-file-label" for="customFile" id="label_file">Choose file</label>
          </div>
          <div class="form-group">
            <label for="username">Caption for image</label>
            <input type="text" class="form-control" name="name" placeholder="Enter phot name" required>
          </div>
        
          <div class="mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#file').change(function(event) {
      $('#label_file').html('One file added')
    });
  });
</script>