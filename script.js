$(function(){
	$(".delete").on("click", function(event)
	{
		var href = $(this).attr("href");
		var $this = $(this);
		$.ajax({
			url:href,			
			success: function(data)
					{
						//console.log(data);
						$this.parent().fadeOut(500);
					}
		});
		event.preventDefault();
	})
})