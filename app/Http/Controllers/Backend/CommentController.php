<?php

namespace Modules\Backend\Http\Controllers;

use App\Repositories\ErrorRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{

    public function index()
    {
        $comments = DB::table('comments')
            ->select('title', 'full_name', 'email', 'comments.is_active', 'comments.id', 'comments.description')
            ->join('news', 'comments.news_id', '=', 'news.id')
            ->when(request()->query('is_active'), function ($q) {
                $q->where('is_active', request()->get('is_active'));
            })
            ->orderByDesc('id')
            ->paginate(20);
        return view('backend::comments.index', compact('comments'));
    }

    public function changeStatus($id)
    {
        try {
            $comment = DB::table('comments')
                ->select('is_active')
                ->where('id', $id)
                ->first();
            if ($comment) {
                DB::table('comments')
                    ->where('id', $id)
                    ->update(['is_active' => !$comment->is_active]);
                return redirect()->back()->with('success', 'Comment status is changed successfully');
            }
            return redirect()->back()->with('error', 'Comments is not available');
        } catch (\Exception $exception) {
            (new ErrorRepository())->logError($exception);
            return redirect()->back()->with('error', $exception->getMessage());


        }


    }


}
