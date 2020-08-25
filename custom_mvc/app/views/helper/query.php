<?php build('content')?>
	<div class="text-center">
		<h4>How to use Query Helpers</h4>
	</div>
	<section>
		<div class="row">
			<div class="col-md-6">
				<h4>All Methods for CRUD</h4>
				<ul>
					<li>GET - SINGLE DATA</li>
					<li>ALL - ARRAY OF DATA</li>
					<li>UPDATE / DELETE - ARRAY OF DATA</li>
					<li>STORE</li>
				</ul>
			</div>	
			<div class="col-md-6">
				<h4>Code</h4>
				<textarea style="width: 100%; height: 100%;">
					<?php echo file_get_contents(VIEWS.DS.'helper/inc/query_samp.html')?>
				</textarea>
			</div>
		</div>
	</section>	
<?php endbuild()?>

<?php occupy('templates/base') ?>