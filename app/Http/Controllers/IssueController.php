<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Issue;

class IssueController extends Controller
{

    public function index()
    {
        return view('issue/index')->withIssues(Issue::where('user_id', Auth::user()->id)->get());
    }

    public function show($id)
    {
        return view('issue/show')->withIssue(Issue::find($id));
    }

    public function create()
    {
        return view('issue/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, []);

        $issue = new Issue;
        $issue->title = $request->get('title');
        $issue->location = $request->get('location');
        $issue->host = $request->get('host');
        $issue->deadline = $request->get('deadline');
        $issue->user_id = $request->user()->id;

        if ($issue->save()) {
            return redirect('issues-deadline');
        } else {
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }

    }

    public function update(Request $request)
    {
        $this->validate($request, []);

        $issue = new Issue;
        $issue->title = $request->get('title');
        $issue->location = $request->get('location');
        $issue->host = $request->get('host');
        $issue->deadline = $request->get('deadline');
        $issue->user_id = $request->user()->id;

        if ($issue->save()) {
            return redirect('issues');
        } else {
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }

    }

    public function edit($id)
    {
        return view('issue/edit')->withIssue(Issue::find($id));
    }

    public function month(Request $request)
    {
        $builder = Issue::query();
        if($request->has('date')){
            $builder->where('deadline', '<=', "$request->date");
            $builder->where('user_id', '=', $request->user()->id);
            $issues = $builder->paginate(6);
            $issues->appends(['month' => $request->month]); // add params to paginate links
        } else {
            $issues = Issue::where('user_id', '=', $request->user()->id)->paginate(6);
        }
        return view('issue/search',compact('issues'));
    }
}
