@extends('layouts.master')

@section('title', 'jETSTREAM-oNE')

@section('content')
<div class="container mt-3">
    <!-- Add the toggle switch -->
    <div class="form-check form-switch mb-3">
        <input class="form-check-input" type="checkbox" id="viewToggle">
        <label class="form-check-label" for="viewToggle">Table View</label>
    </div>

    <!-- Filter input fields -->
    {{-- <div class="input-group mb-3">
        <form action="{{ route('gifts.filter') }}" method="POST">
            @csrf
            <input type="text" name="filterWord" placeholder="Filter by Contains Word">
            <input type="text" name="filterTimestamp" placeholder="Filter by Timestamp">
            <input type="text" name="filterTags" placeholder="Filter by Tags">
            <button type="submit">Filter</button>
        </form>
    </div> --}}
    <div class="input-group mb-3 rounded">
        <form action="{{ route('gifts.filter') }}" method="POST" class="input-group">
            @csrf
            <input type="text" name="filterWord" class="form-control rounded ms-0" placeholder="Filter by Contains Word">
            <input type="date" name="filterTimestamp" {{-- id="datepicker" --}} class="form-control rounded mx-2" placeholder="Filter by Timestamp">
            <input type="text" name="filterTags" class="form-control rounded mx-0" placeholder="Filter by Tags">
            <button type="submit" class="btn btn-outline-secondary rounded mx-2 me-0">Filter/Reset</button>
        </form>
    </div>
    
      
      

        
    


    <!-- Create a container for the content -->
    <div id="contentContainer" class="row">
        @foreach($gifts as $gift)
            <div class="col-md-3 mb-4"> <!-- Adjusted to col-md-3 -->
                <div class="card">
                    <div class="card-header" style="height: 17rem; background-image: url('img/spaceone.jpg');  background-size: cover;  background-size: cover;">
                        <h2 class="display-5 text-white"><b>{{ $gift->title }}</b></h2>
                    </div>
                    <div class="card-body">
                        <p class="card-text lead">{{ $gift->lead }}</p>
                        <p class="card-text">{{ $gift->content }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        Tags: {{ $gift->tags }}
                        <form action="{{ route('gifts.destroy', $gift) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm float-end">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Add JavaScript for toggling views -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const viewToggle = document.getElementById('viewToggle');
    const contentContainer = document.getElementById('contentContainer');

    viewToggle.addEventListener('change', function () {
        if (this.checked) {
            // Switched to cards view
            contentContainer.innerHTML = generateCards();
        } else {
            // Switched to table view
            contentContainer.innerHTML = generateTable();
        }
    });

    // Initialize the default view (e.g., cards) and trigger the change event
    contentContainer.innerHTML = generateCards();
    viewToggle.dispatchEvent(new Event('change'));

    // Get references to the label elements
    const viewToggleLabel = document.querySelector('[for="viewToggle"]');
    const tableViewLabel = 'Table View';
    const tileViewLabel = 'Tile View';

    // Add a change event listener to update the label text
    viewToggle.addEventListener('change', function () {
        if (this.checked) {
            // Switched to cards view
            contentContainer.innerHTML = generateCards();
            viewToggleLabel.textContent = tileViewLabel;
        } else {
            // Switched to table view
            contentContainer.innerHTML = generateTable();
            viewToggleLabel.textContent = tableViewLabel;
        }
    });

    function generateCards() {
        let cardsHTML = '';
        @foreach($gifts as $gift)
            cardsHTML += `
                <div class="col-md-3 mb-4"> <!-- Adjusted to col-md-3 -->
                    <div class="card">
                        <div class="card-header" style="height: 17rem; background-image: url('img/spaceone.jpg');  background-size: cover;  background-size: cover;">
                            <h2 class="display-5 text-white"><b>{{ $gift->title }}</b></h2>
                        </div>
                        <div class="card-body">
                        <p class="card-text lead">{{ $gift->lead }}</p>
                        <p class="card-text">{{ $gift->content }}</p>
                        </div>
                        <div class="card-footer text-muted">
                            Tags: {{ $gift->tags }}
                            <form action="{{ route('gifts.destroy', $gift) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm float-end">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            `;
        @endforeach
        return cardsHTML;
    }

    function generateTable() {
    let tableHTML = `
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Lead</th>
                    <th>Content</th>
                    <th>Tags</th>
                    <th>Action</th> <!-- Add the Action column header -->
                </tr>
            </thead>
            <tbody>
    `;
    @foreach($gifts as $gift)
        tableHTML += `
            <tr>
                <td>{{ $gift->title }}</td>
                <td>{{ $gift->lead }}</td>
                <td>{{ $gift->content }}</td>
                <td>{{ $gift->tags }}</td>
                <td>
                    <form action="{{ route('gifts.destroy', $gift) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        `;
    @endforeach
    tableHTML += `
            </tbody>
        </table>
    `;
    return tableHTML;
}



/* FILTER */

</script>
@endsection