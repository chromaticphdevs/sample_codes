<?php build('content')?>
	<div class="text-center">
		<h4>How to Create Form</h4>
		<p>Form builder automatically saves your inputs even in reload , produce clean code </p>
	</div>

	
	<section>
		<h4>Form Builder</h4>
		<div class="row">
			<div class="col-md-6">
				<h4>Output</h4>

				<?php Flash::show()?>
				<?php 
					Form::open([
						'method' => 'post',
						'action' => '/FormController/store'
					]);
				?>

				<div class="form-group">
					<?php
						Form::label('Name');
						Form::text('name' , '' , [
							'class' => 'form-control',
							'id'    => 'name'
						]);
					?>
				</div>

				<div class="form-group">
					<?php
						Form::label('Select Post');
						Form::select('post' , $keyPairedSampleDatas , '5' , [
							'class' => 'form-control',
							'id'    => 'post'
						]);
					?>
				</div>
				<?php Flash::show('warning')?>
				<div class="form-group">
					<?php
						Form::submit('send' , 'Save' , [
							'class' => 'btn btn-primary form-verify',
							'id'    => 'Save Button'
						])
					?>
				</div>

				<?php Form::close();?>
			</div>	
			<div class="col-md-6">
				<h4>Code</h4>

				<?php 
					// echo nl2br(htmlentities(file_get_contents(VIEWS.DS.'helper/inc/form_samp.html')) ) 
				?>

				<textarea style="width: 100%; height: 100%;">
					<?php echo file_get_contents(VIEWS.DS.'helper/inc/form_samp.html')?>
				</textarea>
			</div>
		</div>
	</section>	
<?php endbuild()?>

<?php occupy('templates/base') ?>