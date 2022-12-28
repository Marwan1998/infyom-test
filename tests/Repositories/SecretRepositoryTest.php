<?php namespace Tests\Repositories;

use App\Models\Secret;
use App\Repositories\SecretRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SecretRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SecretRepository
     */
    protected $secretRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->secretRepo = \App::make(SecretRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_secret()
    {
        $secret = Secret::factory()->make()->toArray();

        $createdSecret = $this->secretRepo->create($secret);

        $createdSecret = $createdSecret->toArray();
        $this->assertArrayHasKey('id', $createdSecret);
        $this->assertNotNull($createdSecret['id'], 'Created Secret must have id specified');
        $this->assertNotNull(Secret::find($createdSecret['id']), 'Secret with given id must be in DB');
        $this->assertModelData($secret, $createdSecret);
    }

    /**
     * @test read
     */
    public function test_read_secret()
    {
        $secret = Secret::factory()->create();

        $dbSecret = $this->secretRepo->find($secret->id);

        $dbSecret = $dbSecret->toArray();
        $this->assertModelData($secret->toArray(), $dbSecret);
    }

    /**
     * @test update
     */
    public function test_update_secret()
    {
        $secret = Secret::factory()->create();
        $fakeSecret = Secret::factory()->make()->toArray();

        $updatedSecret = $this->secretRepo->update($fakeSecret, $secret->id);

        $this->assertModelData($fakeSecret, $updatedSecret->toArray());
        $dbSecret = $this->secretRepo->find($secret->id);
        $this->assertModelData($fakeSecret, $dbSecret->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_secret()
    {
        $secret = Secret::factory()->create();

        $resp = $this->secretRepo->delete($secret->id);

        $this->assertTrue($resp);
        $this->assertNull(Secret::find($secret->id), 'Secret should not exist in DB');
    }
}
