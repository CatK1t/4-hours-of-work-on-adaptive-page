// Функция для кроссбраузерности (для браузеров которые не поддерживают calc())

window.onload = function(){
    
    if(!checkCalc()){
        var style = document.createElement('link');
        style.setAttribute('rel','stylesheet');
        style.setAttribute('href','css/style-nocalc.css');
        document.body.appendChild(style);
    }

}

function checkCalc(){
    var div = document.createElement('div');
    div.style.cssText = 'width: calc(100%)';
    return div.style.length > 0;
}

// Конец проверки
//mask phone
   jQuery(function($){
   $("#phone").mask("+380(99) 999-9999")
   });
//mask end
//form


   $(function() {
    $('.error').hide();
    $(".button").click(function() {
      // validate and process form here
      
      $('.error').hide();
  	  var name = $("input#name").val();
  		if (name == "") {
        $("label#name_error").show();
        $("input#name").focus();
        return false;
      }
  		var phone = $("input#phone").val();
  		if (phone == "") {
        $("label#phone_error").show();
        $("input#phone").focus();
        return false;
      }
      
    var dataString = 'name='+ name + '&phone=' + phone;
    $.ajax({
        type: "POST",
        url: "php/contact-form.php",
        data: dataString,
        success: function() {
        $('#contact_form').html("<div id='message'></div>");
        $('#message').html("<h2>Contact Form Submitted!</h2>")
        .append("<p>We will be in touch soon.</p>")
        .hide()
        }
    });
    return false;

    });
  });
