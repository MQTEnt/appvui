<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
	protected $table = 'groups';
	protected $fillable = ['name', 'fandom', 'image', 'icon', 'description'];
	public function tags()
    {
        return $this->belongsToMany('App\Tag', 'tag_group', 'group_id', 'tag_id');
    }
}
