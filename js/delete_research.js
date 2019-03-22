$(document).on('submit', '.delete_research', function(e) {
	var form = $(this);
	if (confirm('Are you sure you want to delete this item?')) {
		$.ajax({
			method: 'post',
			url: form.attr('action'),
			data: form.serialize(),
		}).done(function(message) {
			fetch_research_collection();
		});
	}
	e.preventDefault();
});