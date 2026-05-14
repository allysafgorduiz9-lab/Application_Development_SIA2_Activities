@extends('layouts.app')

@section('content')
<h2>📅 SK Events Schedule</h2>

<div class="grid">
@foreach ($items as $item)
    <div class="card">
        <a href="{{ route('items.show', $item['id']) }}">
            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
            <div class="card-content">
                <span class="badge {{ strtolower(str_replace('-', '', $item['category'])) }}">
                    {{ $item['category'] }}
                </span>
                <h3>🎯 {{ $item['name'] }}</h3>
                <p class="date">📅 {{ $item['date'] }}</p>
                <p class="venue">📍 {{ $item['venue'] }}</p>
            </div>
        </a>
    </div>
@endforeach
</div>
@endsection