console.log(100);

/*jQuery('.users-courses').on('submit', function(e){

  e.preventDefault();

  const thisForm = jQuery(this);

  let action = thisForm.find('input[name = action]').val();
  let userId = Number(thisForm.find('input[name = user-id]').val());
  let cursesList = [];

  thisForm.find('input:checked').each(function () {

    cursesList.push(Number(jQuery(this).val()));

  });

  let data = {

    action: 'user_course',
    userId: userId,
    cursesList: cursesList

  };


  jQuery.post( _wpUtilSettings.url, data, function(response) {

    if( jQuery.trim(response) !== ''){

      console.log(response);

    }
  });



});*/
