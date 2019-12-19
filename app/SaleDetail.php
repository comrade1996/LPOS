<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class SaleDetail extends Model
{
    protected $fillable = ['sale_id', 'product_id', 'quantity', 'price','created_by'];
    protected   $productName;
    protected $table = 'sale_details';
    protected $with=['product'];

    public function Sale()
    {
        return $this->belongsTo(Sales::class);
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function getProducts()
    {
        $products = collect();
    }

    public function getProductName()
    {
        $productName = $this->product()->name;
    }

    protected static function boot()
    {
        parent::boot();
        Category::saving(function ($model) {

                $model->created_by = Auth::user()->name;


        });
    }

}
