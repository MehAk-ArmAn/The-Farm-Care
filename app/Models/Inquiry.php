<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Inquiry extends Model { protected $fillable=['type','name','email','phone','company','country','product_id','variant','subject','quantity','message','status','admin_notes']; public function product(): BelongsTo{return $this->belongsTo(Product::class);} }
