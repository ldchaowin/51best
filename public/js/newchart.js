/**
 * Created by ldc on 2016/9/27.
 */

$('#releaseChart').click(function () {

    var chart = new Object();

    chart.name = $('#charName').val();
    chart.intro = $('#charIntro').val();

    var items = new Array();

    $('.item').each(function () {
        var item = new Object();
        item.name = $(this).find("input[name='itemName']").val();
        item.intro = $(this).find("textarea[name='itemIntro']").val();
        item.ranking = $(this).find(".ch_span").text();
        items.push(item);

    });
    chart.item_num = items.length;
    chart.items = items;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    chart.user_id = $('meta[name="ch_auth_id"]').attr('content');

     $.ajax({
     url:'/new_chart',
     type:'post',
     data: chart,
     dataType:'json',

     success:function (response) {
        window.location.href=response.url;
     },
     error:function () {

     alert('出错啦~');
     }
     });






});
