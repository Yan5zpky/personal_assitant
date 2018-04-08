@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Search</h2><br/>

    <div class="panel panel-primary">
        <div class="panel-heading">Issue management</div>
        <div class="panel-body">
            <form method="GET" action="{{ route('issues-deadline') }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input data-provide="datepicker" name="date" data-date-format="yyyy-mm-dd" placeholder="choose date">
                            <button class="btn btn-success">Search</button>
                        </div>
                        <div class="form-group">
                            <a href="{{ url('issues/create') }}" class="btn btn-lg btn-primary">新增事务</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">

                        </div>
                    </div>
                </div>
            </form>

            <table class="table table-bordered">
                <thead>
                <th>Title</th>
                <th>Host</th>
                <th>Location</th>
                <th>Deadline</th>
                <th>Action</th>
                </thead>
                <tbody>
                @if($issues->count())
                    @foreach($issues as $key => $issue)
                        <tr>
                            <td>{{ $issue->title }}</td>
                            <td>{{ $issue->host }}</td>
                            <td>{{ $issue->location }}</td>
                            <td>{{ $issue->deadline }}</td>
                            <td>
                                <a href="{{ url('issues/'.$issue->id.'/edit') }}" class="btn btn-success">编辑</a>
                                <form action="{{ url('issues/'.$issue->id) }}" method="POST" style="display: inline;">
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
            {{ $issues->links() }}
        </div>
    </div>
</div>
@endsection