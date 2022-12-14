<?php

namespace App\Models\Medicine;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory;

    /**
     * Table name in the database.
     *
     * @var string
     */
    protected $table = 'schedules';

    /**
     * Disable created_at, updated_at timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Relationships.
     */
    public function medicine(): BelongsTo
    {
        return $this->belongsTo(Medicine::class, 'medicine_id', 'id');
    }
}
