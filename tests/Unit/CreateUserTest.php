<?php

namespace Tests\Unit;

use App\Http\Controllers\User;
use App\Http\Requests\UserRequest;
use App\Traits\FileUpload;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class CreateUserTest extends TestCase
{
    use FileUpload, RefreshDatabase;

    #[Test]
    public function test_create_user_and_profile_successfully(): void
    {
        $request = UserRequest::create('/store', 'POST', [
            'email' => 'test@example.com',
            'password' => 'password123',
            'is_active' => true,
            'firstname' => 'John',
            'lastname' => 'Doe',
            'phone' => '1234567890',
            'avatar' => UploadedFile::fake()->image('avatar.jpg')
        ]);

        $controller = new User();

        $response = $controller->store($request);

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'is_active' => true,
        ]);

        $this->assertDatabaseHas('profiles', [
            'firstname' => 'John',
            'lastname' => 'Doe',
            'phone' => '1234567890',
        ]);

        $response->assertRedirect(route('users.index'));
        $response->assertSessionHas('success', 'User created successfully.');
    }

    #[Test]
    public function test_create_user_and_profile_without_avatar_successfully(): void
    {
        $request = UserRequest::create('/store', 'POST', [
            'email' => 'test@example.com',
            'password' => 'password123',
            'is_active' => true,
            'firstname' => 'John',
            'lastname' => 'Doe',
            'phone' => '1234567890',
            'avatar' => null
        ]);

        $controller = new User();

        $response = $controller->store($request);

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'is_active' => true,
        ]);

        $this->assertDatabaseHas('profiles', [
            'firstname' => 'John',
            'lastname' => 'Doe',
            'phone' => '1234567890',
            'avatar' => null,
        ]);

        $response->assertRedirect(route('users.index'));
        $response->assertSessionHas('success', 'User created successfully.');
    }

    #[Test]
    public function test_create_user_fails_with_invalid_data(): void
    {
        $request = UserRequest::create('/store', 'POST', [
            'email' => 'invalid-email',
            'password' => 'short',
            'is_active' => true,
            'firstname' => '',
            'lastname' => '',
            'phone' => '',
            'avatar' => null
        ]);

        $controller = new User();

        $this->expectException(ValidationException::class);

        $controller->store($request);
    }

    #[Test]
    public function test_create_user_fails_when_avatar_upload_fails(): void
    {
        Storage::shouldReceive('putFileAs')->andReturn(false);

        $request = UserRequest::create('/store', 'POST', [
            'email' => 'test@example.com',
            'password' => 'password123',
            'is_active' => true,
            'firstname' => 'John',
            'lastname' => 'Doe',
            'phone' => '1234567890',
            'avatar' => UploadedFile::fake()->image('avatar.jpg')
        ]);

        $controller = new User();

        $this->expectException(\Exception::class);

        $controller->store($request);
    }
}
