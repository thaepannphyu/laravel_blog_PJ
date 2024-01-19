<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use App\Models\Blog;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog)
    {
        request()->validate(['comment' => "required | min:5"]);

        $blog->comment()->create([
            'body' => request('comment'),
            'user_id' => auth()->id()
        ]);

        $subscribers = $blog->subscribers->filter(fn ($subscribe) => $subscribe->id != auth()->id());
        $subscribers->each(function ($subscriber) use ($blog) {
            Mail::to($subscriber->email)->cc($subscriber->email)
                ->bcc("phyu24655@gmail.com")->queue(new SubscriberMail($blog));
        });

        return redirect("blogs/$blog->slug");
    }
}
