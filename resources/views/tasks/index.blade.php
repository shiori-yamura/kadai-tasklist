@extends('layouts.app')

@section('content')

@if(Auth::check())
<div class="row">
    <aside class="col-xs-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>{{ $user->name }}</h1>
            </div>
            <div class="panel-body">
                <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email,500) }}" alt="">
            </div>
        </div>
    </aside>
    
    <div class="col-xs-8">
        @if (count($tasks) > 0)
        <h2>タスクの一覧</h2>
        <ul>
            @foreach ($tasks as $task)
            <li>{!! link_to_route('tasks.show', $task->id, ['id'=> $task->id]) !!} : {{ $task->content }} > {{ $task->status }}</li>
            @endforeach
        </ul>
        @endif
        
        {!! link_to_route('tasks.create', 'タスクを追加', null, ['class' => 'btn btn-primary']) !!}
    </div>
</div>

@else
<div class="center jumbotron">
    <div class="text-center">
        <h1>Welcome taskList</h1>
        {!! link_to_route('signup.get', 'Sign up!', null, ['class' => 'btn btn-lg btn-primary']) !!}
    </div>
</div>
@endif

@endsection