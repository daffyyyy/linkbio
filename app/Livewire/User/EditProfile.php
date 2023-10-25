<?php

namespace App\Livewire\User;

use App\Models\User;
use App\Services\UserService;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfile extends Component
{
    use WithFileUploads;
    public User $user;
    public $currentPassword, $password, $avatarPath, $newAvatar, $bio, $location, $contact, $status;

    protected function rules(): array
    {
        return [
            "currentPassword" => "current_password",
            "password" => "nullable|min:6",
            "newAvatar" => "nullable|image|max:5120",
            "bio" => "nullable|max:255",
            "location" => "nullable|max:32",
            "contact" => "nullable|max:32",
        ];
    }
    private function refreshData(): void
    {
        $this->reset('currentPassword', 'password', 'bio', 'newAvatar');
        $this->bio = $this->user->bio;
        $this->location = $this->user->location;
        $this->contact = $this->user->contact;
        $this->avatarPath = $this->user->avatar();
    }
    public function mount(): void
    {
        $this->user = User::find(auth()->user()->id);
        $this->refreshData();

    }
    public function render()
    {
        return view('livewire.user.edit-profile');
    }

    public function save(): void
    {
        $data = $this->validate();
        unset($data['currentPassword']);
        (new UserService())->update($this->user, $data);
        request()->session()->flash('success', 'Account details changed successfully!');
        $this->refreshData();
    }
}
