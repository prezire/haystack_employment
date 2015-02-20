function Resume()
{
  this.sCloseUi;
  //
  this.init = function(){
    this.sCloseUi = '<a href="#" class="close">&times;</a>';
    $('#resume form').hide();
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
    li.find('.datepicker').datepicker({dateFormat: 'yy-mm-dd'});
    li.find('.datepicker').datepicker('option', 'dateFormat', 'yy-mm-dd');
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
    $('#resume.update .options .forward').click(function(e){
      e.preventDefault();
      $('.options .row.panel.recipients').slideToggle();
    });
    $('#resume.update li .close').live('click', function(e){
      $(this).parent().remove();
      e.preventDefault();
    });
    $('#resume.update .button.addWorkHistory').click(function(e){
      o.addItem($('.hidden .workHistoryView'), $('.workHistories ul'));
      e.preventDefault();
    });
    $('#resume.update .button.addEducation').click(function(e){
      o.addItem($('.hidden .educationView'), $('.educations ul'));
      e.preventDefault();
    });
    $('#resume.update .button.addSkills, #resume.update .button.addCertification').click(function(e){
      var ul = $(this).parent().parent().parent().parent().find('form ul');
      o.addTextField(ul);
      e.preventDefault();
    });
    //
    $('#resume.update section i').click(function(e){
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
    $('#resume.update .resume button').click(function(e){
      o.update('.resume', function(response){
        console.log(response);
      });
      e.preventDefault();
    });
    $('#resume.update .workHistories button').click(function(e){
      o.update('.workHistories', function(response){
        console.log(response);
      });
      e.preventDefault();
    });
    $('#resume.update .educations button').click(function(e){
      o.update('.educations', function(response){
        console.log(response);
      });
      e.preventDefault();
    });
    $('#resume.update .skills button').click(function(e){
      o.update('.skills', function(response){
        console.log(response);
      });
      e.preventDefault();
    });
    $('#resume.update .certifications button').click(function(e){
      o.update('.certifications', function(response){
        console.log(response);
      });
      e.preventDefault();
    });
    $('#resume.update .additionalInformations button').click(function(e){
      o.update('#resume.update .additionalInformations', function(response){
        console.log(response);
      });
      e.preventDefault();
    });
  };
}