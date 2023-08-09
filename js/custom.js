$(function() {
    function setModalTimer() {
      let index = 10;
      console.log($('.modal__timer'));
      if(!$('.modal__timer').length) return;
      setInterval(function() {
          $('.modal__timer').html(index--);
          if (!index) {
              window.location = 'https://gesbes.com';
          }
      }, 1000);
  }

  function addLogoutLink() {
    $('.logout').remove();
    $('.auth').before('<a class="logout" href="/logout.php">logout</a>');
  }


  function handlSuccessResult(email){
    const successMessage = '<div class="success-message">Success</div>'
      $('.auth-form').append(successMessage);
      setTimeout(function() {
        $('.modal-bg').remove();
        $('.auth').before('<div class="modal-bg"><p class="modal-message">Вы зарегестрировались через почту ' + email + '</p> <p> Вы будете перенаправленны на gesbes.com через: <span class="modal__timer"></span></p></div>');
        setTimeout(setModalTimer, 1000);
        
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


  function checkEmailAuth(formId) {
    var msg = $('#' + formId).serialize();
    $.ajax({
        type: 'POST',
        url: '/email_login.php',
        data: msg,
        beforeSend: function() {
            $('.auth-form').append('<img class="loading-image" src="img/loading.gif"/>');
        },
        success: function (data) {
          $('.loading-image').remove();
            const result = JSON.parse(data);
            if (result.result != 'error'){
                handlSuccessResult(result.result);
            } else {
                handlErrorResult();
            }
        },
        error: function (xhr, str) {
            alert('Возникла ошибка: ' + xhr.responseCode);
        }
    });
  }


  // function checkVkAuth() {

  //   window.location = '/vk_login.php';
  // }


  function addFormEvents(formId) {
      $('#' + formId).submit(function(e){
          e.preventDefault();

          const trigger = $(e.originalEvent.submitter);
          if (trigger.hasClass('auth-form__submit')) {
            checkEmailAuth(formId);
          }
          // } else if (trigger.hasClass('auth-form__vk-button')) {
          //   checkVkAuth();
          // }
          
      });
  }

  addFormEvents('auth-form');

  setModalTimer();


  

});