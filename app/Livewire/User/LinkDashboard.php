<?php

namespace App\Livewire\User;

use App\Models\Link;
use App\Services\LinkService;
use Livewire\Component;

class LinkDashboard extends Component
{
    public $links, $user, $title, $description, $url, $icon, $customStyle, $linkId;
    public $isOpen, $visible = false;

    protected function rules(): array
    {
        return [
            'title' => 'required|min:3',
            'description' => 'nullable|min:3',
            'url' => 'required|url',
            'icon' => 'nullable',
            'visible' => 'required|boolean',
        ];
    }

    private function refreshData(): void
    {
        $this->reset('title', 'description', 'url', 'icon', 'visible', 'linkId');
        $this->links = $this->user->links->sortBy('position');
    }

    public function mount(): void
    {
        $this->user = auth()->user();
        $this->refreshData();
    }

    public function render()
    {
        return view('livewire.user.link-dashboard');
    }


    public function openModal(): void
    {
        $this->refreshData();
        $this->isOpen = true;
    }

    public function closeModal(): void
    {
        $this->isOpen = false;
    }

    public function updateLinkPosition($links): void
    {
        (new LinkService())->updatePosition($links);
        $this->links = $this->user->links->sortBy('position');
    }

    public function edit(int $id): void
    {
        $link = Link::find($id);

        $this->linkId = $id;
        $this->title = $link->title;
        $this->description = $link->description;
        $this->url = $link->url;
        $this->visible = $link->visible;
        $this->isOpen = true;
    }

    public function delete(int $id): void
    {
        (new LinkService())->delete(link: Link::find($id));
        $this->refreshData();
    }

    public function save(): void
    {
        $this->icon = $this->icon ?: null;
        $data = $this->validate();

        if (is_null($this->linkId)) {
            $data['user_id'] = auth()->user()->id;
            (new LinkService())->create($data);
        } else {
            (new LinkService())->update(Link::find($this->linkId), $data);
        }
        $this->refreshData();
        $this->isOpen = false;

        request()->session()->flash('success', 'Link <strong>' . $data['title'] . '</strong> saved successfully!');
    }
}
