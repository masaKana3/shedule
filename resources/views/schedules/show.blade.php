@extends('layouts.app')

@section('content')
    <h1>{{ $schedule->title }}</h1>
    <p>{{ $schedule->description }}</p>
    <p>開始時間: {{ $schedule->start_time }}</p>
    <p>終了時間: {{ $schedule->end_time }}</p>
@endsection
