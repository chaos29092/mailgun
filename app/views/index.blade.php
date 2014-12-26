@extends('master')

@section('content')
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
@stop
