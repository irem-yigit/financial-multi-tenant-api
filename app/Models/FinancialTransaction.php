<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialTransaction extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title',
        'amount',
        'transaction_date',
        'description',
    ];

    // indexing for elasticsearch scout driver
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'amount' => $this->amount,
            'transaction_date' => $this->transaction_date,
        ];
    }
}
