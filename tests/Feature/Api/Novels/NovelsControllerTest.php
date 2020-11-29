<?php

namespace Tests\Feature\Api\Novels;

use App\Models\Novel;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NovelsControllerTest extends TestCase
{
    use WithoutMiddleware;

    public function testNovelsIndex()
    {
        $user = User::factory()->create();

        $response = $this->json('GET', route('novels.index'), [], [], [], [
            "HTTP_Authorization" => "Basic {base64_encode({$user->username} ':password')}",
            "PHP_AUTH_USER" => $user->username,
            "PHP_AUTH_PW" => "password"
        ])->assertStatus(200);
    }

    public function testNovelShow()
    {
        $user = User::factory()->create();
        $novel = User::factory()->create();

        $this->json('GET', route('novels.show', $novel->id), [], [], [], [
            "HTTP_Authorization" => "Basic {base64_encode({$user->username} ':password')}",
            "PHP_AUTH_USER" => "$user->username",
            "PHP_AUTH_PW" => "password"
        ])->assertStatus(200);
    }

    public function testNovelStore()
    {
        $user = User::factory()->create();

        $data = [
            'title' => "title #2",
            'price' => "price #2",
            'author' => "author #2",
            'editor'=> "editor #2",
        ];

        $response = $this->json('POST', route('novels.store'), $data, [], [], [
            "HTTP_Authorization" => "Basic {base64_encode({$user->username} ':password')}",
            "PHP_AUTH_USER" => $user->username,
            "PHP_AUTH_PW" => "password"
        ])->assertStatus(201);
	}

    public function testNovelUpdate()
    {
        $user = User::factory()->create();

        $data = [
            'id' => 1,
            'title' => "title #1 update",
            'price' => "price #1 update",
            'author' => "author #1 update",
            'editor'=> "editor #1 update",
        ];
        
        $this->json('PUT', route('novels.update', 1), $data, [], [], [
            "HTTP_Authorization" => "Basic {base64_encode({$user->username} ':password')}",
            "PHP_AUTH_USER" => $user->username,
            "PHP_AUTH_PW" => "password"
        ])->assertStatus(200);
    }

    public function testNovelDelete()
    {
        $novel = Novel::factory()->create();
        $user = User::factory()->create();

        $this->json('DELETE', route('novels.destroy', $novel->id), [], [], [], [
            "HTTP_Authorization" => "Basic {base64_encode({$user->username} ':password')}",
            "PHP_AUTH_USER" => "$user->username",
            "PHP_AUTH_PW" => "password"
        ])->assertStatus(204);
    }
}