<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Post extends Model
{
    //
    protected $fillable = [
        'title', 
        'slug', 
        'content', 
        'online',
        'category_id',
        'tags_id'
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'published_at'
    ];
    public static $rules = [
        'title' => 'required|min:5',
        'content' => 'required|min:10',
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    public function scopePublished($query) {
        // return $query->where('online', true);
        return $query->where('online', true)->whereRaw('created_at < NOW()');
    }

    public function scopeSearchByTitle($query, $search) {
        // return $query->where('online', true);
        return $query->where('title', 'LIKE', '%' . $search . '%');
    }

    public function getTitleAttribute($value) {
        return $value . ' - isTKT';
    }
    public function setTitleAttribute($value) {
        $this->attributes['title'] = strtoupper($value);
    }

    public function setSlugAttribute($value) {
        if(empty($value)){
            $this->attributes['slug'] = Str::slug($this->title);
        }
    }

    public function getTagsIdAttribute() {
        if(isset($this->attributes['id'])) {
            return $this->tags->pluck('id');
        }
    }
    public function setTagsIdAttribute($value) {
        if(isset($this->attributes['id'])) {
            $this->tags()->sync($value);
        }
    }

}
