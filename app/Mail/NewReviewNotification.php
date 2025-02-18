<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Review;

class NewReviewNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $review;


    public function __construct(Review $review)
    {
        $this->review = $review;
    }


    public function build()
    {
        return $this->subject('New Review Submitted')
            ->view('emails.review-submitted')  // Change to match the file name
            ->with(['review' => $this->review]);
    }
}
