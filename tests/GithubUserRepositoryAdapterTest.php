<?php

namespace Tests\PPP\Phpspec;

use Http\Client\HttpClient;
use Http\Mock\Client;
use PPP\Phpspec\Adapter\GithubUserRepositoryAdapter;
use Zend\Diactoros\Response\JsonResponse;

final class GithubUserRepositoryAdapterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var HttpClient|Client
     */
    private $httpClient;
    private $githubClient;

    public function setUp()
    {
        $this->httpClient = new Client();
        $this->githubClient = new \Github\Client($this->httpClient);
    }

    /**
     * @test
     */
    public function it_returns_a_list_of_repositories()
    {
        $body = [
            [
                'full_name' => 'user/repo',
                'stargazers_count' => 123,
            ],
            [
                'full_name' => 'user/repo2',
                'stargazers_count' => 123,
            ],
        ];

        $response = new JsonResponse($body);
        $this->httpClient->addResponse($response);

        $userApi = $this->githubClient->api('user');

        $repositoryAdapter = new GithubUserRepositoryAdapter($userApi);

        $repositories = $repositoryAdapter->get('user');

        $this->assertEquals(['user/repo', 'user/repo2'], $repositories);
    }
}

