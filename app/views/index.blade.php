<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="{{asset('assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <script src="{{asset('assets/js/vendor/modernizr-2.6.2.min.js')}}"></script>
</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Add your site or application content here -->
<div class="container">
    <h3>发送测试(据说一次最大1000封，待测试)</h3>
    {{ Form::open(array('action' => 'SendmailController@sendMany','role' => 'form')) }}
    <div class="form-group">
        {{ Form::label('email','输入要发送的email地址（如带名字，每行以 example example@qq.com 格式输入）（*）') }}
        {{ Form::textarea('manyemail',null,array('class' => 'form-control','required')) }}
    </div>
    <div class="form-group">
        {{ Form::label('subject','邮件标题（*）') }}
        {{ Form::text('subject',null,array('class' => 'form-control','required')) }}
    </div>
    <div class="form-group">
        {{ Form::label('campaign','营销活动代码（*）（最多3个，以逗号分隔，且必须已经被创建）') }}
        {{ Form::text('campaign',null,array('class' => 'form-control','required')) }}
    </div>
    <div class="form-group">
        {{ Form::label('tag','标签（最多3个，以逗号分隔）') }}
        {{ Form::text('tag',null,array('class' => 'form-control')) }}
    </div>

    <button type="submit" class="btn btn-default">确认发送</button>
    {{ Form::close() }}
</div>


<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.js"></script>
<script>window.jQuery || document.write('<script src="{{asset('assets/js/vendor/jquery.min.js')}}"><\/script>')</script>
<script src="{{asset('assets/js/plugins.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>

</body>
</html>
