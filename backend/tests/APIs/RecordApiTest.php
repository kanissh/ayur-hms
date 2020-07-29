<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Record;

class RecordApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_record()
    {
        $record = factory(Record::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/records', $record
        );

        $this->assertApiResponse($record);
    }

    /**
     * @test
     */
    public function test_read_record()
    {
        $record = factory(Record::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/records/'.$record->id
        );

        $this->assertApiResponse($record->toArray());
    }

    /**
     * @test
     */
    public function test_update_record()
    {
        $record = factory(Record::class)->create();
        $editedRecord = factory(Record::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/records/'.$record->id,
            $editedRecord
        );

        $this->assertApiResponse($editedRecord);
    }

    /**
     * @test
     */
    public function test_delete_record()
    {
        $record = factory(Record::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/records/'.$record->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/records/'.$record->id
        );

        $this->response->assertStatus(404);
    }
}
