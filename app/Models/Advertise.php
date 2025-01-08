<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Advertise extends Model
{
    public function user() : BelongsTo {
        return $this->belongsTo(related: User::class);
    }

    public function category() : BelongsTo {
        return $this->belongsTo(related: Category::class);
    }

}
