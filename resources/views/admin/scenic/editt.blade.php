@extends('admin.base.base')

@section('content')
<head>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body class="">
    <div class="form-group">
        <div class="col-md-4 col-md-offset-5 bt"><span class="glyphicon glyphicon-picture"></span>修改图片信息</div>
    </div>
    <div class="">
        <form action="/admin/scenic/{{ $list->id }}/update" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <div class="col-md-1 col-md-offset-4 ebt">图片:</div>
                <div class="col-md-3 dbt">
                    <input id="files" type="file" onchange="previewImage(this, 'prvid')" multiple="multiple">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3 col-md-offset-5">
                    <div id="prvid"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3 col-md-offset-5"><button class="input-lg btn-success">确认修改</button></div>
            </div>

        </form>
    </div>

<!-- 此处引入jQuery -->
<script src="{{asset('/js/jquery.min.js')}}"></script>
<script src="{{asset('/js/jquery-2.0.2.min.js')}}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>

<script type="text/javascript">
    function previewImage(file, prvid) {
        /* file：file控件
        * prvid: 图片预览容器
        */ 
        var tip = "格式不对!"; // 设定提示信息
        var filters = {
            "jpeg" : "/9j/4",
            "gif" : "R0lGOD",
            "png" : "iVBORw"
        }
        var prvbox = document.getElementById(prvid);
        prvbox.innerHTML = "";
        if (window.FileReader) { // html5方案
            for (var i=0, f; f = file.files[i]; i++) {
                var fr = new FileReader();
                fr.onload = function(e) {
                    var src = e.target.result;
                    if (!validateImg(src)) {
                        alert(tip);
                    } else {
                        showPrvImg(src);
                    }
                }
                fr.readAsDataURL(f);
            }
        } else { // 降级处理
            if ( !/\.jpg$|\.png$|\.gif$/i.test(file.value) ) {
                alert(tip);
            } else {
                showPrvImg(file.value);
            }
        }

    function validateImg(data) {
        var pos = data.indexOf(",") + 1;
        for (var e in filters) {
            if (data.indexOf(filters[e]) === pos) {
                return e;
            }
        }
        return null;
    }

    function showPrvImg(src) {
        var img = document.createElement("img");
        img.src = src;
        prvbox.appendChild(img);
        $("#files").attr("name","file");
        $("#prvid img").css({ width: "250px", height: "150px" });
        }
    }

</script>
</body>
@endsection