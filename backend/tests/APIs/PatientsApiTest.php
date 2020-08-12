<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Patients;

class PatientsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_patients()
    {
        $patients = factory(Patients::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/patients', $patients
        );

        $this->assertApiResponse($patients);
    }

    /**
     * @test
     */
    public function test_read_patients()
    {
        $patients = factory(Patients::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/patients/'.$patients->id
        );

        $this->assertApiResponse($patients->toArray());
    }

    /**
     * @test
     */
    public function test_update_patients()
    {
        $patients = factory(Patients::class)->create();
        $editedPatients = factory(Patients::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/patients/'.$patients->id,
            $editedPatients
        );

        $this->assertApiResponse($editedPatients);
    }

    /**
     * @test
     */
    public function test_delete_patients()
    {
        $patients = factory(Patients::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/patients/'.$patients->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/patients/'.$patients->id
        );

        $this->response->assertStatus(404);
    }
}
