<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdvertiseImage extends Model
{
     protected $table = "advertise_images";
    protected $guarded = ['id'];

    public function advertise(): BelongsTo{
        return $this->belongsTo(related: Advertise::class);
    }
}
