<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;

class UserRole extends Model
{
    use HasFactory;

    protected $table =  'user_role';


    public function users(): BelongsToMany
    {
        return $this->belongsToMany(UserRole::class);
    }
}
