<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Admission;

class AdmissionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_admission()
    {
        $admission = factory(Admission::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admissions', $admission
        );

        $this->assertApiResponse($admission);
    }

    /**
     * @test
     */
    public function test_read_admission()
    {
        $admission = factory(Admission::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/admissions/'.$admission->id
        );

        $this->assertApiResponse($admission->toArray());
    }

    /**
     * @test
     */
    public function test_update_admission()
    {
        $admission = factory(Admission::class)->create();
        $editedAdmission = factory(Admission::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admissions/'.$admission->id,
            $editedAdmission
        );

        $this->assertApiResponse($editedAdmission);
    }

    /**
     * @test
     */
    public function test_delete_admission()
    {
        $admission = factory(Admission::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admissions/'.$admission->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admissions/'.$admission->id
        );

        $this->response->assertStatus(404);
    }
}
