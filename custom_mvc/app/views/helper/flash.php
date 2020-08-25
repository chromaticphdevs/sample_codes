<?php build('content')?>
	<div class="text-center">
		<h4>How to Use Flash</h4>
		<p>Alert Messages (POP-UP)</p>
	</div>

	
	<section>
		<h4>Flash Results</h4>
		<div class="row">
			<div class="col-md-6">
				<h4>Output</h4>
				<?php Flash::show('primary')?>
				<?php Flash::show('warning')?>
				<?php Flash::show('danger')?>
				<?php Flash::show('info')?>
			</div>	
			<div class="col-md-6">
				<h4>Code</h4>

				<?php 
					// echo nl2br(htmlentities(file_get_contents(VIEWS.DS.'helper/inc/form_samp.html')) ) 
				?>

				<textarea style="width: 100%; height: 100%;">
					<?php echo file_get_contents(VIEWS.DS.'helper/inc/flash_samp.html')?>
				</textarea>
			</div>
		</div>
	</section>	
<?php endbuild()?>

<?php occupy('templates/base') ?>