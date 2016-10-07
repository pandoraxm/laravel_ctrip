function tianqi(){
    $.ajax({
        url:"/tianqia",
        dataType:"text",
        type:"get",
        success: function(data){
            eval('var tianqi = ' + data + ';');
            $('#tq-img').attr('src','../tianqi/'+tianqi.results[0].now.code+'.png');
            $('#dq').html(tianqi.results[0].location.name);
            $('#tq').html(tianqi.results[0].now.text);
            $('#wd').html(tianqi.results[0].now.temperature+'℃');
        }
    });
};
setInterval(tianqi,1800000);
tianqi();