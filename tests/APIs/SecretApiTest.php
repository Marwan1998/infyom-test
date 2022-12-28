<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Secret;

class SecretApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_secret()
    {
        $secret = Secret::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/secrets', $secret
        );

        $this->assertApiResponse($secret);
    }

    /**
     * @test
     */
    public function test_read_secret()
    {
        $secret = Secret::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/secrets/'.$secret->id
        );

        $this->assertApiResponse($secret->toArray());
    }

    /**
     * @test
     */
    public function test_update_secret()
    {
        $secret = Secret::factory()->create();
        $editedSecret = Secret::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/secrets/'.$secret->id,
            $editedSecret
        );

        $this->assertApiResponse($editedSecret);
    }

    /**
     * @test
     */
    public function test_delete_secret()
    {
        $secret = Secret::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/secrets/'.$secret->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/secrets/'.$secret->id
        );

        $this->response->assertStatus(404);
    }
}
