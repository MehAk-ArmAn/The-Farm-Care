<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class SiteSetting extends Model { protected $fillable=['group','key','value','type']; public static function getValue(string $key,$default=null){return static::where('key',$key)->value('value') ?? $default;} public static function allAsArray(): array { return static::pluck('value','key')->all(); } }
