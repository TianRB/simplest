<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Config
    protected $table = 'categories';
    protected $fillable = ['display_name', 'description'];
    public static $viewPrefix = 'admin.categories'; // Vistas
    public static $routePrefix = 'categories'; // Rutas

    public $isCatalog = true;
    // public $hasImage = false;
    // public $hasMultipleImages = false;

}
