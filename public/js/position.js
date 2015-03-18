function Position()
{
	this.siteUrl;
	this.iDwell;
	this.iDwellSeconds;
	this.sLastPositionId;
	this.init = function()
	{
		this.setListeners();
	};
	//Static methods for Analytics.
	//These methods are called by specific / individual pages.
	this.trackClicks = function(siteUrl, userId)
	{
		var o = this;
		this.siteUrl = siteUrl;
		$('#position.index a.position').click(function(e){
			var t = $(this);
			var id = t.data('id');
			var url = o.siteUrl + 
					'/position/createClick/' + id;
			$.ajax({url: url});
		});
	};
	this.trackDwells = function
	(
		start, 
		siteUrl, 
		positionId
	)
	{
		var o = this;
		if(start)
		{
			this.siteUrl = siteUrl;
			this.sLastPositionId = positionId;
			this.iDwellSeconds = 0;
			this.iDwell = setInterval(function(){
				o.iDwellSeconds++;
			}, 1000);
			//
			$(window).bind('beforeunload', function(){
				var url = o.siteUrl + 
						'/position/createDwell/' + 
						o.sLastPositionId + '/' + 
						o.iDwellSeconds;
				$.ajax({url: url});
				o.initDwell(false, siteUrl);
			});
		}
		else
		{
			clearInterval(this.iDwell);
			$(window).bind('beforeunload', null);
		}
	};
	//End static methods.
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