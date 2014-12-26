@extends('master')

@section('content')
    <div class="container">
        {{ Form::open(array('action' => 'ApiController@campaigns','role' => 'form', 'class' => 'form-inline')) }}
        <h4>营销任务查询</h4>
        <div class="form-group">
            {{ Form::label('skip','起始行') }}
            {{ Form::text('skip',0,array('class' => 'form-control','required')) }}
        </div>
        <button type="submit" class="btn btn-default">查询</button>
        <span>当前位置：{{$skip}} - {{$skip+100 }}， 共{{$total}}个营销任务</span>
        {{ Form::close() }}

        <h4>新建或修改一个营销任务</h4>
        {{ Form::open(array('action' => 'ApiController@campaignCreat','role' => 'form', 'class' => 'form-inline')) }}
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

        {{ Form::open(array('action' => 'ApiController@campaignUpdate','role' => 'form', 'class' => 'form-inline')) }}
        <div class="form-group">
            {{ Form::label('name','活动名称：') }}
            {{ Form::text('name',null,array('class' => 'form-control','required')) }}
        </div>
        <div class="form-group">
            {{ Form::label('id','活动id：') }}
            {{ Form::text('id',null,array('class' => 'form-control','required')) }}
        </div>
        <button type="submit" class="btn btn-default">修改</button>
        {{ Form::close() }}


        <h4>查询结果</h4>
        <table class="table table-condensed table-hover text-center">
            <tr class="success">
                <td>name</td>
                <td>id</td>
                <td>submitted</td>
                <td>delivered</td>
                <td>opened</td>
                <td>clicked</td>
                <td>bounced</td>
                <td>unsubscribed</td>
                <td>complained</td>
                <td>dropped</td>
                <td>created_at</td>
                <td>edit</td>
            </tr>
            @foreach($campaigns as $campaign)
            <tr>
                <td>{{$campaign->name}}</td>
                <td>{{$campaign->id}}</td>
                <td>{{$campaign->submitted_count}}</td>
                <td>{{$campaign->delivered_count}}</td>
                <td>{{$campaign->opened_count}}</td>
                <td>{{$campaign->clicked_count}}</td>
                <td>{{$campaign->bounced_count}}</td>
                <td>{{$campaign->unsubscribed_count}}</td>
                <td>{{$campaign->complained_count}}</td>
                <td>{{$campaign->dropped_count}}</td>
                <td>{{$campaign->created_at}}</td>
                <td><a href="javascript:if(confirm('确实要删除该内容吗?'))location='{{url('campaignDelete/'.$campaign->id)}}'"><button type="button" class="btn btn-danger btn-xs">delete</button></a></td>
            </tr>
            @endforeach
        </table>
    </div>
@stop





