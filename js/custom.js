$(function() {

  function addLogoutLink() {
    $('.logout').remove();
    $('.auth').before('<a class="logout" href="/logout.php">logout</a>');
  }


  function handlSuccessResult(){
    const successMessage = '<div class="success-message">Success</div>'
      $('.auth-form').append(successMessage);
      setTimeout(function() {
        $('.success-message').remove()
      }, 3000);
      addLogoutLink();
  }

  function handlErrorResult(){
    const successMessage = '<div class="error-message">Error</div>'
      $('.auth-form').append(successMessage);
      setTimeout(function() {
        $('.error-message').remove()
      }, 3000);
  }

  function checkAuth(formId) {
    var msg = $('#' + formId).serialize();
    $.ajax({
        type: 'POST',
        url: '/auth.php',
        data: msg,
        beforeSend: function() {
            $('.auth-form').append('<img class="loading-image" src="img/loading.gif"/>');
        },
        success: function (data) {
          $('.loading-image').remove();
            const result = JSON.parse(data);
            if (result.result == 'success'){
                handlSuccessResult()
            } else {
                handlErrorResult();
            }
        },
        error: function (xhr, str) {
            alert('Возникла ошибка: ' + xhr.responseCode);
        }
    });
  }

  function addFormEvents(formId) {
      $('#' + formId).submit(function(e){
          e.preventDefault();
          checkAuth(formId);
      });
  }

  addFormEvents('auth-form');


});