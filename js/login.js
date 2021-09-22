function login(){

      var lemail=document.getElementById('lemail').value;
      var lpassword=document.getElementById('lpassword').value;

      // email
      if(lemail == ""){
        document.getElementById('lremail').innerHTML =" ** Please fill the email id field";
        return false;
      }
      if(lemail.indexOf('@') <= 0 ){
        document.getElementById('lremail').innerHTML =" ** @ Invalid Position";
        return false;
      }

      if((lemail.charAt(lemail.length-4)!='.') && (lemail.charAt(lemail.length-3)!='.')){
        document.getElementById('lremail').innerHTML =" ** . Invalid Position";
        return false;
      }
      // password
      if(lpassword == ""){
        document.getElementById('lrpassword').innerHTML =" ** Please fill the password field";
        return false;
      }
      if((lpassword.length <= 4) || (lpassword.length > 9)) {
        document.getElementById('lrpassword').innerHTML =" ** Password lenght must be between 4 and 9";
        return false; 
      }
            if(!isNaN(lpassword)){
        document.getElementById('lrpassword').innerHTML =" ** only characters are allowed";
        return false;
      }
      else{
      alert("Login Successfully!!");
      }

    
    
    }
