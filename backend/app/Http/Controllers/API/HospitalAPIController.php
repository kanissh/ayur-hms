<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateHospitalAPIRequest;
use App\Http\Requests\API\UpdateHospitalAPIRequest;
use App\Models\Hospital;
use App\Repositories\HospitalRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class HospitalController
 * @package App\Http\Controllers\API
 */

class HospitalAPIController extends AppBaseController
{
    /** @var  HospitalRepository */
    private $hospitalRepository;

    public function __construct(HospitalRepository $hospitalRepo)
    {
        $this->hospitalRepository = $hospitalRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/hospitals",
     *      summary="Get a listing of the Hospitals.",
     *      tags={"Hospital"},
     *      description="Get all Hospitals",
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
     *                  @SWG\Items(ref="#/definitions/Hospital")
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
        $hospitals = $this->hospitalRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($hospitals->toArray(), 'Hospitals retrieved successfully');
    }

    /**
     * @param CreateHospitalAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/hospitals",
     *      summary="Store a newly created Hospital in storage",
     *      tags={"Hospital"},
     *      description="Store Hospital",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Hospital that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Hospital")
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
     *                  ref="#/definitions/Hospital"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateHospitalAPIRequest $request)
    {
        $input = $request->all();

        $hospital = $this->hospitalRepository->create($input);

        return $this->sendResponse($hospital->toArray(), 'Hospital saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/hospitals/{id}",
     *      summary="Display the specified Hospital",
     *      tags={"Hospital"},
     *      description="Get Hospital",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Hospital",
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
     *                  ref="#/definitions/Hospital"
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
        /** @var Hospital $hospital */
        $hospital = $this->hospitalRepository->find($id);

        if (empty($hospital)) {
            return $this->sendError('Hospital not found');
        }

        return $this->sendResponse($hospital->toArray(), 'Hospital retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateHospitalAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/hospitals/{id}",
     *      summary="Update the specified Hospital in storage",
     *      tags={"Hospital"},
     *      description="Update Hospital",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Hospital",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Hospital that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Hospital")
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
     *                  ref="#/definitions/Hospital"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateHospitalAPIRequest $request)
    {
        $input = $request->all();

        /** @var Hospital $hospital */
        $hospital = $this->hospitalRepository->find($id);

        if (empty($hospital)) {
            return $this->sendError('Hospital not found');
        }

        $hospital = $this->hospitalRepository->update($input, $id);

        return $this->sendResponse($hospital->toArray(), 'Hospital updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/hospitals/{id}",
     *      summary="Remove the specified Hospital from storage",
     *      tags={"Hospital"},
     *      description="Delete Hospital",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Hospital",
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
        /** @var Hospital $hospital */
        $hospital = $this->hospitalRepository->find($id);

        if (empty($hospital)) {
            return $this->sendError('Hospital not found');
        }

        $hospital->delete();

        return $this->sendSuccess('Hospital deleted successfully');
    }
}
