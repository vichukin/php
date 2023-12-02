<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Topic extends Model
{
    use HasFactory;
    protected $fillable=["Title"];
    protected $primaryKey = "Id";
    public function blocks():HasMany
    {
        return $this->hasMany(Block::class);
    }
}
