<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCusineRequest;
use App\Http\Requests\UpdateCusineRequest;
use App\Repositories\CusineRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Cusine;
use Flash;
use Response;

class CusineController extends AppBaseController
{
    /** @var  CusineRepository */
    private $cusineRepository;

    public function __construct(CusineRepository $cusineRepo)
    {
        $this->cusineRepository = $cusineRepo;
    }

    /**
     * Display a listing of the Cusine.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cusines = $this->cusineRepository->all();

        return view('cusines.index')
            ->with('cusines', $cusines);
    }

    /**
     * Show the form for creating a new Cusine.
     *
     * @return Response
     */
    public function create()
    {
        return view('cusines.create');
    }

    /**
     * Store a newly created Cusine in storage.
     *
     * @param CreateCusineRequest $request
     *
     * @return Response
     */
    public function store(CreateCusineRequest $request)
    {
        $input = $request->all();

        $cusine = $this->cusineRepository->create($input);

        Flash::success('Cusine saved successfully.');

        return redirect(route('cusines.index'));
    }

    /**
     * Display the specified Cusine.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cusine = $this->cusineRepository->find($id);

        if (empty($cusine)) {
            Flash::error('Cusine not found');

            return redirect(route('cusines.index'));
        }

        return view('cusines.show')->with('cusine', $cusine);
    }

    /**
     * Show the form for editing the specified Cusine.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cusine = $this->cusineRepository->find($id);

        if (empty($cusine)) {
            Flash::error('Cusine not found');

            return redirect(route('cusines.index'));
        }

        return view('cusines.edit')->with('cusine', $cusine);
    }

    /**
     * Update the specified Cusine in storage.
     *
     * @param int $id
     * @param UpdateCusineRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCusineRequest $request)
    {
        $cusine = $this->cusineRepository->find($id);

        if (empty($cusine)) {
            Flash::error('Cusine not found');

            return redirect(route('cusines.index'));
        }

        $cusine = $this->cusineRepository->update($request->all(), $id);

        Flash::success('Cusine updated successfully.');

        return redirect(route('cusines.index'));
    }

    /**
     * Remove the specified Cusine from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cusine = $this->cusineRepository->find($id);

        if (empty($cusine)) {
            Flash::error('Cusine not found');

            return redirect(route('cusines.index'));
        }

        $this->cusineRepository->delete($id);

        Flash::success('Cusine deleted successfully.');

        return redirect(route('cusines.index'));
    }

   public function getallcusines()
   {
       return Cusine::all();
   }
   
}
