<?php namespace Tests\Repositories;

use App\Models\Hospital;
use App\Repositories\HospitalRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class HospitalRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var HospitalRepository
     */
    protected $hospitalRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->hospitalRepo = \App::make(HospitalRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_hospital()
    {
        $hospital = factory(Hospital::class)->make()->toArray();

        $createdHospital = $this->hospitalRepo->create($hospital);

        $createdHospital = $createdHospital->toArray();
        $this->assertArrayHasKey('id', $createdHospital);
        $this->assertNotNull($createdHospital['id'], 'Created Hospital must have id specified');
        $this->assertNotNull(Hospital::find($createdHospital['id']), 'Hospital with given id must be in DB');
        $this->assertModelData($hospital, $createdHospital);
    }

    /**
     * @test read
     */
    public function test_read_hospital()
    {
        $hospital = factory(Hospital::class)->create();

        $dbHospital = $this->hospitalRepo->find($hospital->id);

        $dbHospital = $dbHospital->toArray();
        $this->assertModelData($hospital->toArray(), $dbHospital);
    }

    /**
     * @test update
     */
    public function test_update_hospital()
    {
        $hospital = factory(Hospital::class)->create();
        $fakeHospital = factory(Hospital::class)->make()->toArray();

        $updatedHospital = $this->hospitalRepo->update($fakeHospital, $hospital->id);

        $this->assertModelData($fakeHospital, $updatedHospital->toArray());
        $dbHospital = $this->hospitalRepo->find($hospital->id);
        $this->assertModelData($fakeHospital, $dbHospital->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_hospital()
    {
        $hospital = factory(Hospital::class)->create();

        $resp = $this->hospitalRepo->delete($hospital->id);

        $this->assertTrue($resp);
        $this->assertNull(Hospital::find($hospital->id), 'Hospital should not exist in DB');
    }
}
