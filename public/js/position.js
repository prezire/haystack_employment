function Position()
{
	this.init = function()
	{
		this.setListeners();
	};
	this.setListeners = function()
	{
		$('#position.index .accordion a.update').click(function(e){
			e.preventDefault();
			var t = $(this);
			var h = $(this).attr('href');
			var p = t.parent().parent();
			var stat = p.find('.applicationStatus').val();
			var notes = p.find('.notes').val();
			var o = 
			{
				application_status_name: stat,
				notes: notes
			};
			$.ajax
			(
				{
					url: h, 
					type: 'POST',
					data: o,
					success: function(response)
					{
						var r = response;
						if(r.status == 'success')
						{
							//
						}
						else
						{
							//
						}
					}
				}
			);
		});
	};
}