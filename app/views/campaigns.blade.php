@extends('master')

@section('content')
    <div class="container">
        @if(Session::has('message'))
        <div class="alert alert-success" id="alertmessage">
            <p class="text-center">{{Session::get('message')}}</p>
        </div>
        @endif

        {{ Form::open(array('action' => 'ApiController@campaigns','role' => 'form', 'class' => 'form-inline')) }}
        <h4>营销任务查询</h4>
        <div class="form-group">
            {{ Form::label('skip','起始行') }}
            {{ Form::text('skip',0,array('class' => 'form-control','required')) }}
        </div>
        <button type="submit" class="btn btn-default">查询</button>
        {{ Form::close() }}

        {{ Form::open(array('action' => 'ApiController@campaignCreat','role' => 'form', 'class' => 'form-inline')) }}
        <h4>新建一个营销任务</h4>
        <div class="form-group">
            {{ Form::label('name','活动名称：') }}
            {{ Form::text('name',null,array('class' => 'form-control','required')) }}
        </div>
        <div class="form-group">
            {{ Form::label('id','活动id：') }}
            {{ Form::text('id',null,array('class' => 'form-control','required')) }}
        </div>
        <button type="submit" class="btn btn-default">新建</button>
        {{ Form::close() }}
    </div>

@stop
