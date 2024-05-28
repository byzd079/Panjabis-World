<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchaseDate', 'purchaseQuantity',  'Item_itemID', 'Users_userID', 'payAmount'
    ];

    protected $dates = ['purchaseDate'];

    public function item()
    {
        return $this->belongsTo(Item::class, 'Item_itemID', 'itemID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'Users_userID', 'id');
    }
}
