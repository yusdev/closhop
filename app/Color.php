<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Size;
use App\Variant;

class Color extends Model
{
  protected $fillable = ['id', 'color'];

  public function products()
  {
    return $this->belongsToMany(Product::class, 'color_product_size')
            ->withPivot('size_id','status');
  }

  public function sizes()
  {
    return $this->belongsToMany(Size::class, 'color_product_size')
            ->withPivot('product_id','status');
  }



}
