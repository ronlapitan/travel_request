$(document).ready(function(){
	$("#editform").submit(function(event) {
		$.ajax({
			url: "submit_edit_research.php",
			method: "post",
			data: $(this).serialize(),
			dataType: "json",
			success:function(response)
			{
				if (response.status === 'error') {

					$('#edit_message').html(response.message);

				} else if (response.status === 'success') {

					$('#edit_message').html(response.message);

						$("#editform").each(function() {
							this.reset();
						});

						window.setTimeout(function() {
	  					  window.location.href = 'index.php';
						}, 3000)
				}
				
			}
		});
	return event.preventDefault();
	});

});
