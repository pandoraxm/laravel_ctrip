<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>PHP+MySQLI的学生信息管理</title>
    </head>
    <body>
        <center>
           
            <h3>文件上传</h3>
            <form action="/uploads" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="file" name="mypic">
                <input type="submit">
            </form>
        </center>
    </body>
</html>