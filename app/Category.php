<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Config
    protected $table = 'categories';
    protected $fillable = ['display_name', 'description'];
    
    public static $config = [
        'viewPrefix' =>  'admin.categories',
        'routePrefix' =>  'categories',
        'isCatalog' =>  true, // Create name ffrom display_name
        'hasImage' => false,
          'imageColumn' => '',
          'imageDirectory' => 'img/',
        'hasMultipleImages' => 'img/',
          'multipleImagesDirectory' => 'img/'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
