function Billing()
{
	this.siteUrl = null;
	this.init = function()
	{
		this.setListeners();
		//Initially compute without any packaging.
		this.computeSubTotal();
		this.computeOverallTotal();
	};
	this.computeSubTotal = function()
	{
		var s = '#billing';
		var i = 0;
		$(s + ' .packages .package').each(function(){
			var p = $(this);
		});
	};
	this.computeOverallTotal = function()
	{
		var s = '#billing';
		var i = 0;
		$(s + ' .postings .posting').each(function(){
			var p = $(this);
		});
		$(s + ' .packages .package').each(function(){
			var p = $(this);
		});
	};
	this.setListeners = function()
	{
		var o = this;
		var s = '#billing';
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
		$('#billing.employer .bidAmount').on('change', function(e){
			e.preventDefault();
			var t = $(this);
			var amount  = t.val();
		});
		$('#billing.employer .vip').click(function(e){
			e.preventDefault();
			var t = $(this);
			var selected = t.is(':selected');
		});
		$('#billing.employer .move').click(function(e){
			e.preventDefault();
			var t = $(this);
			//TODO: Remove and move item to 
			//#billing .packageType.
		});
	};
}