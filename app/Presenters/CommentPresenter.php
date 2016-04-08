<?php

namespace Melbourne\Presenters;

use Lewis\Presenter\AbstractPresenter;

/**
* 
*/
class CommentPresenter extends AbstractPresenter
{

	public function lastUpdated()
	{
		if ($this->updated_at)
		{
			return $this->updated_at->toFormattedDateString();
		}

		return 'No Update';
	}
}