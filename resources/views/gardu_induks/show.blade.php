@extends('gardu_induks.layout')

@section('content')
<div class="container">
    <h2>Detail Gardu Induk</h2>

    <div class="card mb-3">
        <div class="card-header">
            Nama Gardu Induk: {{ $gardu_induk->nama ?? 'N/A' }}
        </div>
    </div>

    <a href="{{ route('gardu_induks.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('gardu_induks.edit', $gardu_induk->id) }}" class="btn btn-warning">Edit</a>

</div>
@endsection
