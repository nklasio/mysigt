<?php

namespace App\Http\Livewire;

use App\Models\DeviceBackup;
use Livewire\Component;
use Livewire\WithPagination;

class BackupView extends Component {

    use WithPagination;

    public $perPage = 6;
    public $sortAsc = false;
    public $sortField = 'created_at';
    public $searchQuery = '';

    public $device;

    public function setAsc() {
        $this->sortAsc = true;
    }

    public function setDesc() {
        $this->sortAsc = false;
    }

    public function updatingSearch() {
        $this->resetPage();
    }

    public function sortBy() {
        $this->sortAsc = !$this->sortAsc;
    }

    public function mount() {}


    public function render() {
        $backups = DeviceBackup::search($this->searchQuery)
            ->where('device_id', $this->device->id)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        //dump($backups);
        return view('livewire.backup-view', ['backups' => $backups]);
    }
}
