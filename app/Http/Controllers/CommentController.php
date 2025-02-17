<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CommentController extends Controller
{
    use AuthorizesRequests;
    
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment); // Pastikan user memiliki izin untuk menghapus komentar

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }


    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'id_film' => 'required|exists:films,id',
        ]);

        Comment::create([
            'comment' => $request->comment,
            'rating' => $request->rating,
            'id_film' => $request->id_film,
            'id_user' => Auth::id(),
        ]);

        return back()->with('success', 'Komentar dan rating berhasil dikirim!');
    }

    public function update(Request $request, Comment $comment)
    {
        // Pastikan hanya pemilik komentar yang bisa mengupdate
        $this->authorize('update', $comment);

        $request->validate([
            'comment' => 'required|string',
            'rating' => 'required|integer|between:1,5',
        ]);

        $comment->update([
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);

        return back()->with('success', 'Komentar berhasil diperbarui.');
    }
}
