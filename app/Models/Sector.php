<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Sector extends Model
{
    use HasSlug;

    protected $fillable = ['name', 'description', 'body', 'position', 'condition', 'image', 'slug'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
    /*
    public function search($filter = null)
    {
        $results = $this->where(function($query) use ($filter){
            if($filter) {
                $query->where('name', 'LIKE', "%{$filter}%");
            }
        })
            ->paginate();
        return $results;
    }
    */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}
