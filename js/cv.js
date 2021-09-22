function resume(){
      var name = document.getElementById('name9').value;
      var email=document.getElementById('email9').value;
      var fileInput = document.getElementById('file9'); 
      var filePath = fileInput.value; 
      // Allowing file type 
      var allowedExtensions = /(\.pdf|\.txt|\.csv|\.docx)$/i; 
      //name
      if(name == ""){
        document.getElementById('rname9').innerHTML =" ** Please fill the Name field";
        return false;
      }
      if((name.length <= 2) || (name.length > 20)) {
        document.getElementById('rname9').innerHTML =" ** Name lenght must be between 2 and 20";
        return false; 
      }
            if(!isNaN(name)){
        document.getElementById('rname9').innerHTML =" ** only characters are allowed";
        return false;
      }
      // email
      if(email == ""){
        document.getElementById('remail9').innerHTML =" ** Please fill the email id field";
        return false;
      }
      if(email.indexOf('@') <= 0 ){
        document.getElementById('remail9').innerHTML =" ** @ Invalid Position";
        return false;
      }

      if((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.')){
        document.getElementById('remail9').innerHTML =" ** . Invalid Position";
        return false;
      }
      // image
             if (!allowedExtensions.exec(filePath)) { 
                document.getElementById('rfile9').innerHTML =" ** Invalid FILE type"; 
                fileInput.value = ''; 
                return false; 
            }  
      else{
      alert("Resume/CV Submitted Successfully!!");
      }

    
    
}