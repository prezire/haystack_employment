function Haystack()
{
  this.baseUrl;
  this.init = function()
  {
    this.setListeners();
  };
  this.setListeners = function()
  {
    //Pool.
    $('#pooledApplicant.index form').submit(function(e){
      var t = $(this);
      var url = t.attr('action');
      $.ajax
      (
        {
          url: url,
          type: 'POST',
          data: t.serialize()
        }
      );
      e.preventDefault();
    });
    $('#applicant.read .pool').click(function(e){
      var t = $(this);
      var url = t.attr('href');
      var applId = t.attr('applicantId');
      var emplId = t.attr('employerId');
      $.ajax
      (
        {
          url: url,
          type: 'POST',
          data: 
          {
            applicant_id: applId, 
            employer_id: emplId
          }
        }
      );
      t.attr('disabled', true);
      e.preventDefault();
    });
    //Comment.
    var sCreate = '#applicant.read .row.create';
    $(sCreate + ' form').submit(function(e){
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
            if(response.success)
            {
              $('#applicant.read .row.comments').append(response.view);
              $(sCreate + ' textarea').val('');
            }
          }
        }
      );
      e.preventDefault();
    });
    $('#applicant.read input[type="checkbox"]').change(function(){
      var t = $(this);
      var b = t.is(':checked');
      var url = t.attr('url') + '/' + b;
      $.ajax({url: url});
    });
    //
    //Internship application.
    $('#internship.read .button.apply').click(function(e){
      var t = $(this);
      var href = t.attr('href');
      $.ajax({url: href, success: function(response){
        if(response.success)
        {
          t.addClass('disabled');
        }
      }});
      e.preventDefault();
    });
    //
    $('.delete').click(function(e){
      if(confirm('Are you sure?'))
      {
        var t = $(this);
        var url = t.attr('href');
        $.ajax({url: url, success: function(response){
          if(response.success)
          {
            var p = t.parent().parent().parent();
            var el = p.children('#' + response.id);
            el.remove(); 
          }
        }});
      }
      e.preventDefault();
    });
    $('#home.index .btnShowListing').click(function(e){
      $('#home.index .expandable').slideToggle();
      e.preventDefault();
    });
    //BUG: Doesn't click.
    $('#comment.index .cbApproved').click(function(){
      var t = $(this);
      var id = t.attr('id');
      var approved = t.is(':checked');
      var url = 'comment/updateApproved/' + 
                id + 
                '/' + 
                approved;
      $.ajax
      (
        {
          url: url, 
          success: function(response){
            var r = response;
            if(r.success)
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