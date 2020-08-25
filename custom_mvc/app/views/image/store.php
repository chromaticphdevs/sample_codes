<?php build('content') ?>
<div class="text-center">
  <h2>Uploaded Image Result</h2>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="card-header">
      <h4>Image Details</h4>
      <?php Flash::show()?>
    </div>

    <div class="card-body">
      <ul>
        <li>Original Name : <?php echo $uploadedImage['oldname']?></li>
        <li>Generated Name : <?php echo $uploadedImage['name']?></li>
        <li>Extension : <?php echo $uploadedImage['extension']?></li>
        <li>Path : <?php echo $uploadedImage['path']?></li>
        <li>Add More : <a href="/Helper/?helper=upload">Go</a> </li>
      </ul>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-header"><h4>Saved Image</h4></div>
      <div class="card-body">
        <img src="<?php echo $this->savedPath.DS.$uploadedImage['name']?>"
          style="width: 350px;">

        <div>URL : <?php echo $this->savedPath.DS.$uploadedImage['name']?>?></div>
      </div>
    </div>
  </div>
</div>
<?php endbuild()?>

<?php occupy('templates/base');?>


