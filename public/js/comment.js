function Comment()
{
	this.siteUrl;
	this.init = function()
	{
		this.setListeners();
	};
	this.initDeletion = function()
	{
		//KLUDGE: On click evt not working.
		$('#comment .delete, #applicant .comments .delete').click(function(e){
		var t = $(this);
		if(confirm('Are you sure?'))
		{
		  $.ajax({url: t.attr('href')});
		  t.parent().parent().remove();
		}
		e.preventDefault();
		});
	};
	this.setListeners = function()
	{
		var o = this;
		var sAppl = '#applicant.read';
	    this.initDeletion();
	    $(sAppl + ' .row.create form').submit(function(e){
	      var t = $(this);
	      var url = t.attr('action');
	      $.ajax
	      (
	        {
	          url: url, 
	          type: 'POST',
	          data: t.serialize(),
	          success: function(response)
	          {
	            if(response.status == 'success')
	            {
	              $('#applicant.read .row.comments').prepend(response.view);
	              $(sAppl + ' .row.create textarea').val('');
	              o.initDeletion();
	            }
	            else
	            {
	              //
	            }
	          }
	        }
	      );
	      e.preventDefault();
	    });
	    $(sAppl + ' input[type="checkbox"]').change(function(){
	      var t = $(this);
	      var b = t.is(':checked');
	      var url = t.attr('url') + '/' + b;
	      $.ajax({url: url});
	    });
	};
}