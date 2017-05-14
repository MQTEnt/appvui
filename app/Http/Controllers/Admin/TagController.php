<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Tag;
use App\Http\Requests\TagFormRequest;
class TagController extends Controller
{
	public function __construct() {
    	$this->middleware('auth');
    }
    public function index(){
        $tags = Tag::select()->paginate(5);
        return view('admin.tags.index', ['tags' => $tags]);
    }
    public function create(){
        return view('admin.tags.create');
    }
    public function store(TagFormRequest $request){
        Tag::create([
            'name' => $request->name
        ]);
        return redirect()->route('tag.index')->with(['alert' => 'Create Successfully']);
    }
    public function show($id){
        $tag = Tag::findOrFail($id);
        return view('admin.tags.show', ['tag' => $tag]);
    }
    public function update($id, TagFormRequest $request){
        $tag = Tag::findOrFail($id);
        $tag->update([
            'name' => $request->name
        ]);
        return redirect()->route('tag.index')->with(['alert' => 'Update Successfully!']);
    }
    public function destroy($id){
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect()->route('tag.index')->with(['alert' => 'Delete Successfully!']);
    }
    public function getSearch(Request $request){
        $query = $request->q;
        $tags = Tag::where([
            ['name', 'LIKE', '%'.$query.'%']])->paginate(5);
        return view('admin.tags.index', ['tags' => $tags]);
    }
}
