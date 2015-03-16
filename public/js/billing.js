function Billing()
{
	this.siteUrl;
	this.b;
	this.init = function()
	{
		this.b = '#billing';
		this.setListeners();
		//Initially compute without any packaging.
		this.computeSubTotal();
		this.computeOverallTotal();
	};
	this.checkDates = function()
	{
		var bPassed = true;
		$(this.b + ' .packages .package').each(function(){
			if(bPassed)
			{
				var p = $(this);
				var items = p.find('.items .item');
				item.each(function(){
					var t = $(this);
					var maximum = t.data('maximumDateDifference');
					if(t.data('dateDifference') > maximum)
					{
						bPassed = false;
						//TODO: Show inline error.
						//break;
					}
					else
					{
						//break;
					}
				});
			}
			else
			{
				
			}
		});
		return bPassed;
	};
	this.checkMinimumPostingCount = function()
	{
		//All packages.
		var bPassed = true;
		$(this.b + ' .packages .package').each(function(){
			if(bPassed)
			{
				var p = $(this);
				var minimum = p.data('minimumPostings');
				var items = p.find('.items .item');
				var i = 0;
				//TODO: Refactor instead of looping.
				item.each(function(){i++;});
				if(i < minimum)
				{
					bPassed = false;
					//TODO: Show inline error.
					//break;
				}
			}
			else
			{
				//break;
			}
		});
		return bPassed;
	};
	this.computeSubTotal = function()
	{
		var i = 0;
		$(this.b + ' .packages .package').each(function(){
			var p = $(this);
		});
	};
	this.computeOverallTotal = function()
	{
		var i = 0;
		$(this.b + ' .postings .posting').each(function(){
			var p = $(this);
		});
		$(this.b + ' .packages .package').each(function(){
			var p = $(this);
		});
	};
	this.setListeners = function()
	{
		var o = this;
		var s = this.b;
		$(
			s + ' .bidAmount, ' + 
			s + ' .vip, ' + 
			s + ' .move'
		).bind
		(
			'change click', 
			function(e)
			{
				o.computeSubTotal();
				o.computeOverallTotal();
			}
		);
		$(s + ' .bidAmount').on('change', function(e){
			e.preventDefault();
			var t = $(this);
			var amount  = t.val();
		});
		$(s + ' .vip').click(function(e){
			var t = $(this);
			var selected = t.is(':selected');
		});
		$(s + ' .move').click(function(e){
			e.preventDefault();
			var t = $(this);
			//TODO: Remove and move item to 
			//#billing .package.
		});
		$(s + ' .checkout').click(function(e){
			var t = $(this);
			var href = t.attr('href');
			var b = this.checkDates() && 
					this.checkMinimumPostingCount();
			if(b)
			{
				//href.
			}
			else
			{
				e.preventDefault();
			}
		});
	};
}