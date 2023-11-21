<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PhotoUser extends Model
{
    use HasFactory;
    protected $table = "photo";
    protected $primaryKey = "idimage";
    
    public $timestamps = false;

    public function post(): BelongsTo{
        return $this->belongsTo(Post::class, 'idimage', 'idannonce');
    }

}
