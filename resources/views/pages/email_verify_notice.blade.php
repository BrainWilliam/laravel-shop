@extends('layouts.app')

@section('title','提醒')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">提示</div>
    <div class="panel-body text-center">
        <h1>请先验证邮箱</h1>
        <a class="btn btn-primary" href="{{route('email_verified.send')}}">(若没有收到)重新发送邮件</a>
    </div>
</div>
@stop