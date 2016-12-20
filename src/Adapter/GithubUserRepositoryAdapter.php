<?php

namespace PPP\Phpspec\Adapter;

use Github\Api\User;
use PPP\Phpspec\UserRepositoryAdapter;

final class GithubUserRepositoryAdapter implements UserRepositoryAdapter
{
    /**
     * @var User
     */
    private $userApi;

    public function __construct(User $userApi)
    {
        $this->userApi = $userApi;
    }

    public function get($user)
    {
        $repositories = $this->userApi->repositories($user);

        return array_column($repositories, 'full_name');
    }
}
