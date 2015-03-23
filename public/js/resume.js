function Resume()
{
  this.sCloseUi;
  this.siteUrl;
  //
  this.init = function(){
    this.sCloseUi = '<a href="#" class="close">&times;</a>';
    $('#resume.update form').hide();
    this.setListeners();
  };
  this.addItem = function(hiddenContainer, ulContainer){
    var s = '<li>' + 
            hiddenContainer.html() + 
            this.sCloseUi + 
            '</li>';
    var li = ulContainer.append(s);
    this.updateDatePickerIds(li);
    li.find('.from').addClass('datepicker');
    li.find('.to').addClass('datepicker');
    //BUG: DatePicker. Remove props first because they
    //already exist and pop-up doesn't work.
    $('.datepicker').removeClass('hasDatepicker');
    $('.datepicker').removeAttr('id');
    $('.datepicker').datepicker({dateFormat: 'yy-mm-dd'});
  };
  //TODO: @meth updateDatePickerIds Check if this can be removed.
  this.updateDatePickerIds = function(container){
    container.find('.datepicker').each(function(){
      var t = $(this);
      var b = t.is('[id]');
      if(b)
      {
        if(t.attr('id') == 'temporary')
        {
          t.attr('id', Math.round(Math.random() * 999));
          t.datepicker({dateFormat: 'yy-mm-dd'});
          t.datepicker('option', 'dateFormat', 'yy-mm-dd');
        }
      }
      else
      {
        t.datepicker({dateFormat: 'yy-mm-dd'});
        t.datepicker('option', 'dateFormat', 'yy-mm-dd');
      }
    })
  };
  this.addTextField = function(ulContainer){
    var s = '<li><input type="text" name="name[]" />' + 
            this.sCloseUi + 
            '</li>';
    ulContainer.append(s);
  };
  this.update = function(containerName, callback){
    var url = $(containerName + ' form').attr('action');
    var form =  $(containerName + ' form');
    $.ajax
    (
      {
        url: url, 
        type: 'POST',
        data: form.serialize(),
        success: callback
      }
    );
  };
  this.setListeners = function(){
    var o = this;
    $('#resume.update .recipients button').click(function(e){
      e.preventDefault();
      var r = $('#resume.update .recipients .recipients').val();
      var url = o.siteUrl + '/resume/forward';
      var id = $(this).data('id');
      $.ajax({
        url: url,
        type: 'POST',
        data: {id: id, recipients: r},
      });
    });
    $('#resume.index .isPublic').change(function(e){
      var t = $(this);
      var id = t.attr('id');
      var v = t.attr('value');
      var state = t.is(':checked') ? 1 : 0;
      var u = t.attr('url');
      var url = u + '/' + state;
      $.ajax({
        url: url,
        success: function(response){
          if(response.status == 'success')
          {
            //
          }
          else
          {
            //
          }
        },
      });
      //e.preventDefault();
    });
    $('#resume.update .btnUpdateResume').click(function(e){
      var t = $(this);
      var txt = $('#resume .details input.name');
      var name = txt.val();
      var id = txt.attr('id');
      var url = t.attr('href');
      var accessType = $('#resume.update .accessType').val();
      var d = {id: id, name: name, access_type: accessType};
      $.ajax({
        url: url,
        type: 'POST',
        data: d,
        success: function(response)
        {
          if(response.status == 'success')
          {
            //
          }
        }
      });
      e.preventDefault();
    });
    $('#resume .options .forward').click(function(e){
      e.preventDefault();
      $('.options .row.panel.recipients').slideToggle();
    });
    $('#resume li .close').live('click', function(e){
      $(this).parent().remove();
      e.preventDefault();
    });
    $('#resume .button.addWorkHistory').click(function(e){
      o.addItem($('.hidden .workHistoryView'), $('.workHistories ul'));
      e.preventDefault();
    });
    $('#resume .button.addEducation').click(function(e){
      o.addItem($('.hidden .educationView'), $('.educations ul'));
      e.preventDefault();
    });
    $('#resume .button.addSkills, #resume .button.addCertification').click(function(e){
      var ul = $(this).parent().parent().parent().parent().find('form ul');
      o.addTextField(ul);
      e.preventDefault();
    });
    //
    $('#resume section i').click(function(e){
      var t = $(this);
      var p = t.parent().parent().parent().find('form');
      p.slideToggle('slow');
      var b = t.hasClass('fa-angle-left');
      if(b)
      {
        t.removeClass('fa-angle-left');
        t.addClass('fa-angle-down');
      }
      else
      {
        t.removeClass('fa-angle-down');
        t.addClass('fa-angle-left'); 
      }
      //
      o.updateDatePickerIds(p.find('ul'));
      e.preventDefault();
    });
    $('#resume .resume button').click(function(e){
      o.update('.resume', function(response){
        console.log(response);
      });
      e.preventDefault();
    });
    $('#resume .workHistories button').click(function(e){
      o.update('.workHistories', function(response){
        console.log(response);
      });
      e.preventDefault();
    });
    $('#resume .educations button').click(function(e){
      o.update('.educations', function(response){
        console.log(response);
      });
      e.preventDefault();
    });
    $('#resume .skills button').click(function(e){
      o.update('.skills', function(response){
        console.log(response);
      });
      e.preventDefault();
    });
    $('#resume .certifications button').click(function(e){
      o.update('.certifications', function(response){
        console.log(response);
      });
      e.preventDefault();
    });
    $('#resume .additionalInformations button').click(function(e){
      o.update('#resume .additionalInformations', function(response){
        console.log(response);
      });
      e.preventDefault();
    });
  };
}