function Haystack()
{
  this.baseUrl;
  this.init = function()
  {
    this.setListeners();
  };
  this.setListeners = function()
  {
    $('.delete').click(function(e){
      if(!confirm('Are you sure?'))
      {
        e.preventDefault();
      }
    });
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
    //
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