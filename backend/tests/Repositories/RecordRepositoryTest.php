<?php namespace Tests\Repositories;

use App\Models\Record;
use App\Repositories\RecordRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class RecordRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var RecordRepository
     */
    protected $recordRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->recordRepo = \App::make(RecordRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_record()
    {
        $record = factory(Record::class)->make()->toArray();

        $createdRecord = $this->recordRepo->create($record);

        $createdRecord = $createdRecord->toArray();
        $this->assertArrayHasKey('id', $createdRecord);
        $this->assertNotNull($createdRecord['id'], 'Created Record must have id specified');
        $this->assertNotNull(Record::find($createdRecord['id']), 'Record with given id must be in DB');
        $this->assertModelData($record, $createdRecord);
    }

    /**
     * @test read
     */
    public function test_read_record()
    {
        $record = factory(Record::class)->create();

        $dbRecord = $this->recordRepo->find($record->id);

        $dbRecord = $dbRecord->toArray();
        $this->assertModelData($record->toArray(), $dbRecord);
    }

    /**
     * @test update
     */
    public function test_update_record()
    {
        $record = factory(Record::class)->create();
        $fakeRecord = factory(Record::class)->make()->toArray();

        $updatedRecord = $this->recordRepo->update($fakeRecord, $record->id);

        $this->assertModelData($fakeRecord, $updatedRecord->toArray());
        $dbRecord = $this->recordRepo->find($record->id);
        $this->assertModelData($fakeRecord, $dbRecord->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_record()
    {
        $record = factory(Record::class)->create();

        $resp = $this->recordRepo->delete($record->id);

        $this->assertTrue($resp);
        $this->assertNull(Record::find($record->id), 'Record should not exist in DB');
    }
}
