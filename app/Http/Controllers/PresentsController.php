<?php

namespace App\Http\Controllers;
use App\Models\Partake;
use Illuminate\Http\Request;

class PresentsController extends Controller
{
    public function index()
    {
        // Retrieve all gifts from the database
        $gifts = Partake::all();
    
        // Pass the gifts data to the view for rendering
        return view('testsiteone', ['gifts' => $gifts]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation rules
        $rules = [
            'title' => 'required|string|max:255',
            'lead' => 'required|string|max:255',
            'content' => 'required|string',
            'tags' => 'required|string|max:255',
        ];
    
        // Validate the request data
        $request->validate($rules);
    
        // Create a new Gift model instance and fill it with the validated data
        $gift = new Partake();
        $gift->title = $request->input('title');
        $gift->lead = $request->input('lead');
        $gift->content = $request->input('content');
        $gift->tags = $request->input('tags');
        
        // Associate the gift with the currently logged-in user
        $gift->user_id = auth()->id();
    
        // Save the gift to the database
        $gift->save();
    
        // Redirect to a success page or return a response
        return back()->with('success', 'Gift created successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

/*     public function filter(Request $request)
{
    // Retrieve the filter criteria from the request
    $filterWord = $request->input('filterWord');
    $filterTimestamp = $request->input('filterTimestamp');
    $filterTags = $request->input('filterTags');

    // Query the database to filter gifts
    $query = Partake::query();

    if (!empty($filterWord)) {
        $query->where('title', 'LIKE', '%' . $filterWord . '%');
    }

    if (!empty($filterTimestamp)) {
        $query->where('timestamp_column_name', 'LIKE', '%' . $filterTimestamp . '%');
    }

    if (!empty($filterTags)) {
        $query->where('tags', 'LIKE', '%' . $filterTags . '%');
    }

    // Get the filtered gifts
    $filteredGifts = $query->get();

    // Pass the filtered gifts data to the view for rendering
    return view('testsiteone', ['gifts' => $filteredGifts]);
} */
    public function filter(Request $request)
    {
        // Retrieve the filter values from the form
        $filterWord = $request->input('filterWord');
        $filterTags = $request->input('filterTags');
        $filterTimestamp = $request->input('filterTimestamp');

        // Query the database using Eloquent
        $gifts = Partake::query()
            ->where(function ($query) use ($filterWord) {
                $query->where('title', 'like', '%' . $filterWord . '%')
                    ->orWhere('lead', 'like', '%' . $filterWord . '%')
                    ->orWhere('content', 'like', '%' . $filterWord . '%');
            })
            ->where('tags', 'like', '%' . $filterTags . '%')
            ->when($filterTimestamp, function ($query) use ($filterTimestamp) {
                // Assuming 'created_at' is your timestamp column
                return $query->whereDate('created_at', '=', $filterTimestamp);
            })
            ->get();

        return view('testsiteone', ['gifts' => $gifts]);
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partake $gift)
    {
        // Ensure the user is authorized to delete the gift (you can customize this logic)
        // For example, check if the currently logged-in user is the owner of the gift
        if ($gift->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
    
        // Delete the gift
        $gift->delete();
    
        // Redirect to a success page or return a response
        return back()->with('success', 'Gift deleted successfully');
    }
    
}