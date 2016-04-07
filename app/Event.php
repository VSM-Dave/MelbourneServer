<?php 

namespace Melbourne;


use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
	protected $fillable = ['title', 'description', 'status', 'scheduled_for'];

	protected $dates = ['scheduled_for'];

	public function setScheduledForAttribute($value) 
	{
		$this->attributes['scheduled_for'] = $value ?: new DateTime('now');
	}

	public function comments()
    {
        return $this->hasMany('Melbourne\Comment', 'post_id');
    }
	
	
}