<?php include_once('load_lib.php')?>
<?php

	
	$post = request()->inputs();

	if(empty($post['title'])) {
		Flash::set("Title Should not be empty" , 'danger');
		return request()->return();
	}



	if(!isEqual($post['title'] , 'Mark The Handsome'))
	{
		Flash::set("Must put 'Mark The Handsome' on the title to preview the selected content");

		Flash::set("See the selected option its still the one you picked after reload thats the use of FormBuilder" , 'warning' , 'contentTip');

		return request()->return();
	}


	$title = $_POST['title'];

	$content = getContent($contents , $post['content']);


	$url = URL;
	$jsonApiURL = API['jsonPlaceHolder'].'/'.$post['content'];

	print <<< EOF
		<h1> USER TITLE </h1>
		<h2>SELECTED CONTENT- ID :{$post['content']}</h2>
		<hr>
		<h3>CONTENT FROM API</h3>
		<a href ='{$jsonApiURL}' target="_blank"> {$jsonApiURL} </a>
		<ul> 
			<li>User Id : {$content->userId} </li>
			<li>ID: {$content->id} </li>
			<li>Title : {$content->title} </li>
			<li>Body: {$content->body} </li>
		</ul>
		<a href='$url'> Go back to Form </a>
	EOF;
	
	function getContent($contents , $contentid)
	{
		foreach ($contents as $key => $row) 
		{
			if($row->id == $contentid)
				return $row;
		}
	}
?>