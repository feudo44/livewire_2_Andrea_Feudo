<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $body
 * @property string|null $img
 * @property int|null $user_id
 */
class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'img', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}