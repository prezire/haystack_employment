$(document).ready(function(){
  function Fb()
  {
    this.appId;
    this.init = function(appId){
      this.appId = appId;
      //Load the SDK asynchronously.
      (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
      this.setListeners();
    };
    this.setListeners = function(){
      var o = this;
      //
      window.fbAsyncInit = function(){
        FB.init({
          appId: o.appId,
          //Enable cookies to allow the server to access the session.
          cookie: true,
          //Parse social plugins on this page.
          xfbml: true,
          version: 'v2.1'
        });
      };
      $('.btnFb').click(function(e){
        //<a class="btnFb" permissions="public_profile,email,user_location,user_birthday">FB Login</a>
        e.preventDefault();
        o.fbCheckLoginStatus($(this).attr('permissions'));
      });
    };    
    this.fbCheckLoginStatus = function()
    {
      var o = this;
      FB.getLoginStatus(function(response){
        o.fbOnStatusChange(response);
      });
    };
    //Dependent on Open Graph (OG) Meta tags.
    //https://developers.facebook.com/docs/sharing/reference/share-dialog
    this.fbShareDialog = function(href)
    {
      FB.ui({
        method: 'share',
        href: href,
      }, function(response){
        //
      });
    };
    //Dependent on GET Parameters.
    //https://developers.facebook.com/docs/sharing/reference/feed-dialog/v2.2
    this.fbFeedDialog = function()
    {
      FB.ui({
        method: 'feed',
        link: 'https://developers.facebook.com/docs/',
        caption: 'An example caption',
      }, function(response){
        //
      });
    };
    this.fbOnStatusChange = function(response)
    {
      if(response.status == 'connected')
      {
        //Logged into your app and Facebook.
        this.fbOnLoginSuccess(response);
      } 
      else if(response.status == 'not_authorized')
      {
        //Logged into Facebook, but not your app.
        //$('#status').innerHTML = 'Please log into this app.';
        this.fbLogin();
      } 
      else 
      {
        //Not logged into Facebook, so we're not sure if
        //they are logged into this app or not.
        //$('#status').innerHTML = 'Please log into Facebook.';
        this.fbLogin();
      }
    };
    this.fbOnLoginSuccess = function(response)
    {
      var o = this;
      console.log('Welcome! Fetching your information...');
      var token = response.authResponse.accessToken;
      //FB UID.
      var userId = response.authResponse.userID;
      //console.log(token, userId);
      FB.api('/me', function(response){
        o.onUserInfoFetched(response);
      });
    };
    //Public callback when the user logs in successfully and 
    //the FB API request is made about the user info.
    this.onUserInfoFetched = function(response){
      var email = response.email;
        var name = response.name;
        console.log('Thanks for logging in, ' + name + '!');
        /*
          Send to server-side and create a session using params.
          $.ajax
          (
            {
              url: 'auth/fbLogin/' + email + 
              '/' + name + '/' + userId, 
              success: function(response){}
            }
          );
        */
    };
    this.fbLogin = function(permissions)
    {
      var o = this;
      FB.login(function(response)
      {
        if(response.authResponse)
        {
          o.fbOnLoginSuccess(response);
        } 
        else 
        {
          //User hit cancel button.
          console.log('User cancelled login or did not fully authorize.');
        }
      }, 
        {scope: permissions}
      );
    };
  }
  //
  var f = new Fb();
  f.onUserInfoFetched = function(response){
    //...
  };
  f.init('748620185222813');
});