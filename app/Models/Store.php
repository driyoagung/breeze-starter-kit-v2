<?php

namespace App\Models;

use App\Enums\StoreStatus;
use App\Observers\StoreObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy(StoreObserver::class)]

class Store extends Model
{

    use HasFactory;
    protected $fillable = [
        "logo",
        "name",
        "status",
        "slug",
        "description",
    ];
    protected function casts(): array
    {
        return [
            'status' => StoreStatus::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'store_id');
    }

}
