<?php build('content')?>
	<div class="text-center">
		<h4>How to Upload Image / File</h4>
		<p>Using File Upload Helper</p>
	</div>

	
	<section>
		<div class="row">
			<div class="col-md-6">
				<h4>Image Upload</h4>
				<?php Flash::show('tokenErr')?>
				<?php
					Form::open([
						'method' => 'post',
						'action' => '/Image/store',
						'enctype' => 'multipart/form-data'
					]);
					
					csrf();
				?>

				<div class="form-group">
					<?php
						Form::label('Select Image');
						Form::text('image_name','' ,[
							'class' => 'form-control'
						]);
					?>
				</div>

				<div class="form-group">
					<?php
						Form::label('Select Image');
						Form::file('image', [
							'class' => 'form-control'
						]);
					?>
				</div>

				<div class="form-group">
					<?php
						Form::submit('', 'Save Image' ,[
							'class' => 'btn btn-primary'
						]);
					?>
				</div>

				<?php Form::close();?>


				<section>
					<h4>Uploads</h4>


					<?php foreach($images as $key => $row) :?>
						<?php if(strlen($row) < 3) continue?>
						<img src="<?php echo $path.DS.$row?>" style="width: 150px">
					<?php endforeach?>
				</section>
			</div>	
			<div class="col-md-6">
				<h4>Code</h4>
				
				<textarea style="width: 100%; height: 100%;">
					<?php echo file_get_contents(VIEWS.DS.'helper/inc/upload_samp.html')?>
				</textarea>
			</div>
		</div>
	</section>	
<?php endbuild()?>

<?php occupy('templates/base') ?>