<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use Nicolaslopezj\Searchable\SearchableTrait;
use Laravel\Scout\Searchable;
class Product extends Model
{
    use SearchableTrait,Searchable;
    public function categories(){
        return $this->belongsToMany('App\Category');
    }
    public function presentPrice()
    {
        return money_format('$%i', $this->price / 100);
    }
    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'products.name' => 10,
            'products.details' => 5,
            'products.description' => 2,
        ],
    ];
}
