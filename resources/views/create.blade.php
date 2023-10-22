@extends('layouts.master')

@section('title', 'jETSTREAM-oNE')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 p-4 bg-success">
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
        <div class="col-6 p-4 bg-success">
            <h1>Orders</h1>

            <table class="table table-striped table-dark table-responsive">
                <thead>
                  <tr>
                    <th>Header 10</th>
                    <th>Header 20</th>
                    <th>Header 30</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Data 1-1</td>
                    <td>Data 1-2</td>
                    <td>Data 1-3</td>
                  </tr>
                  <tr>
                    <td>Data 2-1</td>
                    <td>Data 2-2</td>
                    <td>Data 2-3</td>
                  </tr>
                  <tr>
                    <td>Data 3-1</td>
                    <td>Data 3-2</td>
                    <td>Data 3-3</td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
    
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tagsInput = document.getElementById('tags');

        tagsInput.addEventListener('keydown', function (event) {
            if (event.key === ' ' && this.value !== '' && this.value.slice(-1) !== '#') {
                this.value += ' #';
                event.preventDefault(); // Prevent the spacebar from adding an actual space
            }
        });

        tagsInput.addEventListener('input', function () {
            const inputValue = this.value.trim(); // Remove leading/trailing spaces
            const tagsArray = inputValue.split(/\s+/); // Split by spaces
            const formattedTags = tagsArray.map(tag => {
                if (tag && !tag.startsWith('#')) {
                    return `#${tag}`;
                }
                return tag;
            }).join(' '); // Add '#' to each word if not already present and join with spaces

            // Set the formatted tags back to the input field
            this.value = formattedTags;
        });
    });
</script>

@endsection