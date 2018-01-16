<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Size;
use App\Color;
use App\Variant;

class Product extends Model
{
  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function sizes()
  {
    return $this->belongsToMany(Size::class, 'color_product_size')
            ->withPivot('color_id','stock');
  }

  public function colors()
  {
    return $this->belongsToMany(Color::class, 'color_product_size')
            ->withPivot('size_id','stock');
  }



}
