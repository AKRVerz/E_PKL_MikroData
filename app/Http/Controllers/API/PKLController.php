<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PKLRequest;
use App\Interfaces\PklRepositoryInterface;
use App\Models\PKL;

class PKLController extends Controller
{
    private PklRepositoryInterface $PklRepository;

    public function __construct(PklRepositoryInterface $PklRepository)
    {
        $this->PklRepository = $PklRepository;
    }

    public function index(PKLRequest $request)
    {
        $request->validated();

        return response()->json([
            'body' => $this->PklRepository->createPKL($request->all())

        ]);
    }

    public function data()
    {
        return PKL::all();
    }
}
