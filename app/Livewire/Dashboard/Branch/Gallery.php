<?php

namespace App\Livewire\Dashboard\Branch;

use App\Repositories\Branch\BranchRepository;
use App\Repositories\Gallery\GalleryRepository;
use App\Traits\GuzzleTrait;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Gallery extends Component
{
    use WithPagination;
    use WithFileUploads;
    use GuzzleTrait;

    #[Url]
    public $search = "";

    public $branchId;

    public $beforeImages = [];
    public $images = [
        ["path" => null],
        ["path" => null],
        ["path" => null],
        ["path" => null],
        ["path" => null],
    ];

    public function mount($id=null)
    {
        if ($id==null)
            $id=session('target_role_id');
        $this->branchId = $id;
    }


    public function getData()
    {
        $galleryRepository = app(GalleryRepository::class);
        $galleries = $galleryRepository->get(['branch_id' => $this->branchId]);
        if (isset($galleries['files']) and count($galleries['files']) > 0) {
            foreach ($galleries['files'] as $key => $file) {
                $this->beforeImages[$key]['path'] = $file['path'];
            }
        }
    }


    public function setGallery()
    {
        $images = $this->images;
        $beforeImages = $this->beforeImages;
        foreach ($images as $key => $item) {
            if ($item['path'] != null and $item['path'] != "") {
                $images[$key]['path'] = $this->upload($item['path']) ?? "";
                unset($beforeImages[$key]);
            } else {
                unset($images[$key]);
            }
        }
        foreach ($beforeImages as $key => $item) {
            $images[]['path'] = $item['path'] ?? "";
        }
        $galleries = app(GalleryRepository::class)->store(['branch_id' => $this->branchId, 'images' => $images]);
        if ($galleries != null){


            session()->flash('notification', $galleries);
            $this->redirectRoute('admin.branch.gallery',$this->branchId);
        }
        else
            $this->dispatch('notification', message: __('messages.error request'));

    }

    public function refreshData()
    {
        $this->render();
    }

    public function render()
    {
        $data = $this->getData();
        return view('livewire.dashboard.branch.gallery', [
            'branches' => $data
        ])->extends('layouts.app');
    }
}
