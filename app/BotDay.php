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
		$settings = [
			// 'username' => 'Cyril',
			// 'channel' => '#accounting',
			'link_names' => true
		];


		// Instantiate without defaults
		$this->client = new MaknzClient(self::HOOK, $settings);
		// $this->evan = new Evangelist('andela-celisha-wigwe');

		
	}

	public function send($message)
	{
		// With an instantiated client
		$this->client->send($message);
	}

}