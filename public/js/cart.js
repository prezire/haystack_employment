function Cart()
{
  this.baseUrl;
  this.init = function()
  {
    this.setListeners();
  };
  this.readItem = function(container)
  {
  	var c = container;
  	var id = c.find('id');
  	var name = c.find('name');
  	var qty = c.find('quantity');
  	var price = c.find('price');
  	var opts = c.find('options'); //Dates from and to.
  	var o = 
  	{
  		id: id,
  		name: name,
  		quantity: qty,
  		price: price,
  		options: opts
  	};
  	return o;
  };
  this.setListeners = function()
  {
  	var o = this;
  	$('#position.index button.create').click(function(e){
  		e.preventDefault();
  		var t = $(this);
  		var p = t.parent();//TODO: Change this based on the markup.
  		var o = o.readItem(p);
  		var rowId = t.attr('rowId');
  		var url = 'shoppingcart/create';
  		.aja
  		$.ajax({
  			url: url,
  			data: o,
  			success: function(response)
  			{
  				if(response.success)
  				{
  					//
  				}
  				else
  				{
  					console.log('Cart creation failed.');
  				}
  			}
  		});
  	});
  	$('#shoppingCart.index button.update').click(function(e){
  		e.preventDefault();
  		var t = $(this);
  		var p = t.parent();
  		var o = o.readItem(p);
  		var rowId = t.attr('rowId');
  		var url = 'shoppingcart/update';
  		$.ajax({
  			url: url,
  			data: o,
  			success: function(response)
  			{
  				if(response.success)
  				{
  					//
  				}
  				else
  				{
  					console.log('Cart update failed.');
  				}
  			}
  		});
  	});
  };
}