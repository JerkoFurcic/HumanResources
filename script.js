const livesearch = document.getElementById('livesearch');
const searchresult = document.getElementById('searchresult');
const rbr = document.getElementById('rbr');
const oib = document.getElementById('oib');
const zivotopis = document.getElementById('zivotopis');
const forminsertosobe = document.getElementById('forminsertosobe');
const errorElement = document.getElementById('error');
const loaddoc = document.getElementById('demo');


//????
function activeInactive(val, userID) {
  $.ajax({
    url: "activeinactive.php",
    method: "POST",
    data: {val:val,userID:userID},

    success: function(result) {
      if (result == 1) {
        $('#str' + userID).html('Active');
      } else {
        $('#str' + userID).html('Inactive');
      }
    }
  });
}///

//prikaz podataka bez refresha
function loadDoc() {
  const xhttp = new XMLHttpRequest();
  xhttp.open("GET", "loaddata.php");

  xhttp.onload = function() {
    document.getElementById('demo').innerHTML = this.responseText;
  }
  xhttp.send();
}

//provjera unosa osobe
forminsertosobe.addEventListener('submit', (e) => {
  let message = []
  if (rbr.value === '') {
    message.push('Unesite redni broj!');
  }
  if (zivotopis.value.lenght <= 10) {
    message.push('Životopis mora sadržavati više od 10 znakova!');
  } 
  if (oib.value === 0) {
    message.push('Unesite broj!');
  }

  if (message.length > 0) {
    e.preventDefault()
    errorElement.innerText = message.join(', ');
  }
});

//ajax livesearch osobe
$(document).ready(function() {
  $("#livesearch").keyup(function() {
    var input = $(this).val();

    if (input != "") {
      $.ajax({
        url: "ispis/ispisosoba.php",
        method: "POST",
        data: {input:input},
        
        success: function(data){
          $("#searchresult").html(data);
          $("#searchresult").css("display", "block");
        }
      });
    } else {
      $("#searchresult").css("display", "none");
    }
  });
});

//google captcha
grecaptcha.ready(function() {
  grecaptcha.execute('6Lc03QIkAAAAAMFEwjDYx4krplp04dO41eOYaFMe', {action: 'submit'}).then(function(token) {
  document.getElementById('g-recaptcha-response').value=token;
  });
});

// function sendEmail() {
//   var name = $("name");
//   var email = $("email");
//   var txtarea = $("txtarea");

//   if (isNotEmty(name) && isNotEmtpy(email) && isNotEmtpy(txtarea) ) {
//     $.ajax ({
//       url: 'sendemail.php',
//       method: 'POST',
//       dataType: 'json',
//       data: {
//         name: name.val(),
//         email: email.val(),
//         txtarea: txtarea.val()
//       }, success: function(response) {
//         $('#sendemail')[0].reset();
//         $('.sentnotification').text("Message successfuly sent.");
//       }
//     })
//   }
// }
// function isNotEmpty(caller) {
//   if (caller.val() == "") {
//     caller.css('border', '1px solid red');
//     return false;
//   }
//   else {
//     caller.css('border', '');
//     return true;
//   }
// }

