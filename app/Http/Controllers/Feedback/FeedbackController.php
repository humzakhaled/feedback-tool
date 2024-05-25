<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    protected $viewPath = 'dashboard.feedbacks.';

    public function index()
    {
        $feedbacks = Feedback::with(['category', 'user'])->latest()->paginate(10);
        return view($this->viewPath . 'index', compact('feedbacks'));
    }

    public function create()
    {
        $categories = Category::all();
        return view($this->viewPath . 'create', compact('categories'));
    }

    public function store(FeedbackRequest $request)
    {
        Feedback::create(array_merge($request->validated(), ['user_id' => auth()->id()]));
        return redirect()->route('feedbacks.index')->with('success', 'Feedback created successfully');
    }

    public function show($id)
    {
        $feedback = Feedback::with(['category', 'comments.user'])->findOrFail($id);
        return view($this->viewPath . 'show', compact('feedback'));
    }
}
