<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Repositories\Messages\EloquentMessageRepository;

class MessageRepositoryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetMessagesForUser(){
        $messageRepository = new EloquentMessageRepository;
        $user=factory(\App\Models\User::class)->create();

        Auth::login($user);

        factory(\App\Models\Message::class)->times(20)->create(['sender'=>$user->id]);
        factory(\App\Models\Message::class)->times(20)->create(['receiver'=>$user->id]);

        $response = $messageRepository->getMessagesForUser();

        $this->assertInstanceOf('App\Models\Message', $response->messages);

    }

    public function testExample()
    {
        $this->assertTrue(true);
    }
}
