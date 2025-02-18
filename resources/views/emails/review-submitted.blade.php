<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Review Submitted</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">

<div style="max-width: 600px; background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">

    <h2 style="color: #333;">📢 New Review Submitted</h2>

    <p><strong>📌 Title:</strong> {{ $review->title }}</p>
    <p><strong>📝 Description:</strong> {{ $review->description }}</p>
    <p><strong>⭐ Rating:</strong> {{ $review->rate }}/10</p>

    <hr style="border: none; border-top: 1px solid #ddd; margin: 15px 0;">

    <p>Click below to **approve** or **reject** this review:</p>

    <div style="text-align: center; margin-top: 20px;">
        <!-- Approve Button -->
        <a href="{{ url('/admin/reviews/approve/' . $review->id) }}"
           style="display: inline-block; background-color: #28a745; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; font-size: 16px;">
            ✅ Approve Review
        </a>

        <!-- Reject Button -->
        <a href="{{ url('/admin/reviews/reject/' . $review->id) }}"
           style="display: inline-block; background-color: #dc3545; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; font-size: 16px; margin-left: 10px;">
            ❌ Reject Review
        </a>
    </div>

    <p style="margin-top: 20px;">
        🔍 Log in to your <a href="{{ url('/admin/dashboard') }}" style="color: #007bff; text-decoration: none;">Admin Dashboard</a> to manage all reviews.
    </p>

</div>

</body>
</html>
