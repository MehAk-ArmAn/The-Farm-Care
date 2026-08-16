<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Category extends Model { protected $fillable=['name','slug','description','image','sort_order','is_active','seo_title','seo_description']; protected $casts=['is_active'=>'boolean']; public function products(): HasMany { return $this->hasMany(Product::class)->orderBy('sort_order'); } public function scopeActive($q){return $q->where('is_active',true);} }
