<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePatientsAPIRequest;
use App\Http\Requests\API\UpdatePatientsAPIRequest;
use App\Models\Patients;
use App\Repositories\PatientsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Response;

/**
 * Class PatientsController
 * @package App\Http\Controllers\API
 */

class PatientsAPIController extends AppBaseController
{
    /** @var  PatientsRepository */
    private $patientsRepository;

    public function __construct(PatientsRepository $patientsRepo)
    {
        $this->patientsRepository = $patientsRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/patients",
     *      summary="Get a listing of the Patients.",
     *      tags={"Patients"},
     *      description="Get all Patients",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Patients")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $patients = $this->patientsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($patients->toArray(), 'Patients retrieved successfully');
    }

    /**
     * @param CreatePatientsAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/patients",
     *      summary="Store a newly created Patients in storage",
     *      tags={"Patients"},
     *      description="Store Patients",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Patients that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Patients")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Patients"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePatientsAPIRequest $request)
    {
        $input = $request->all();


        $patients = $this->patientsRepository->create($input);

        return $this->sendResponse($patients->toArray(), 'Patients saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/patients/{id}",
     *      summary="Display the specified Patients",
     *      tags={"Patients"},
     *      description="Get Patients",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Patients",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Patients"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Patients $patients */
        $patients = $this->patientsRepository->find($id);

        if (empty($patients)) {
            return $this->sendError('Patients not found');
        }

        return $this->sendResponse($patients->toArray(), 'Patients retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePatientsAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/patients/{id}",
     *      summary="Update the specified Patients in storage",
     *      tags={"Patients"},
     *      description="Update Patients",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Patients",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Patients that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Patients")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Patients"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePatientsAPIRequest $request)
    {
        /** @var Patients $patients */
        $patients = $this->patientsRepository->find($id);

        if (empty($patients)) {
            return $this->sendError('Patients not found');
        }

        $patients->delete();

        return $this->sendSuccess('Patients deleted successfully');


        $input = $request->all();
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/patients/{id}",
     *      summary="Remove the specified Patients from storage",
     *      tags={"Patients"},
     *      description="Delete Patients",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Patients",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
         /** @var Patients $patients */
         $patients = $this->patientsRepository->find($id);

         if (empty($patients)) {
             return $this->sendError('Patients not found');
         }
 
         $patients = $this->patientsRepository->update($input, $id);
 
         return $this->sendResponse($patients->toArray(), 'Patients updated successfully')
    }



}
