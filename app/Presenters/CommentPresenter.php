<?php

namespace Melbourne\Presenters;

use Lewis\Presenter\AbstractPresenter;

/**
* 
*/
class CommentPresenter extends AbstractPresenter
{

	public function commentUpdated()
	{
		if ($this->updated_at)
		{
			return $this->updated_at->toDayDateTimeString();
		}

		return 'No Update';
	}
}