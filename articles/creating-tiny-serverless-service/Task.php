# src/application/Task.php
<?php
declare(strict_types=1);

namespace wnd\myTaskName\application;

use Psr\Log\LogLevel;
use wnd\log\Logger;
use wnd\myTaskName\domain\event\EventPayload;
use wnd\myTaskName\domain\NotificationInterface;

public function __construct(
		private Logger $logger,
		private NotificationInterface $notificationRespository,
	) {
	}

	public function run(EventPayload $payload): void
	{
		$this->logger->log(
            'LAMBDA: myTaskName: ' . $payload->identifier,
            LogLevel::DEBUG
		);
		$this->notificationRespository->notify($payload->identifier, $payload->offset);
	}
