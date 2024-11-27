# index.php
<?php declare(strict_types=1);

use wnd\myTaskName\application\core\Runner;
use wnd\myTaskName\provider\ServiceLoader;

require __DIR__ . '/vendor/autoload.php';

return function ($event) {
     /*
     * runner:
     * -> creates DI container using ServiceLoader
     * -> instantiates task using DI
     * -> converts mixed event to DTO: EventPayload 
     * -> executes task
     */ 
	(new Runner(
		new ServiceLoader(),
		getenv('APP_NAME')
	))->run($event);
    return "done";
};