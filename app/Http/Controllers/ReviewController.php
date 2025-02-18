<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewReviewNotification;

class ReviewController extends Controller
{

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'rate' => 'required|integer|min:1|max:10',
        ]);


        $review = Review::create([
            'title' => $request->title,
            'description' => $request->description,
            'rate' => $request->rate,
            'is_approved' => false,
        ]);


        Mail::to('galloivan644@gmail.com')->send(new NewReviewNotification($review));

        return redirect()->back()->with('success', 'Your review has been submitted and is pending approval.');
    }
    public function approve($id)
    {
        $review = Review::findOrFail($id);
        $review->is_approved = true;
        $review->save();

        return response()->json(['message' => 'Review approved successfully.']);
    }

    public function reject($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('success', 'Review has been rejected.');
    }

    public function destroy($id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json(['error' => 'Review not found.'], 404);
        }

        $review->delete();

        return response()->json(['message' => 'Review deleted successfully.'], 200);
    }

}
