$('.item a').click(function(e) {
	e.preventDefault();
	var show = $(this).attr('href');
	$(show).toggle();
});