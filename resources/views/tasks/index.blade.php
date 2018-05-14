@extends('layouts.app')

@section('content')

@if(Auth::check())
<?php $user = Auth::user(); ?>
{{ $user->name }}

@if (count($tasks) > 0)
<ul>
    @foreach ($tasks as $task)
    <li>{!! link_to_route('tasks.show', $task->id, ['id'=> $task->id]) !!} : {{ $task->content }} > {{ $task->status }}</li>
    @endforeach
</ul>
@endif

{!! link_to_route('tasks.create', 'タスクを追加') !!}

@else
<div class="center jumbotron">
    <div class="text-center">
        <h1>Welcome taskList</h1>
        {!! link_to_route('signup.get', 'Sign up!', null, ['class' => 'btn btn-lg btn-primary']) !!}
    </div>
</div>
@endif

@endsection