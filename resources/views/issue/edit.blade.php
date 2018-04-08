@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">编辑事务</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>编辑失败</strong> 输入不符合要求<br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <form action="{{ url('issues/'.$issue->id) }}" method="POST">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <input type="text" name="title" class="form-control" required="required" placeholder="请输入标题" value="{{ $issue->title }}">
                            <br>
                            <textarea name="location" rows="3" class="form-control" required="required" placeholder="请输入地址">{{ $issue->location }}</textarea>
                            <br>
                            <textarea name="host" rows="3" class="form-control" required="required" placeholder="请输入负责人">{{ $issue->host }}</textarea>
                            <br>
                            <input data-provide="datepicker" name="deadline" data-date-format="yyyy-mm-dd" value="{{ $issue->deadline }}">
                            <button class="btn btn-lg btn-info">提交修改</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection