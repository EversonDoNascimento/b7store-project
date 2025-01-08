<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class State extends Model
{
    protected $table = 'states';
    protected $fillable = [
        'name'
        ];
    use HasFactory;

    public function user(): BelongsTo {
        return $this->belongsTo(related: User::class);
    }
}
