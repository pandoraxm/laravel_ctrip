@extends('admin.base.base')

@section('content')
<head>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <style>
        #feedback{width:1200px;margin:0 auto;}
        #feedback img{float:left;width:300px;height:300px;}
    </style>
</head>
<body class="">
    <div class="form-group">
        <div class="col-md-4 col-md-offset-5 bt"><span class="glyphicon glyphicon-picture"></span>添加展示页</div>
    </div>
    <div class="">
        <form action="/admin/show" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <div class="col-md-1 col-md-offset-4 ebt">标题:</div>
                <div class="col-md-3">
                    <input type="text" name="name" class="form-control input-sm" placeholder="请输入标题">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1 col-md-offset-4 ebt">说明:</div>
                <div class="col-md-3">
                    <input type="text" name="name_er" class="form-control input-sm" placeholder="请输入说明">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1 col-md-offset-4 ebt">归类:</div>
                <div class="col-md-3 dbt">
                    <input type="radio" name="class" value="1" checked>精选&nbsp;&nbsp;
                    <input type="radio" name="class" value="2">热门&nbsp;&nbsp;
                    <input type="radio" name="class" value="3">酒店&nbsp;&nbsp;
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1 col-md-offset-4 ebt">详细:</div>
                <div class="col-md-3">
                    <input type="text" name="title" class="form-control input-sm" placeholder="请输入小标题">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1 col-md-offset-4 ebt">说明:</div>
                <div class="col-md-3">
                    <input type="text" name="title_er" class="form-control input-sm" placeholder="请输入说明">
                    <input type="text" name="title_san" class="form-control input-sm" placeholder="请输入说明">
                    <input type="text" name="title_si" class="form-control input-sm" placeholder="请输入说明">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1 col-md-offset-4 ebt">状态:</div>
                <div class="col-md-3 dbt">
                    <input type="radio" name="status" value="1" checked>显示&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="status" value="0">不显示
                </div>
            </div>
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
                <div class="col-md-3 col-md-offset-5"><button class="input-sm btn-success">确认添加</button></div>
            </div>

        </form>
    </div>

<!-- 此处引入jQuery -->
<script src="{{asset('/js/jquery.min.js')}}"></script>
<script src="{{asset('/js/jquery-2.0.2.min.js')}}"></script>
<!-- bootstrap.min.js必须放在JQ后面 -->
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