<?php build('content')?>
	<div class="text-center">
		<h4>Form Submit Result</h4>
	</div>
	<section>
		<div class="row">
			<div class="col-md-6">
				<h4>Post Details</h4>
				<ul>
					<li>Title : <?php echo $post->title?></li>
					<li>Body : <?php echo $post->body?></li>
				</ul>
			</div>

			<div class="col-md-6">
				<h4>Writer Details</h4>
				<ul>
					<li>Name : <?php echo $user->name?></li>
					<li>Email : <?php echo $user->email?></li>
				</ul>
			</div>
		</div>
	</section>	
<?php endbuild()?>

<?php occupy('templates/base') ?>