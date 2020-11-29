<?php

namespace App\Http\Controllers\Api\Novels;

use App\Http\Controllers\Controller;
use App\Http\Requests\Novels\NovelRequest;
use Illuminate\Http\Response;
use App\Http\Resources\NovelResource;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\Novel;

class NovelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return NovelResource::collection(Novel::paginate(25));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NovelRequest $request)
    {
        try {
            $novel = new Novel;
            $novel->fill($request->validated())->save();

            return new NovelResource($novel);

        } catch(\Exception $exception) {
            throw new HttpException(400, "Invalid data - {$exception->getMessage}");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $novel = Novel::findOrfail($id);

        return new NovelResource($novel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NovelRequest $request, $id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        try {
           $novel = Novel::find($id);
           $novel->fill($request->validated())->save();

           return new NovelResource($novel);

        } catch(\Exception $exception) {
           throw new HttpException(400, "Invalid data - {$exception->getMessage}");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $novel = Novel::findOrfail($id);
        $novel->delete();

        return response()->json(null, 204);
    }
}
