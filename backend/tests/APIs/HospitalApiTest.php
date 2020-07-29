<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Hospital;

class HospitalApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_hospital()
    {
        $hospital = factory(Hospital::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/hospitals', $hospital
        );

        $this->assertApiResponse($hospital);
    }

    /**
     * @test
     */
    public function test_read_hospital()
    {
        $hospital = factory(Hospital::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/hospitals/'.$hospital->id
        );

        $this->assertApiResponse($hospital->toArray());
    }

    /**
     * @test
     */
    public function test_update_hospital()
    {
        $hospital = factory(Hospital::class)->create();
        $editedHospital = factory(Hospital::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/hospitals/'.$hospital->id,
            $editedHospital
        );

        $this->assertApiResponse($editedHospital);
    }

    /**
     * @test
     */
    public function test_delete_hospital()
    {
        $hospital = factory(Hospital::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/hospitals/'.$hospital->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/hospitals/'.$hospital->id
        );

        $this->response->assertStatus(404);
    }
}
