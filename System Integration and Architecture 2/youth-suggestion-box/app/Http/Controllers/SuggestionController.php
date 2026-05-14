<?php
namespace App\Http\Controllers;
use App\Models\Suggestion;
use Illuminate\Http\Request;

class SuggestionController extends Controller {
    public function index() {
        $items = Suggestion::latest()->get();
        return view('suggestions.index', compact('items'));
    }
    public function create() { return view('suggestions.create'); }
    public function store(Request $request) {
        Suggestion::create($request->validate([
            'title'=>'required|max:255', 'author'=>'required', 'category'=>'required', 'content'=>'required'
        ]));
        return redirect()->route('suggestions.index')->with('status', 'Suggestion submitted successfully!');
    }
    public function show($id) {
        $item = Suggestion::findOrFail($id);
        return view('suggestions.show', compact('item'));
    }
    public function edit($id) {
        $item = Suggestion::findOrFail($id);
        return view('suggestions.edit', compact('item'));
    }
    public function update(Request $request, $id) {
        Suggestion::findOrFail($id)->update($request->all());
        return redirect()->route('suggestions.index')->with('status', 'Updated successfully.');
    }
    public function destroy($id) {
        Suggestion::findOrFail($id)->delete();
        return redirect()->route('suggestions.index')->with('status', 'Deleted successfully.');
    }
}