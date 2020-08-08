<?php namespace Tests\Repositories;

use App\Models\Patients;
use App\Repositories\PatientsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PatientsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PatientsRepository
     */
    protected $patientsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->patientsRepo = \App::make(PatientsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_patients()
    {
        $patients = factory(Patients::class)->make()->toArray();

        $createdPatients = $this->patientsRepo->create($patients);

        $createdPatients = $createdPatients->toArray();
        $this->assertArrayHasKey('id', $createdPatients);
        $this->assertNotNull($createdPatients['id'], 'Created Patients must have id specified');
        $this->assertNotNull(Patients::find($createdPatients['id']), 'Patients with given id must be in DB');
        $this->assertModelData($patients, $createdPatients);
    }

    /**
     * @test read
     */
    public function test_read_patients()
    {
        $patients = factory(Patients::class)->create();

        $dbPatients = $this->patientsRepo->find($patients->id);

        $dbPatients = $dbPatients->toArray();
        $this->assertModelData($patients->toArray(), $dbPatients);
    }

    /**
     * @test update
     */
    public function test_update_patients()
    {
        $patients = factory(Patients::class)->create();
        $fakePatients = factory(Patients::class)->make()->toArray();

        $updatedPatients = $this->patientsRepo->update($fakePatients, $patients->id);

        $this->assertModelData($fakePatients, $updatedPatients->toArray());
        $dbPatients = $this->patientsRepo->find($patients->id);
        $this->assertModelData($fakePatients, $dbPatients->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_patients()
    {
        $patients = factory(Patients::class)->create();

        $resp = $this->patientsRepo->delete($patients->id);

        $this->assertTrue($resp);
        $this->assertNull(Patients::find($patients->id), 'Patients should not exist in DB');
    }
}
