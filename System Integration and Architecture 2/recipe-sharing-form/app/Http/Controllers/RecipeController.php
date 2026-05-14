<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 1. IMPORT the Recipe Model here
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function create() {
        return view('recipe_form');
    }

    public function store(Request $request) {
        // 2. Validate and store the data in a variable
        $validatedData = $request->validate([
            'recipe_name'    => 'required|min:5',
            'chef_email'     => 'required|email',
            'prep_time'      => 'required|numeric',
            'origin_country' => 'required',
            'ingredients'    => 'required|min:10',
            'instructions'   => 'required|min:20',
        ]);

        // 3. THIS LINE SAVES THE DATA TO THE DATABASE
        // This is what allows you to see it in the CMD/Tinker later
        Recipe::create($validatedData);

        // 4. Redirect with a success message
        return redirect('/form')->with('success', 'Recipe for "' . $request->recipe_name . '" from ' . $request->origin_country . ' has been saved! 🌿');
    }
}