<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatMessage;

class ChatController extends Controller
{
    /**
     * Get recent chat messages
     */
    public function getMessages()
    {
        $currentUserId = auth()->id();
        $isAdmin = auth()->check() && auth()->user()->usertype === 'admin';

        $messages = ChatMessage::orderBy('id', 'asc')
            ->take(100)
            ->get()
            ->map(function ($msg) use ($currentUserId, $isAdmin) {
                return [
                    'id' => $msg->id,
                    'user_id' => $msg->user_id,
                    'user_name' => $msg->user_name,
                    'message' => $msg->message,
                    'is_admin' => (bool)$msg->is_admin,
                    'is_me' => (int)$msg->user_id === (int)$currentUserId,
                    'can_delete' => $isAdmin || ((int)$msg->user_id === (int)$currentUserId),
                    'time' => $msg->created_at ? $msg->created_at->timezone('Asia/Colombo')->format('h:i A') : '',
                    'date' => $msg->created_at ? $msg->created_at->timezone('Asia/Colombo')->format('M d') : '',
                ];
            });

        return response()->json([
            'success' => true,
            'messages' => $messages,
            'is_admin' => $isAdmin,
            'current_user_name' => auth()->user()->name ?? 'Student',
        ]);
    }

    /**
     * Send a new message under student's / user's name
     */
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $user = auth()->user();
        $msg = ChatMessage::create([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'message' => trim($request->message),
            'is_admin' => $user->usertype === 'admin',
        ]);

        return response()->json([
            'success' => true,
            'message' => [
                'id' => $msg->id,
                'user_id' => $msg->user_id,
                'user_name' => $msg->user_name,
                'message' => $msg->message,
                'is_admin' => (bool)$msg->is_admin,
                'is_me' => true,
                'can_delete' => true,
                'time' => $msg->created_at->timezone('Asia/Colombo')->format('h:i A'),
                'date' => $msg->created_at->timezone('Asia/Colombo')->format('M d'),
            ]
        ]);
    }

    /**
     * Delete a chat message (Admin can delete any message; user can delete own)
     */
    public function deleteMessage($id)
    {
        $msg = ChatMessage::findOrFail($id);
        $isAdmin = auth()->check() && auth()->user()->usertype === 'admin';
        $isAuthor = (int)$msg->user_id === (int)auth()->id();

        if (!$isAdmin && !$isAuthor) {
            return response()->json(['success' => false, 'error' => 'Unauthorized'], 403);
        }

        $msg->delete();

        return response()->json([
            'success' => true,
            'message' => 'Chat message deleted successfully.',
        ]);
    }
}

