<?php

namespace App\Livewire\Dashboard\Settings;

use App\Repositories\Setting\SettingRepository;
use App\Traits\GuzzleTrait;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Seo extends Component
{
    use WithFileUploads;
    use GuzzleTrait;


    #[Validate('nullable|image')]
    public $logo = "";
    public $beforeLogo = "";

    #[Validate('nullable|image')]
    public $faveIcon = "";
    public $beforeFaveIcon = "";
    #[Validate('nullable|image')]
    public $logoPanel = "";
    public $beforeLogoPanel = "";


    #[Validate('required')]
    public $title = "";


    #[Validate('required')]
    public $meta = "";

    #[Validate('required')]
    public $smDescription = "";
    #[Validate('required')]
    public $keywords = "";


    #[Validate('required')]
    public $scripts = "";


    #[Validate('required')]
    public $headerTelephoneSupport;

    #[Validate('required')]
    public $headerTextSupport;

    public $enamadCode = "";
    public $eata = "";
    public $sorosh = "";
    public $instagram = "";
    public $telegram = "";


    public $whatsapp;
    public $branchId = null;


    public function setChange()
    {

        $this->validate();

        $data =
            [
                [
                    "name" => 'title',
                    "branchId" => $this->branchId,
                    'value' => $this->title
                ],
                [
                    "name" => 'meta',
                    "branchId" => $this->branchId,
                    'value' => $this->meta
                ],
                [
                    "name" => 'smDescription',
                    "branchId" => $this->branchId,
                    'value' => $this->smDescription
                ],
                [
                    "name" => 'keywords',
                    "branchId" => $this->branchId,
                    'value' => $this->keywords
                ],
                [
                    "name" => 'scripts',
                    "branchId" => $this->branchId,
                    'value' => $this->scripts
                ],
                [
                    "name" => 'enamadCode',
                    "branchId" => $this->branchId,
                    'value' => $this->enamadCode
                ],
                [
                    "name" => 'eata',
                    "branchId" => $this->branchId,
                    'value' => $this->eata
                ],
                [
                    "name" => 'sorosh',
                    "branchId" => $this->branchId,
                    'value' => $this->sorosh
                ],
                [
                    "name" => 'instagram',
                    "branchId" => $this->branchId,
                    'value' => $this->instagram
                ],
                [
                    "name" => 'telegram',
                    "branchId" => $this->branchId,
                    'value' => $this->telegram
                ],
                [
                    "name" => 'whatsapp',
                    "branchId" => $this->branchId,
                    'value' => $this->whatsapp
                ],
                [
                    "name" => 'headerTelephoneSupport',
                    'value' => $this->headerTelephoneSupport
                ],
                [
                    "name" => 'headerTextSupport',
                    'value' => $this->headerTextSupport
                ]
            ];


        if ($this->logo) {
            $path = $this->upload($this->logo) ?? "";
            $data[] =
                [
                    "name" => 'logo',
                    "branchId" => $this->branchId,
                    'value' => $path
                ];
        }


        if ($this->faveIcon) {
            $path = $this->upload($this->faveIcon) ?? "";
            $data[] =
                [
                    "name" => 'faveIcon',
                    "branchId" => $this->branchId,
                    'value' => $path
                ];
        }

        if ($this->logoPanel) {
            $path = $this->upload($this->logoPanel) ?? "";
            $data[] =
                [
                    "name" => 'logoPanel',
                    "branchId" => $this->branchId,
                    'value' => $path
                ];
        }
        $setting = app(SettingRepository::class)->storeOrUpdate(['items' => $data]);
        if (isset($setting['statusCode']) and $setting['statusCode'] == 400)
            $this->dispatch('notification', message: $setting['errors'][0]);
        else if ($setting == null)
            $this->dispatch('notification', message: __('messages.error request'));

        session()->flash('notification', __('messages.success request'));
        $this->redirectRoute('admin.setting.seo');
    }


    public function mount()
    {
        $settings = app(SettingRepository::class)->get(["names" => ["logo", "logoPanel", "faveIcon", "title", "meta", "smDescription", "keywords", "scripts", "enamadCode", "eata", "sorosh", "instagram", "telegram", "whatsapp", "headerTextSupport", "headerTelephoneSupport"], "branch_id" => $this->branchId]);
        if ($settings == null)
            $this->dispatch('notification', message: __('messages.error response'));

        $this->beforeLogo = $settings['logo'] ?? " ";
        $this->beforeFaveIcon = $settings['faveIcon'] ?? " ";
        $this->beforeLogoPanel = $settings['logoPanel'] ?? " ";
        $this->title = $settings['title'] ?? " ";
        $this->meta = $settings['meta'] ?? " ";
        $this->keywords = $settings['keywords'] ?? " ";
        $this->smDescription = $settings['smDescription'] ?? " ";
        $this->scripts = $settings['scripts'] ?? " ";
        $this->eata = $settings['eata'] ?? " ";
        $this->sorosh = $settings['sorosh'] ?? " ";
        $this->instagram = $settings['instagram'] ?? " ";
        $this->telegram = $settings['telegram'] ?? " ";
        $this->whatsapp = $settings['whatsapp'] ?? " ";
        $this->enamadCode = $settings['enamadCode'] ?? " ";

        $this->headerTelephoneSupport = $settings['headerTelephoneSupport'] ?? " ";
        $this->headerTextSupport = $settings['headerTextSupport'] ?? " ";
    }


    public
    function render()
    {
        return view('livewire.dashboard.setting.seo')->extends('layouts.app');
    }
}
