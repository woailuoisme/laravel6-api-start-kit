<?php


namespace App\Http\Controllers\API\V1;


use App\Http\Controllers\AppBaseController;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends AppBaseController
{
    public function avatar(Request $request): \Illuminate\Http\JsonResponse
    {
        /** @var User $user */
        $user = Auth::guard('api')->user();
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('public/avatars');
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }
            $user->avatar = $path;
            $user->save();
        }
        return $this->sendResponse(new UserResource($user), 'user avatar upload successfully');
    }

}
