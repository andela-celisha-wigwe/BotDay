<?php

namespace Bot;

use Maknz\Slack\Client as MaknzClient;
use Elchroy\OSE\Evangelist;

class BotDay {

	protected $client;
	// public $evan;

	const HOOK = 'https://hooks.slack.com/services/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';

	public function __construct()
	{
		// Instantiate without defaults
		$this->client = new MaknzClient(self::HOOK);
		// $this->evan = new Evangelist('andela-celisha-wigwe');

		
	}

	public function send()
	{
		// With an instantiated client
		$this->client->send('Hello world!');
	}

}