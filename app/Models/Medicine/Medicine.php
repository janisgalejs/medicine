<?php

namespace App\Models\Medicine;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medicine extends Model
{
    use HasFactory;

    /**
     * Table name in the database.
     *
     * @var string
     */
    protected $table = 'medicine';

    /**
     * Medicine statuses.
     */
    public const STATUSES = [
        'inactive' => 0,
        'active' => 1
    ];


    /**
     * Relationships.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'medicine_id', 'id');
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class, 'medicine_id', 'id');
    }
}
