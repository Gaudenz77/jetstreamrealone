@extends('layouts.master')

@section('title', 'jETSTREAM-oNE')

@section('content')
<div class="container">
    <h1>Create a New Gift</h1>
    <form method="POST" action="{{ route('gifts.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="lead" class="form-label">Lead</label>
            <input type="text" class="form-control" id="lead" name="lead" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <input type="text" class="form-control" id="tags" name="tags" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Gift</button>
    </form>
</div>
@endsection