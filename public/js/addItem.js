/**
 * Created by ldc on 2017/4/2.
 */
$('#addItem').click(function () {
    var item = new Object();

    item.name = $('#itemName').val();
    item.intro = $('#itemIntro').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   $.ajax({
       url:window.location.pathname,
       type:'post',
       data: item,
       dataType:'json',
       success:function (reponse) {
           window.location = reponse.url;
       },
       error:function () {
           alert('出错啦');
       }
       
   });



});