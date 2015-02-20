function Pool()
{
	this.init = function()
	{
		this.setListeners();
	};
	this.setListeners = function()
	{
		$('#pool .button.add').click(function(e){
			var h = $(this).attr('href');
			$.ajax
			(
				{
					url: h, 
					success: function(response)
					{
						var r = response;
						if(r.success)
						{
							//TODO: r.data 	Partial view from server.
							$('#pool .row').append(r.data);
						}
					}
				}
			);
			e.preventDefault();
		});
		$('#pool .button.delete').click(function(e){
			if(confirm('Are you sure?'))
			{
				var h = $(this).attr('href');
				$.ajax
				(
					{
						url: h, 
						success: function(response)
						{
							var r = response;
							if(r.success)
							{
								$('#pool .row').find('#' + r.id).remove();
							}
						}
					}
				);
			}
			else
			{
				//Do nothing.
			}
			e.preventDefault();
		});
	};
}