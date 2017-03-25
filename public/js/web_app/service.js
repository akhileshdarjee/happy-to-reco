$( document ).ready(function() {
	$("#name").on("input change", function() {
		var slug = '';

		slug += $("#name").val().slugify();
		$("#slug").val(slug);
	});
});