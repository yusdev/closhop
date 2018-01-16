<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\color;
use App\Variant;

class Size extends Model
{
  protected $table = 'sizes';
  protected $fillable = ['id', 'size'];

  public function products()
  {
      return $this->belongsToMany(Product::class, 'color_product_size')
              ->withPivot('color_id','status');
  }

  public function colors()
  {
      return $this->belongsToMany(Color::class, 'color_product_size')
              ->withPivot('product_id','status');
  }


}
