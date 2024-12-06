/**
 * Перевірка згнаннь по уроку
 */

jQuery('.test-form').on('submit', function (e) {

  e.preventDefault();

  const thisForm = jQuery(this);

  const questionList = thisForm.find('.question');//Перелік питань

  const questionQuantity = Number(questionList.length);//Загальна кількість питань

  const testSuccessNumber = Number( atob( thisForm.find('input[name = success]').val()) );//Кількість правельних відповідей для проходження тесту

  const lessonId = Number( atob( thisForm.find('input[name = lesson]').val()) );//Ідентифікатор уроку

  const userId = Number( thisForm.find('input[name = user]').val() );//Ідентифікатор користувача

  let successAnswer = 0;

  questionList.each(function () {//Перевірка відповілі на питання

    let thisQuestion = jQuery(this);

    let rightAnswer = '';

    if ( thisQuestion.find('.hash').length ){//Перевірка відповіділоя варіанту з однією відповіддю
      rightAnswer = Number(atob(thisQuestion.find('.hash').val()));

      let userAnswer = Number( thisQuestion.find('.form-check-input:checked').val() );

      if ( userAnswer == rightAnswer ){
        successAnswer++;
      }
    }

    if ( thisQuestion.find('.hash-multi').length ){//Перевірка відповіді з кількома варіантами відповідей
      let multiStr = atob(thisQuestion.find('.hash-multi').val());
      let hashArray = multiStr.split(' ');

      let checkedArray = [];
      let checkboxElements =  thisQuestion.find('.checkbox');
      for(var i=0; checkboxElements[i]; ++i){

        if(checkboxElements[i].checked){
          checkedArray.push(checkboxElements[i].value);
        }
      }

      if ( hashArray.length === checkedArray.length && hashArray.every((element, index) => element === checkedArray[index])) {
        successAnswer++;
      }
    }

  });

  if ( successAnswer < testSuccessNumber ){//Повідомлення про невдале проходження тестування
    jQuery('.lesson-test-result .alert-danger').removeClass('d-none');

  }else{

    const data = {
      action: 'user_lesson_testing',
      userId: userId,
      lessonId: lessonId
    }

    jQuery.post( yuna_ajax.url,data, function(response) {//Повідомлення про вдале проходження тестування
      jQuery('.lesson-test-result .alert-danger').addClass('d-none');
      jQuery('.lesson-test-result .alert-success').removeClass('d-none');
    });

  }

});

/**
 * Редагування імені користувача
 */

jQuery('.edit-btn').on('click', function (e) {

  e.preventDefault();

  jQuery('.user-info__full-name').addClass('eddited');
});

/**
 * Додати аатар
 */

/*
jQuery('#add-avatar').on('click', function (e) {

  e.preventDefault();

  let thisUser = jQuery(this);

  let userId = Number(thisUser.attr('data-user-id'));
  let reloadUrl = atob(thisUser.attr('data-reload'));

  const data = {
    action: 'add_user_avatar',
    userId: userId,
    reloadUrl: reloadUrl
  }

  jQuery.post( yuna_ajax.url,data, function(response) {

  });
})*/
