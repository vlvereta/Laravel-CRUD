<?php

namespace App\Http\Controllers;

use App\Services\Currency;
use Illuminate\Http\Request;
use App\Services\CurrencyRepositoryInterface;
use App\Services\CurrencyPresenter;

class AdminController extends Controller
{
    private $repository;

    public function __construct()
    {
        $this->repository = app()->make(CurrencyRepositoryInterface::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(CurrencyPresenter::presentCollection($this->repository->findAll()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->repository->save(new Currency(null,
            $request->get('name'),
            $request->get('short_name'),
            $request->get('actual_course'),
            $request->get('actual_course_date'),
            $request->get('active')
        ));
        return response()->json(CurrencyPresenter::presentCollection($this->repository->findAll()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!is_numeric($id) || !($currency = $this->repository->findById($id)))
            abort(404);
        return response()->json(CurrencyPresenter::present($currency));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!is_numeric($id) || !($currency = $this->repository->findById($id))) {
            abort(404);
        }
        $result = array(
            'name' => $request->has('name') ? $request->get('name') : $currency->getName(),
            'short_name' => $request->has('short_name') ? $request->get('short_name') : $currency->getShortName(),
            'actual_course' => $request->has('actual_course') ? $request->get('actual_course') : $currency->getActualCourse(),
            'actual_course_date' => $request->has('actual_course_date') ? $request->get('actual_course_date') : $currency->getActualCourseDate(),
            'active' => $request->has('active') ? $request->get('active') : $currency->isActive()
        );
        $this->repository->delete($currency);
        $this->repository->save(new Currency($id, $result['name'], $result['short_name'], $result['actual_course'], $result['actual_course_date'], $result['active']));
        return response()->json(CurrencyPresenter::presentCollection($this->repository->findAll()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!is_numeric($id) || !($currency = $this->repository->findById($id))) {
            abort(404);
        } else {
            $this->repository->delete($currency);
        }
        return response()->json(CurrencyPresenter::presentCollection($this->repository->findAll()));
    }
}
