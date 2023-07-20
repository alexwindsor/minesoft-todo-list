<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TodoList extends Model
{
    use HasFactory;



    // relationships
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function todos() {
        return $this->hasMany(Todo::class);
    }

    
}
