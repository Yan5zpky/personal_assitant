@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Search</h2><br/>

    <div class="panel panel-primary">
        <div class="panel-heading">Article management</div>
        <div class="panel-body">
            <form method="GET" action="{{ route('articles-lists') }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="titlesearch" class="form-control" placeholder="Enter Title For Search" value="{{ old('titlesearch') }}">
                            <br>
                            <a href="{{ url('articles-lists') }}" class="btn btn-success">重置搜索</a>
                        </div>
                        <div class="form-group">
                            <a href="{{ url('articles/create') }}" class="btn btn-lg btn-primary">新增文章</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <button class="btn btn-success">Search</button>
                        </div>
                    </div>
                </div>
            </form>

            <table class="table table-bordered">
                <thead>
                <th>Id</th>
                <th>Title</th>
                <th>Author</th>
                <th>Creation Date</th>
                <th>Action</th>
                </thead>
                <tbody>
                @if($articles->count())
                    @foreach($articles as $key => $article)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->name }}</td>
                            <td>{{ $article->created_at }}</td>
                            <td>
                                <a href="{{ url('articles/'.$article->id) }}" class="btn btn-success">评论</a>
                                <a href="{{ url('articles/'.$article->id.'/edit') }}" class="btn btn-success">编辑</a>
                                <form action="{{ url('articles/'.$article->id) }}" method="POST" style="display: inline;">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger">删除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">There are no data.</td>
                    </tr>
                @endif
                </tbody>
            </table>
            {{ $articles->links() }}
        </div>
    </div>
</div>
@endsection