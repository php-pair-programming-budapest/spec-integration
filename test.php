<?php

require __DIR__.'/vendor/autoload.php';

$githubClient = new \Github\Client(new \Http\Adapter\Guzzle6\Client());

$userApi = $githubClient->api('user');

$userRepos = new \PPP\Phpspec\UserRepositories(new \PPP\Phpspec\Adapter\GithubUserRepositoryAdapter($userApi));


print_r($userRepos->get('lencse'));
