<?php

namespace Tests;

// use Tests\TestCase;
use PHPUnit\Framework\TestCase;
use App\Services\UserServiceDefault;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

class UserServiceDefaultTest extends BaseTestCase
{

    protected $baseUrl = 'http://127.0.0.1:8000/'; //  URL 

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require '/var/www/blog/bootstrap/app.php';
        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
        return $app;
    }

    public function testShowUsersWithNoUsers()
    {
        $userService = new UserServiceDefault();
        $users = collect([]);
        $expectedResult = '<p>No users</p>';
        $this->assertEquals($expectedResult, $userService->ShowUsers($users));
    }

    public function testShowUsersWithUsers()
    {
        // Arrange
        $userService = new UserServiceDefault();
        $users = collect([
            (object)[
                'id' => 1,
                'name' => 'John Doe',
                'photo' => 'john.jpg',
                'UsersPosts' => collect(['post1', 'post2']),
                'subscribers' => collect(['1', '2', '3']),
                'subscriptions' => collect(['4', '5', '6'])
            ],
            (object)[
                'id' => 2,
                'name' => 'Jane Smith',
                'photo' => 'jane.jpg',
                'UsersPosts' => collect(['post3']),
                'subscribers' => collect([]),
                'subscriptions' => collect([])
            ]
        ]);

        // Act
        $result = $userService->ShowUsers($users);

        // Assert
        $this->assertStringContainsString('John Doe', $result);
        $this->assertStringContainsString('Jane Smith', $result);
        $this->assertStringContainsString('<h6>2</h6>', $result);
        $this->assertStringContainsString('<h6>1</h6>', $result);
        $this->assertStringContainsString('/profile/1', $result);
        $this->assertStringContainsString('/profile/2', $result);
    }
}
