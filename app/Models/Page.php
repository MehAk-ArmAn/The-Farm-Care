<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Page extends Model { protected $fillable=['key','title','heading','subheading','content','seo_title','seo_description','is_active']; protected $casts=['content'=>'array','is_active'=>'boolean']; public static function byKey(string $key): ?self { return static::where('key',$key)->first(); } }
