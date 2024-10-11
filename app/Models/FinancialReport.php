<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialReport extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'total_revenue',  // Thêm dòng này
        'total_expenses',
        'profit_before_tax',
        'tax_amount',
        'profit_after_tax',
        'month',
        'year'
    ];
}
