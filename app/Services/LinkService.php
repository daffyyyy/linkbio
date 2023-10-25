<?php
namespace App\Services;

use App\Models\Link;

class LinkService
{
    public function create(array $data): Link
    {
        return Link::create($data);
    }

    public function update(Link $link, array $data, bool $checkOwnership = true): bool
    {
        if (!$this->checkOvnership($link->user_id)) {
            return false;
        }

        return $link->update($data);
    }

    public function delete(Link $link, bool $checkOwnership = true): bool|null
    {
        if (!$this->checkOvnership($link->user_id)) {
            return false;
        }

        return $link->delete();
    }

    public function updatePosition(array $data): void
    {
        foreach ($data as $link) {
            $this->update(Link::find($link['value']), ['position' => $link['order']]);
        }
    }

    private function checkOvnership(int $userId, bool $active = true): bool
    {
        return !$active ? true : $userId === auth()->user()->id;
    }
}
