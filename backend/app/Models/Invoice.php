<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    const TABLE_NAME = 'invoices';

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
        'company_id',
        'employee_id',
        'due_date',
        'submitted_date',
        'description',
        'status',
        'adjustment',
        'product_info',
        'total',
        'note',
        'file_link',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'due_date',
        'submitted_date',
    ];
}
