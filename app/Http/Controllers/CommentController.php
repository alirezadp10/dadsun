<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use Illuminate\Support\Str;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $model = $this->resolveModel($request->commentable_type);

        $commetable = $model::findOrFail($request->commentable_id);

        $commetable->comments()->create([
            'body'    => $request->body,
            'user_id' => auth()->id(),
        ]);

        $blade = $this->resolveBlade($request->commentable_type);

        return redirect(route($blade,$request->commentable_id));
    }

    private function resolveModel($type)
    {
        return sprintf("\App\Models\%s",Str::title($type));
    }

    private function resolveBlade($type)
    {
        return sprintf("%s.show",Str::camel($type));
    }
}
