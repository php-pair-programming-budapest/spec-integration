<?php

namespace spec\PPP\Phpspec;

use PPP\Phpspec\UserRepositories;
use PhpSpec\ObjectBehavior;
use PPP\Phpspec\UserRepositoryAdapter;
use Prophecy\Argument;

class UserRepositoriesSpec extends ObjectBehavior
{
    function let(UserRepositoryAdapter $adapter)
    {
        $this->beConstructedWith($adapter);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(UserRepositories::class);
    }

    function it_returns_a_list_of_repositories(UserRepositoryAdapter $adapter)
    {
        $repos = ['user/repo', 'user/repo2'];

        $adapter->get('user')->willReturn($repos);

        $this->get('user')->shouldReturn($repos);
    }
}
