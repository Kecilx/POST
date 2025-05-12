<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'price', 'stock'];

    public $timestamps = true;

    public function transactionDetails()
    {
    return $this->hasMany(TransactionDetail::class);
    }

}
