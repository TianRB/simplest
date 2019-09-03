<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Config
    protected $table = 'categories';
    protected $fillable = ['name', 'description'];
    
    public static $config = [
        'viewPrefix' =>  'admin.categories',
        'routePrefix' =>  'categories',
        'hasSlug' =>  true, // Create slug from name?
          'slugColumn' => 'slug',
        'hasImage' => false,
          'imageColumn' => '',
          'imageDirectory' => 'img/',
        'hasMultipleImages' => 'img/',
          'multipleImagesDirectory' => 'img/'
    ];

    public static $storeRules = [
        // 'name' => 'unique:Category|required|max:255',
        'name' => 'required|max:255',
        'description' => 'max:800'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
