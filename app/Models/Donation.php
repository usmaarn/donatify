<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'summary', 'description', 'thumbnail', 'target', 'realised', 'completed'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thumbnail(){
        return '/' . str_replace('public', 'storage', $this->thumbnail);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
