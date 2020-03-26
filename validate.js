function validate() {
            

    var x= document.getElementById("psw").value;
    var y= document.getElementById("psw-repeat").value;

            
            if (x == '') 
                alert ("Please enter Password"); 
                  
            
            else if (y == '') 
                alert ("Please enter confirm password"); 
                  
                 
            else if (x != y) { 
                alert ("\nPassword did not match: Please try again.");
                
            } 

var q=document.getElementById("phn").value;

    if (q.match(/^\+?[0-9-]+$/))
    {
    
    }
    else
    {
    
      alert("You have entered an invalid mobile-number");
      

    }

 var z= document.getElementById("mail").value;

    if (z.match(/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(.\w{2,3})+$/))
    {
        return true;
    }
    else
    {

        alert("You have entered an invalid email address");
        return false;

    }

}


$(document).ready(function(){

   $("#txt_username").keyup(function(){

      var username = $(this).val().trim();

      if(username != ''){

         $.ajax({
            url: 'ajaxfile.php',
            type: 'post',
            data: {username: username},
            success: function(response){

                $('#uname_response').html(response);

             }
         });
      }else{
         $("#uname_response").html("");
      }

    });

 });


 var myInput = document.getElementById("psw");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

     myInput.onfocus = function() {
      document.getElementById("message").style.display = "block";
    }
    
    
    myInput.onblur = function() {
      document.getElementById("message").style.display = "none";
    }
    
    
    myInput.onkeyup = function() {
     
      var lowerCaseLetters = /[a-z]/g;
      if(myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
      } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
    }
    
      
      var upperCaseLetters = /[A-Z]/g;
      if(myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
      }
    
     
      var numbers = /[0-9]/g;
      if(myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
      }

      if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
 }



                
   