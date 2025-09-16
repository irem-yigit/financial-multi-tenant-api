<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class FinancialTransaction extends Model
{
    use Searchable;

    protected $fillable = [
        'description',
        'amount',
        'transaction_date',
    ];
}
