<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLibraryRequest;
use App\Http\Requests\UpdateLibraryRequest;

class LibraryController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function create(Request $request, Library $library)
    {
        $validated = $request->validate([
            'Title' => ['required', 'string', 'between:5,20'],
            'Author' => ['required', 'string', 'between:5,20'],
            'Pages' => ['required', 'integer', 'min:1'],
            'Year' => ['required', 'digits:4', 'integer', 'between:2000,2021'],
        ], [

        ]);
        if ($validated) {
            Library::create([
                'Title' => $request->Title,
                'Author' => $request->Author,
                'Pages' => $request->Pages,
                'Year' => $request->Year,
            ]);
        }
        $libraries = Library::all();
        return view('list', compact('libraries'));
    }

    public function show(Library $library)
    {
        $libraries = Library::all();
        return view('list', compact('libraries'));
    }

    public function edit($id, Request $library)
    {
        $library = Library::findOrFail($id);
        return view('update', compact('library'));
    }

    public function update($id, Request $request, Library $library)
    {
        $validated = $request->validate([
            'Title' => ['required', 'string', 'between:5,20'],
            'Author' => ['required', 'string', 'between:5,20'],
            'Pages' => ['required', 'integer', 'min:1'],
            'Year' => ['required', 'digits:4', 'integer', 'between:2000,2021'],
        ], [

        ]);
        if ($validated) {
            Library::findOrFail($id)->update([
                'Title' => $request->Title,
                'Author' => $request->Author,
                'Pages' => $request->Pages,
                'Year' => $request->Year,
            ]);
        }
        $libraries = Library::all();
        return view('list', compact('libraries'));
    }

    public function destroy($id)
    {
        Library::destroy($id);
        return back();
    }
}
