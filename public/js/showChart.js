/**
 * Created by ldc on 2017/2/12.
 */


$('.like').click(function () {

    var chart_id = $('#chart_id').html();

    var chart = new Object();
    chart.id = chart_id;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

     $.ajax({
     url:'/chart_like',
     type:'get',
     data:chart,
     dataType:'json',
     success:function (result) {
        if(result.result == true){

            $('#like').html('已收藏');
        }else{
            $('#like').html('收藏');
        }

     },
     error:function (response) {
        if(response.status == 401){
            window.location='/login';
        }
     }

     });

});



//添加元素

$('#addElement').click(function () {
   var addElement = window.location.pathname+'/addItem';
   window.location = addElement;
});