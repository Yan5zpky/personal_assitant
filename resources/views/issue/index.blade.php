@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">事务管理</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <a href="{{ url('issues/create') }}" class="btn btn-lg btn-primary">新增</a>

                        @foreach ($issues as $issue)
                            <hr>
                            <div class="article">
                                <h4>{{ $issue->title }}</h4>
                                <div class="content">
                                    <p>
                                        {{ $issue->location }}
                                        {{ $issue->host }}
                                        {{ $issue->deadline }}
                                    </p>
                                </div>
                            </div>
                            <a href="{{ url('issues/'.$issue->id.'/edit') }}" class="btn btn-success">编辑</a>
                            <form action="{{ url('issues/'.$issue->id) }}" method="POST" style="display: inline;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger">删除</button>
                            </form>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection