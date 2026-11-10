<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name', 'gender', 'email', 'number', 'address'])]
class Client extends Model
{
    /** @use HasFactory<\Database\Factories\ClientFactory> */
    use HasFactory;

    // protected $fillable = [
    //     'name',
    //     'gender',
    //     'email',
    //     'phone',
    //     'address',
    // ];

    // protected $guarded = [
    //     'id',
    // ];
}
