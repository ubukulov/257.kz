<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Country extends Model
{
    use Sluggable;

    protected $table = 'countries';
    protected $imagePath = 'uploads/countries/';
    protected $imagePathThumbs = '/uploads/countries/thumbs/';

    protected $fillable = [
        'title', 'alias', 'active', 'flag', 'short_description', 'full_description', 'keywords'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'alias' => [
                'source' => 'title'
            ]
        ];
    }

    public function flag()
    {
        return asset($this->imagePathThumbs.$this->flag);
    }

    public function url()
    {
        return route('country', ['alias' => $this->alias]);
    }
}
