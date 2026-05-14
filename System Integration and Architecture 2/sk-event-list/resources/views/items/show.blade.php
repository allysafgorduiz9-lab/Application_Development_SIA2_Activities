@extends('layouts.app')

@section('content')
<div class="card">
    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
    <div class="card-content">
        <span class="badge {{ strtolower(str_replace('-', '', $item['category'])) }}">
            {{ $item['category'] }}
        </span>
        <h2>🎯 {{ $item['name'] }}</h2>
        <hr>
        <p><strong>📖 Description:</strong></p>
        <p>{{ $item['description'] }}</p>
        <p><strong>📅 Date:</strong> {{ $item['date'] }}</p>
        <p><strong>📍 Venue:</strong> {{ $item['venue'] }}</p>
        <br>
        <a href="{{ route('items.index') }}" class="btn">← Back to Events</a>
    </div>
</div>
@endsection