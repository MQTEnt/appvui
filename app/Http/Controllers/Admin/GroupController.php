<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Group;
use App\Http\Requests\GroupFormRequest;
use App\Tag;
class GroupController extends Controller
{
	public function __construct() {
    	$this->middleware('auth');
    }
    public function index(){
        $groups = Group::select()->paginate(5);
        return view('admin.groups.index', ['groups' => $groups]);
    }
    public function create(){
    	$tags = Tag::all();
        return view('admin.groups.create', ['tags' => $tags]);
    }
    public function store(GroupFormRequest $request){
    	$group = new Group;
    	$group->name = $request->name;
    	$group->fandom = $request->fandom;
    	$group->image = $request->image;
    	$group->icon = $request->icon;
    	$group->description = $request->description;
    	$group->save();
        if(!is_null($request->tags))
        	$group->tags()->attach($request->tags);
        return redirect()->route('group.index')->with(['alert' => 'Create Successfully']);
    }
    public function show($id){
        $group = Group::findOrFail($id);
        $tags = Tag::all();
        return view('admin.groups.show', ['group' => $group, 'tags' => $tags]);
    }
    public function update($id, GroupFormRequest $request){
        $group = Group::findOrFail($id);
        $group->update([
            'name' => $request->name,
            'fandom' => $request->fandom,
            'image' => $request->image,
            'icon' => $request->icon,
            'description' => $request->description
        ]);
        $group->tags()->detach();
        if(!is_null($request->tags))
        	$group->tags()->attach($request->tags);
        return redirect()->route('group.index')->with(['alert' => 'Update Successfully!']);
    }
    public function destroy($id){
        $group = Group::findOrFail($id);
        $group->delete();
        return redirect()->route('group.index')->with(['alert' => 'Delete Successfully!']);
    }
    public function getSearch(Request $request){
        $query = $request->q;
        $groups = Group::where([
            ['name', 'LIKE', '%'.$query.'%']])->paginate(5);
        return view('admin.groups.index', ['groups' => $groups]);
    }
}
