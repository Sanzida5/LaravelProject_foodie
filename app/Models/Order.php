<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    public function orderItem(): HasMany
    {
        return $this->hasMany(OrderItem::class, "order_id", "id");
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, "address_id", "id");
    }
}