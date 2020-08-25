
$( document ).ready(function() 
{
	if( $('.form-verify') )
	{
		$('.form-verify').click(function(evt) {

			let message = $(this).attr('data-message');

			if(message == null) 
				message = 'Are you sure you want to continue this proccess , irreversible process ';


			if(!confirm(message))
				evt.preventDefault();
		});
	}
});