<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Patient;

class PatientApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_patient()
    {
        $patient = factory(Patient::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/patients', $patient
        );

        $this->assertApiResponse($patient);
    }

    /**
     * @test
     */
    public function test_read_patient()
    {
        $patient = factory(Patient::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/patients/'.$patient->id
        );

        $this->assertApiResponse($patient->toArray());
    }

    /**
     * @test
     */
    public function test_update_patient()
    {
        $patient = factory(Patient::class)->create();
        $editedPatient = factory(Patient::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/patients/'.$patient->id,
            $editedPatient
        );

        $this->assertApiResponse($editedPatient);
    }

    /**
     * @test
     */
    public function test_delete_patient()
    {
        $patient = factory(Patient::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/patients/'.$patient->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/patients/'.$patient->id
        );

        $this->response->assertStatus(404);
    }
}
