<!DOCTYPE html>
<html>
<head>
    <title>龙魂</title>
    <meta charset="utf-8">
    {{--<link rel="icon" type="image/png" href="/assets/images/icon.png">--}}
    {{--<link rel="stylesheet" type="text/css" href="/assets-home/css/home.css">--}}
    <script src="/js/jquery.min.js"></script>
    <script src="/js/amazeui.js"></script>
    <style>
        body { font-family:"黑体"; }
        .title { color:black;font-size:50px;text-align:center; }
        table { margin:0 auto;width:500px;font-size:20px; }
        .right { color:rgba(100,100,100,1);font-size:30px;/*float:right;*/ }
        .td_r { width:250px;/*border-bottom:1px dotted lightgrey;*/ }
        input { padding:5px 10px;width:300px;font-size:25px;font-family:"黑体";border:0;border-bottom:1px solid rgba(220,220,220,1); }
        .small { color:red;font-size:16px; }
        .submit { margin:50px auto;text-align:center; }
        .submit button { padding:10px 50px;font-size:20px;font-family:"黑体";color:white;border:1px solid rgba(14,144,210,1);background:rgba(14,144,210,1);cursor:pointer; }
        .submit button:hover { border:1px solid rgba(12,121,177,1);background:rgba(12,121,177,1); }
    </style>
</head>
<body>
<p class="title"><b>带你挣钱带你飞！</b></p>
<form method="POST" enctype="multipart/form-data" action="/login">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="POST">
    <table>
        <tr>
            <td class="right">用户名：</td>
            <td class="td_r">
                {{--<span class="small">丿龍魂丶</span>--}}
                <input type="text" placeholder="输入昵称" name="name">
                {{--<span class="small">『２H㊣至尊(钻石/高级)』</span>--}}
            </td>
        </tr>
        <tr>
            <td class="right">&nbsp;</td>
            <td><div class="small" id="nameMsg">&nbsp;</div></td>
        </tr>
        <tr>
            <td class="right">密 码：</td>
            <td class="td_r">
                <input type="password" placeholder="6-20位字母数字组合" name="pwd">
            </td>
        </tr>
        <tr>
            <td class="right">&nbsp;</td>
            <td><div class="small" id="pwdMsg">&nbsp;</div></td>
        </tr>
    </table>
    <p class="submit"><button type="submit">登 录</button></p>
</form>
<script>
    $(document).ready(function(){
        $("input[name='name']").change(function(){
            if ($(this).val()=='') { $("#nameMsg").html('昵称不能空！'); return; }
            else if ($(this).val().length < 2) { $("#nameMsg").html('昵称不能少于2位！'); return; }
            else if ($(this).val().length > 6) { $("#nameMsg").html('昵称不能大于20位！'); return; }
        });
        $("input[name='pwd']").change(function(){
            if ($(this).val()=='') {
                $("#pwdMsg").html('密码不能空！'); return;
            } else if ($(this).val().length < 6) {
                $("#pwdMsg").html('密码不能少于6位！'); return;
            } else if ($(this).val().length > 20) {
                $("#pwdMsg").html('密码不能多于20位！'); return;
            }
        });
    });
</script>
</body>
</html>