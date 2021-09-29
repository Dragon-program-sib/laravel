<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\Category;
use App\Models\News;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

//use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(DB::table('news'));
        //dd(DB::table('news'))->count();
        //dd(DB::table('news')->avg('id'));
        /*dd(DB::table('news')
        ->join('categories', 'categories.id', '=', 'news.category_id')
        ->select('news.*', 'categories.title as categoryTitle')->toSql());*/
        /*dd(DB::table('news')
        ->join('categories', 'categories.id', '=', 'news.category_id')
        ->select('news.*', 'categories.title as categoryTitle')->get());*/
        //$model = new News();

        $newsList = News::with('category') //News::orderBy('id', 'desc')//all();//whereIn('id', [1,3,5,7,9])->get();
            ->paginate(
                config('news.paginate')
            );

        return view('admin.news.index', [
            'newsList' => $newsList //News::all() //$model->getNews()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::all();
        return view('admin.news.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCreateRequest $request)
    {
        /*$request->validate([
            'title' => ['required', 'string', 'min:3']
        ]);*/

        //$data = $request->only(['category_id', 'title', 'author', 'description']);
        $news = News::create(
            //$request->only(['category_id', 'title', 'author', 'description'])
            $request->validated()
        );

        //return response()->json($request->all());
        if ($news) {
            return redirect()
                ->route('admin.news.index')
                ->with('success', trans('messages.admin.news.create.success'));
        }

        return back()
            ->with('error', __('messages.admin.news.create.fail'))
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NewsUpdateRequest  $request
     * @param  News  $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(NewsUpdateRequest $request, News $news)
    {
        /*$request->validate([
            //
        ]);*/

        //$data = $request->only(['category_id', 'title', 'author', 'description']);
        $news = $news->fill(
            //$request->only(['category_id', 'title', 'author', 'description'])
            $request->validated()
        )->save();

        //return response()->json($request->all());
        if ($news) {
            return redirect()
                ->route('admin.news.index')
                ->with('success', __('messages.admin.news.update.success'));
        }

        return back()
            ->with('error', __('messages.admin.news.update.fail'))
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, News $news)
    {
        if($request->ajax()) {
            try {
                $news->delete();

                return response()->json(['message' => 'ok']);
                //return response()->json(['message' => 'error'], 400);
            } catch (Exception $e) {
                Log::error("Error delete news!" . PHP_EOL, [$e]);
                return response()->json(['message' => 'error'], 400);
            }
        }
    }
}
