function register(){

      var name = document.getElementById('name').value;
      var email=document.getElementById('email').value;
      var mobile=document.getElementById('mobile').value;
      var fileInput = document.getElementById('file'); 
      var filePath = fileInput.value; 
      // Allowing file type 
      var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i; 
      var address=document.getElementById('address').value;
      var male=document.getElementById('gen1').value;
      var female=document.getElementById('gen2').value;
      var password=document.getElementById('password').value;
      var department=document.getElementById('department').value;
      var role=document.getElementById('role').value;

      //name
      if(name == ""){
        document.getElementById('rname').innerHTML =" ** Please fill the Name field";
        return false;
      }
      if((name.length <= 2) || (name.length > 20)) {
        document.getElementById('rname').innerHTML =" ** Name lenght must be between 2 and 20";
        return false; 
      }
            if(!isNaN(name)){
        document.getElementById('rname').innerHTML =" ** only characters are allowed";
        return false;
      }
      // email
      if(email == ""){
        document.getElementById('remail').innerHTML =" ** Please fill the email id field";
        return false;
      }
      if(email.indexOf('@') <= 0 ){
        document.getElementById('remail').innerHTML =" ** @ Invalid Position";
        return false;
      }

      if((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.')){
        document.getElementById('remail').innerHTML =" ** . Invalid Position";
        return false;
      }
      // mobile
      if(mobile == ""){
        document.getElementById('rmobile').innerHTML =" ** Please fill the Mobile Number";
        return false;
      }
      if(mobile.length != 10) {
        document.getElementById('rmobile').innerHTML =" ** Mobile Number must be 10 digit number";
        return false; 
      }
            if(isNaN(mobile)){
        document.getElementById('mobile').innerHTML =" ** only digits are allowed";
        return false;
      }
      // image
             if (!allowedExtensions.exec(filePath)) { 
                document.getElementById('rfile').innerHTML =" ** Invalid image type"; 
                fileInput.value = ''; 
                return false; 
            }  
            else  
            { 
              
                // Image preview 
                if (fileInput.files && fileInput.files[0]) { 
                    var reader = new FileReader(); 
                    reader.onload = function(e) { 
                        document.getElementById( 
                            'imagePreview').innerHTML =  
                            '<img src="' + e.target.result 
                            + '"/>'; 
                    }; 
                      
                    reader.readAsDataURL(fileInput.files[0]); 
                } 
            } 
      //address
      if(address == ""){
        document.getElementById('raddress').innerHTML =" ** Please fill the address field";
        return false;
      }
      if((address.length <= 8) || (address.length > 150)) {
        document.getElementById('raddress').innerHTML =" ** Address lenght must be between 8 and 150";
        return false; 
      }
      //gender
      if(validsex(male,female)){
        
      }
      function validsex(male,female){
        y=0;
  if(male.checked){
    y++;
  }
  else if(female.checked)
  {
    y++;
  }
   else if(y==0)
  {
    document.getElementById('gender').innerHTML =" ** Please choose the Gender field";
  }
  else{
    alert("Registered Successfully");
    }
  }
      // password
      if(password == ""){
        document.getElementById('rpassword').innerHTML =" ** Please fill the password field";
        return false;
      }
      if((password.length <= 4) || (password.length > 9)) {
        document.getElementById('rpassword').innerHTML =" ** Password lenght must be between 4 and 9";
        return false; 
      }
            if(!isNaN(password)){
        document.getElementById('rpassword').innerHTML =" ** only characters are allowed";
        return false;
      }
      //department
      if(department == "-1"){
        document.getElementById('rdepartment').innerHTML =" ** Please choose the department feild ";
        return false;
      }
      //role
      if(role == "-1"){
        document.getElementById('rrole').innerHTML =" ** Please choose the role feild ";
        return false;
      }
      
      else{
      alert("Registered Successfully!!");
      }

    
    
}