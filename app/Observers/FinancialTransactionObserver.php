<?php

namespace App\Observers;

use App\Models\FinancialTransaction;

class FinancialTransactionObserver
{
    /**
     * Handle the FinancialTransaction "created" event.
     */
    public function created(FinancialTransaction $transaction): void
    {
        $transaction->searchable(); // Index the model in Elasticsearch
    }

    /**
     * Handle the FinancialTransaction "updated" event.
     */
    public function updated(FinancialTransaction $transaction): void
    {
        $transaction->searchable(); // Update the model in Elasticsearch
    }

    /**
     * Handle the FinancialTransaction "deleted" event.
     */
    public function deleted(FinancialTransaction $transaction): void
    {
        $transaction->unsearchable(); // Remove the model from Elasticsearch
    }

    /**
     * Handle the FinancialTransaction "restored" event.
     */
    public function restored(FinancialTransaction $financialTransaction): void
    {
        //
    }

    /**
     * Handle the FinancialTransaction "force deleted" event.
     */
    public function forceDeleted(FinancialTransaction $financialTransaction): void
    {
        //
    }
}
