<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PhotoPost extends Model
{
    use HasFactory;
    protected $table = "photo";
    protected $primaryKey = "idimage";
    
    public $timestamps = false;

    public function post(): BelongsTo{
        return $this->belongsTo(Post::class, 'idannonce', 'idannonce');
    }

}
