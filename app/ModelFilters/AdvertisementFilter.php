<?php 

namespace App\ModelFilters;

use App\Models\Advertisement;
use EloquentFilter\ModelFilter;

class AdvertisementFilter extends ModelFilter
{
    //search request key category
    public function category($category)
    {
        return $this->where('category_id', $category);
    }

    //search request key tag 
    public function tag($tag)
    {
        return $this->whereHas('tags', function ($q) use ($tag)
        {
            return $q->where(function ($q) use ($tag)
            {
                return $q->where('tag_id', $tag)
                    ->where('taggable_type', Advertisement::class);
            });
        });
    }
    
}
