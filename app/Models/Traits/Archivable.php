<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;


trait Archivable
{
    public function initializeArchivable()
    {
        $this->mergeCasts([
            'archived_at' => 'datetime',
        ]);
    }


    public function scopeNotArchive(Builder $query)
    {
        $query->whereNull($this->getTable() . '.archived_at');
    }

    public function scopeArchived(Builder $query)
    {
        $query->whereNotNull($this->getTable() . '.archived_at');
    }
}
