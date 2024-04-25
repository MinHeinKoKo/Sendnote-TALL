<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['title', 'user_id','body','send_date','is_published', 'recipient'];

    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function publisedNotes(User $user)
    {
        return $this->where('user_id',$user->id)
        ->where('is_published', true)
        ->get();
    }
}
