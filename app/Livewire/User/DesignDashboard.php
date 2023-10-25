<?php

namespace App\Livewire\User;

use App\Models\Design;
use Illuminate\Support\Facades\View;
use Livewire\Component;

class DesignDashboard extends Component
{
    public $design, $custom_style, $preview;

    protected function rules(): array
    {
        return ['custom_style' => 'nullable|string'];
    }

    public function render()
    {
        $this->design = auth()->user()->design;
        $this->custom_style = $this->design->custom_style;
        $this->preview = route('user.show', auth()->user()->slug) . '?t=' . time();
        return view('livewire.user.design-dashboard');
    }

    public function save(): void
    {
        $data = $this->validate();
        $data['user_id'] = auth()->user()->id;

        if ($this->design == null) {
            Design::create($data);
        } else {
            Design::where('user_id', $data['user_id'])->update($data);
        }

        // request()->session()->flash('success', 'Link <strong>' . $data['title'] . '</strong> saved successfully!');
    }
}
