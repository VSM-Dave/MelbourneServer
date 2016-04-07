<?php

namespace Melbourne\Presenters;

use Lewis\Presenter\AbstractPresenter;

/**
* 
*/
class EventPresenter extends AbstractPresenter
{
	
	public function scheduledDate()
	{
		if ($this->scheduled_at)
		{
			return $this->scheduled_at->toFormattedDateString();
		}

		return 'Not Scheduled';
	}

	public function lastUpdated()
	{
		if ($this->updated_at)
		{
			return $this->updated_at->toFormattedDateString();
		}

		return 'No Update';
	}
}