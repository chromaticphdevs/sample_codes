<?php build('content')?>
	<div class="text-center">
		<h4>How to use Array Helpers</h4>
	</div>

	
	<section>
		<div class="row">
			<div class="col-md-6">
				<h4>Instances</h4>
				<p>How are you going to put this result on a '<?php echo htmlentities('<select> </select>')?>' Element?
					<br/> With id as its value and name as its option text?
				</p>

				<?php
					foreach($users as $key => $row)
					{
						if($key > 3) break;

						echo "<pre>".json_encode($row)."</pre>";
					}
				?>

				<?php
					Form::label('Users');

					Form::select('users' , arr_layout_keypair($users , 'id' , 'name') , '5' , [
						'class' => 'form-control'
					]);
				?>
			</div>	
			<div class="col-md-6">
				<h4>Code</h4>
				<textarea style="width: 100%; height: 100%;">
					<?php echo file_get_contents(VIEWS.DS.'helper/inc/array_samp.html')?>
				</textarea>
			</div>
		</div>
	</section>	
<?php endbuild()?>

<?php occupy('templates/base') ?>