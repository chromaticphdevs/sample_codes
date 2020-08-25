<?php include_once('load_lib.php')?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
	<body>
		<div class="container">
		<section class="col-md-5 mt-5 mx-auto">
			<h1>Code Show Case</h1>
			<p>Mark Angelo Gonzales <a href="https://chromaticsoftwares.com/blogs" target="_blank">Blogs</a></p>
			<?php Flash::show()?>

			<?php
				Form::open([
					'method' => 'post',
					'action' => URL.'/submit.php'
				]);
			?>
				<div class="form-group">
					<?php
						Form::label('title' , 'title_id');
						Form::text('title' , '' , [
							'id' => 'title_id',
							'class' => 'title form-control'
						]);
					?>
				</div>

				<div class="form-group">
					<?php
						Form::label('Content' , 'content');

						Form::select('content', arr_layout_keypair($contents ,'id' , 'title') , '3' , [
							'id' => 'content',
							'class' => 'content form-control'
						]);


						Flash::show('contentTip');
					?>
				</div>

				<?php Form::submit('' , 'Send' , [ 'class' => 'btn btn-primary btn-sm'])?>
			<?php Form::close();?>
		</section>
		</div>

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
			integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="crossorigin="anonymous"></script>

		<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	</body>
</html>