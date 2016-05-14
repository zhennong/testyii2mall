//头像上传相关js
$(window).load(function() {
    var options =
    {
        thumbBox: '.thumbBox',
        spinner: '.spinner',
        imgSrc: '/images/avatar.jpg'
    }
    var cropper = $('.imageBox').cropbox(options);
    $('#upload-file').on('change', function(){
        var reader = new FileReader();
        reader.onload = function(e) {
            options.imgSrc = e.target.result;
            cropper = $('.imageBox').cropbox(options);
        }
        reader.readAsDataURL(this.files[0]);
        this.files = [];
    });
    $('#btnCrop').on('click', function(){
        var img = cropper.getDataURL();
        //alert(img);
        $.ajax({
            //提交数据的类型 POST GET
            type:"POST",
            //提交的网址,如果不是伪静态的,请配置伪静态或去掉.html
            url:"/persons/person/toux.html",
            //提交的数据
            data:{base:img},
            //返回数据的格式
            datatype: "text",//"xml", "html", "script", "json", "jsonp", "text".
            //在请求之前调用的函数
            //beforeSend:function(){$("#msg").html("logining");},
            //成功返回之后调用的函数
            //success:function(data){
            //    $("#msg").html(decodeURI(data));
            //}   ,
            //调用执行后调用的函数
            complete: function(XMLHttpRequest, textStatus){
                alert(XMLHttpRequest.responseText);
                //alert(textStatus);
                //HideLoading();
            },
            //调用出错执行的函数
            error: function(){
                //请求出错处理
            }
        });
        $('.cropped').html('');
        $('.cropped').append('<img src="'+img+'" align="absmiddle" style="width:64px;margin-top:4px;border-radius:64px;box-shadow:0px 0px 12px #7E7E7E;" ><p>64px*64px</p>');
        $('.cropped').append('<img src="'+img+'" align="absmiddle" style=" width:128px;margin-top:4px;border-radius:128px;box-shadow:0px 0px 12px #7E7E7E;"><p>128px*128px</p>');
        $('.cropped').append('<img src="'+img+'" align="absmiddle" style=" width:180px;margin-top:4px;border-radius:180px;box-shadow:0px 0px 12px #7E7E7E;"><p>180px*180px</p>');
    })
    $('#btnZoomIn').on('click', function(){
        cropper.zoomIn();
    })
    $('#btnZoomOut').on('click', function(){
        cropper.zoomOut();
    })
});