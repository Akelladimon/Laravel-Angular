<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    const TABLE_NAME = 'companies';

    /**
     * @inheritdoc
     *
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'owner_id',
        'name',
        'city',
        'state',
        'street_address',
        'zip',
        'phone',
        'description',
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
