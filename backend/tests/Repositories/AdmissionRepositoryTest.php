<?php namespace Tests\Repositories;

use App\Models\Admission;
use App\Repositories\AdmissionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AdmissionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AdmissionRepository
     */
    protected $admissionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->admissionRepo = \App::make(AdmissionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_admission()
    {
        $admission = factory(Admission::class)->make()->toArray();

        $createdAdmission = $this->admissionRepo->create($admission);

        $createdAdmission = $createdAdmission->toArray();
        $this->assertArrayHasKey('id', $createdAdmission);
        $this->assertNotNull($createdAdmission['id'], 'Created Admission must have id specified');
        $this->assertNotNull(Admission::find($createdAdmission['id']), 'Admission with given id must be in DB');
        $this->assertModelData($admission, $createdAdmission);
    }

    /**
     * @test read
     */
    public function test_read_admission()
    {
        $admission = factory(Admission::class)->create();

        $dbAdmission = $this->admissionRepo->find($admission->id);

        $dbAdmission = $dbAdmission->toArray();
        $this->assertModelData($admission->toArray(), $dbAdmission);
    }

    /**
     * @test update
     */
    public function test_update_admission()
    {
        $admission = factory(Admission::class)->create();
        $fakeAdmission = factory(Admission::class)->make()->toArray();

        $updatedAdmission = $this->admissionRepo->update($fakeAdmission, $admission->id);

        $this->assertModelData($fakeAdmission, $updatedAdmission->toArray());
        $dbAdmission = $this->admissionRepo->find($admission->id);
        $this->assertModelData($fakeAdmission, $dbAdmission->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_admission()
    {
        $admission = factory(Admission::class)->create();

        $resp = $this->admissionRepo->delete($admission->id);

        $this->assertTrue($resp);
        $this->assertNull(Admission::find($admission->id), 'Admission should not exist in DB');
    }
}
