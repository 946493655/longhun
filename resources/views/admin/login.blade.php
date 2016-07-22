<!DOCTYPE html>
<html>
<head>
    <title>龙魂-管理</title>
    <meta charset="utf-8">
    <link href="{{$pub}}css/admin.css" rel="stylesheet" type="text/css">
</head>
<body>
    <style>
        .out { margin:0 auto;width:600px;border:1px solid lightgrey;border-radius:5px;font-family:"微软雅黑"; }
        p { text-align:center;font-size:25px; }
        table { margin:20px auto;width:400px;font-size:25px; }
        td { padding:5px; }
        input { padding:5px 10px;border:1px solid lightgrey;border-radius:5px;font-size:20px;font-family:"微软雅黑"; }
        #submit { padding:3px 20px;color:white;border:1px solid rgb(14,144,210);background:rgb(14,144,210);cursor:pointer; }
    </style>
    <div style="height:150px;">{{--空白--}}</div>
    <div class="out">
        <p><b>龙魂世界</b></p>
        <form role="form" method="POST" action="{{$domain}}lhadmin/login" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <table>
                <tr>
                    <td>昵 称：</td>
                    <td><input type="text" name="name" placeholder="中文，2-6位"></td>
                </tr>
                <tr>
                    <td>密 码：</td>
                    <td><input type="text" name="pwd" placeholder="字母数字组合，6-20位"></td>
                </tr>
            </table>
            <p class="star"></p>
            <table>
                <tr><td colspan="2" style="text-align:center;"><input type="submit" id="submit" value="登 录"></td></tr>
            </table>
        </form>
    </div>

    {{--js事件--}}
    <script src="{{$pub}}js/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("input[name='name']").blur(function(){
                if ($(this).val()=='') { $(".star").html("昵称必填！"); }
                if ($(this).val().length<2 || $(this).val().length>6) {
                    $(".star").html("昵称在2-6个字符之间！");
                }
            });
            $("input[name='pwd']").blur(function(){
                if ($(this).val()=='') { $(".star").html("密码必填！"); }
                if ($(this).val().length<6 || $(this).val().length>20) {
                    $(".star").html("密码在6-20个字符之间！");
                }
            });
        });
    </script>
</body>
</html>