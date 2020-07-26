<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = [
        'type',
        'mime',
        'path',
        'product_id'
    ];

    public function products() {
        return $this->belongsTo('App\Product', 'product_id' , 'id');
    }
}
