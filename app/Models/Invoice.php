<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Invoice extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected  $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'client_name',
        'client_document',
        'subtotal',
        'tax_total',
        'total',
        'user_id',
        'store_Name'
    ];

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function item(){

        return $this->hasMany(Item::class);
    }

}
