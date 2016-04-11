<?php

namespace Melbourne\Presenters;

use Lewis\Presenter\AbstractPresenter;
use Carbon\Carbon;

/**
* 
*/
class EventPresenter extends AbstractPresenter
{
	public function dateCreated()
	{
		if ($this->scheduled_for)
		{
			return $this->scheduled_for->toDayDateTimeString();
		}
		return 'No Date Entered';
	}
	
	public function scheduledDate()
	{
		if ($this->scheduled_for)
		{
			return $this->scheduled_for->toDayDateTimeString();
		}

		return 'Not Scheduled';
	}

	public function lastUpdated()
	{
		if ($this->updated_at)
		{
			return $this->updated_at->toDayDateTimeString();
		}

		return 'No Update';
	}

	public function isScheduled()
	{
		if ($this->scheduled_for)
		{
			if ($this->scheduled_for > Carbon::now())
			{
				return true;
			}
		}
		return false;
	}

	public function isActive() 
	{
		
		if ($this->scheduled_for < Carbon::now() && $this->status != 'Resolved')
			{
				return true;
			}
		
		return false;

	}

	public function isResolved()
	{
		if ($this->status == 'Resolved')
		{
			return true;
		}
		return false;
	}

	public function hasComments() 
	{
		if ($this->comments->count() > 0)
		{
			return true;
		}
		return false;
	}

}