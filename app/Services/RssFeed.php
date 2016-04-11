<?php

namespace Melbourne\Services;

use Melbourne\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Suin\RSSWriter\Channel;
use Suin\RSSWriter\Feed;
use Suin\RSSWriter\Item;

class RssFeed
{

  protected $defer = false;
  /**
   * Return the content of the RSS feed
   */
  public function getRSS()
  {
    if (Cache::has('rss-feed')) {
      return Cache::get('rss-feed');
    }

    $rss = $this->buildRssData();
    Cache::add('rss-feed', $rss, 30);

    return $rss;
  }

  /**
   * Return a string with the feed data
   *
   * @return string
   */
  protected function buildRssData()
  {
    $now = Carbon::now();
    $feed = new Feed();
    $channel = new Channel();
    $channel
      ->title(config('melbourne.title'))
      ->description(config('melbourne.description'))
      ->url(url())
      ->language('en')
      ->copyright('Copyright (c) '.config('melbourne.owner'))
      ->lastBuildDate($now->timestamp)
      ->appendTo($feed);

    $events = Event::where('status', '!=', 'Resolved')
      ->orderBy('scheduled_for', 'desc')
      ->take(config('melbourne.rss_size'))
      ->get();
    foreach ($events as $event) {
      $item = new Item();
      $item
        ->title($event->title)
        ->description(
          $event->scheduled_for . " - " .
          $event->status . " - " .
          $event->description
          )
        ->url(url('event/'+$event->id))
        ->pubDate($event->updated_at->timestamp)
        ->guid(url('event/'+$event->id), true)
        ->appendTo($channel);
    }

    $feed = (string)$feed;

    // Replace a couple items to make the feed more compliant
    $feed = str_replace(
      '<rss version="2.0">',
      '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">',
      $feed
    );
    $feed = str_replace(
      '<channel>',
      '<channel>'."\n".'    <atom:link href="'.url('/rss').
      '" rel="self" type="application/rss+xml" />',
      $feed
    );

    return $feed;
  }
}