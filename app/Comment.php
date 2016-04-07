<?php

namespace Melbourne;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content',  'post_id'];

    public function event()
    {
        return $this->belongsTo('Melbourne\Event', 'post_id');
    }
}
