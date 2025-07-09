@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>{{ $message->subject }}</h5>
                    <a href="{{ route('messages.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <strong>Dari:</strong> {{ $message->sender->name }} ({{ $message->sender->email }})<br>
                        <strong>Tanggal:</strong> {{ $message->created_at->format('d/m/Y H:i:s') }}
                    </div>
                    
                    <hr>
                    
                    <div class="message-body">
                        {!! nl2br(e($message->body)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection