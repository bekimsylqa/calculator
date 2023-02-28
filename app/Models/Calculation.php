<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    use HasFactory;

    protected $fillable = ['expression', 'result'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function userLatest($userId, $perPage)
    {
        return self::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->simplePaginate($perPage);
    }
}
