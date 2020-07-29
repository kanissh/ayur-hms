<?php namespace Tests\Repositories;

use App\Models\Patient;
use App\Repositories\PatientRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PatientRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PatientRepository
     */
    protected $patientRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->patientRepo = \App::make(PatientRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_patient()
    {
        $patient = factory(Patient::class)->make()->toArray();

        $createdPatient = $this->patientRepo->create($patient);

        $createdPatient = $createdPatient->toArray();
        $this->assertArrayHasKey('id', $createdPatient);
        $this->assertNotNull($createdPatient['id'], 'Created Patient must have id specified');
        $this->assertNotNull(Patient::find($createdPatient['id']), 'Patient with given id must be in DB');
        $this->assertModelData($patient, $createdPatient);
    }

    /**
     * @test read
     */
    public function test_read_patient()
    {
        $patient = factory(Patient::class)->create();

        $dbPatient = $this->patientRepo->find($patient->id);

        $dbPatient = $dbPatient->toArray();
        $this->assertModelData($patient->toArray(), $dbPatient);
    }

    /**
     * @test update
     */
    public function test_update_patient()
    {
        $patient = factory(Patient::class)->create();
        $fakePatient = factory(Patient::class)->make()->toArray();

        $updatedPatient = $this->patientRepo->update($fakePatient, $patient->id);

        $this->assertModelData($fakePatient, $updatedPatient->toArray());
        $dbPatient = $this->patientRepo->find($patient->id);
        $this->assertModelData($fakePatient, $dbPatient->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_patient()
    {
        $patient = factory(Patient::class)->create();

        $resp = $this->patientRepo->delete($patient->id);

        $this->assertTrue($resp);
        $this->assertNull(Patient::find($patient->id), 'Patient should not exist in DB');
    }
}
