<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UserService
{
    public function update(User $user, array $data): bool
    {
        if (!$data['password']) unset($data['password']);
        else $data['password'] = Hash::make($data['password']);
        if (!$data['newAvatar']) unset($data['newAvatar']);
        else $data['avatar_file'] = $this->uploadAvatar($data['newAvatar']);

        return $user->update($data);
    }

    public function uploadAvatar($file): string
    {
        $fileName = 'avatar_' . Str::random(16) . '.' . $file->getClientOriginalExtension();
        $destination = public_path('storage/images/avatars/');

        $img = Image::make($file->getRealPath());
        $img->resize(200, 200)->save($destination . $fileName);

        return $fileName;
    }
}
