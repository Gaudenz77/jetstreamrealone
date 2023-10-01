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