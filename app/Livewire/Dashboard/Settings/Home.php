<?php

namespace App\Livewire\Dashboard\Settings;

use App\Repositories\Setting\SettingRepository;
use App\Traits\GuzzleTrait;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class Home extends Component
{
    use WithFileUploads;
    use GuzzleTrait;


    public $home_fixed_image;

    public $home_discount_section;
    public $home_vendor_section;
    public $home_food_section;
    public $home_about_section;
    public $home_steps_section;
    public $home_register_vendor_section;
    public $home_features_section;

    public function setChange()
    {
//        $this->validate();
        foreach ($this->home_fixed_image as $key => $image) {
            $path = "";
            if ($image['image'] instanceof TemporaryUploadedFile) {
                $path = $this->upload($image['image']) ?? "";
                $this->home_fixed_image[$key]['image'] = $path;
            }
        }
        foreach ($this->home_steps_section as $key => $image) {
            $path = "";
            if ($image['image'] instanceof TemporaryUploadedFile) {
                $path = $this->upload($image['image']) ?? "";
                $this->home_steps_section[$key]['image'] = $path;
            }
        }
        foreach ($this->home_features_section['items'] as $key => $image) {
            $path = "";
            if ($image['image'] instanceof TemporaryUploadedFile) {
                $path = $this->upload($image['image']) ?? "";
                $this->home_features_section['items'][$key]['image'] = $path;
            }
        }
        if ($this->home_discount_section['image'] instanceof TemporaryUploadedFile) {
            $this->home_discount_section['image'] = $this->upload($this->home_discount_section['image']) ?? "";
        }
        if ($this->home_register_vendor_section['image'] instanceof TemporaryUploadedFile) {
            $this->home_register_vendor_section['image'] = $this->upload($this->home_register_vendor_section['image']) ?? "";
        }
        if ($this->home_about_section['image'] instanceof TemporaryUploadedFile) {
            $this->home_about_section['image'] = $this->upload($this->home_about_section['image']) ?? "";
        }
        if ($this->home_about_section['background'] instanceof TemporaryUploadedFile) {
            $this->home_about_section['background'] = $this->upload($this->home_about_section['background']) ?? "";
        }
        $data =[
                [
                    "name" => 'home_fixed_image',
                    'value' => json_encode($this->home_fixed_image)
                ],
                [
                    "name" => 'home_discount_section',
                    'value' => json_encode($this->home_discount_section)
                ],
                [
                    "name" => 'home_vendor_section',
                    'value' => json_encode($this->home_vendor_section)
                ],
                [
                    "name" => 'home_food_section',
                    'value' => json_encode($this->home_food_section)
                ],
                [
                    "name" => 'home_about_section',
                    'value' => json_encode($this->home_about_section)
                ],
                [
                    "name" => 'home_steps_section',
                    'value' => json_encode($this->home_steps_section)
                ],
                [
                    "name" => 'home_register_vendor_section',
                    'value' => json_encode($this->home_register_vendor_section)
                ],
                [
                    "name" => 'home_features_section',
                    'value' => json_encode($this->home_features_section)
                ]
            ];
        $setting = app(SettingRepository::class)->storeOrUpdate(['items' => $data]);

        if (isset($setting['statusCode']) and $setting['statusCode'] == 400)
            $this->dispatch('notification', message: $setting['errors'][0]);
        elseif ($setting == null)
            $this->dispatch('notification', message: __('messages.error request'));

        session()->flash('notification', __('messages.success request'));
        $this->redirectRoute('admin.setting.home');
    }


    public function mount()
    {
        $settings = app(SettingRepository::class)->get(["names" => ["home_fixed_image", "home_discount_section", "home_vendor_section",
            "home_food_section", "home_about_section", "home_steps_section", "home_register_vendor_section", "home_features_section"]]);
        if ($settings == null)
            $this->dispatch('notification', message: __('messages.error response'));

        if ($settings) {
            $this->home_fixed_image = json_decode($settings['home_fixed_image'], true) ?? [["image" => "", "link", "title"], ["image" => "", "link", "title"], ["image" => "", "link", "title"], ["image" => "", "link", "title"]];
            $this->home_discount_section = json_decode($settings['home_discount_section'], true) ?? ["image" => "", "link" => "", "title" => "", "background-color" => " ", "btn_text" => "", "category_id" => 0];
            $this->home_vendor_section = json_decode($settings['home_vendor_section'], true) ?? ["link" => "", "title" => "", "btn_text" => "", "category_id" => 0];
            $this->home_food_section = json_decode($settings['home_food_section'], true) ?? ["link" => "", "title" => "", "btn_text" => "", "category_id" => 0];
            $this->home_about_section = json_decode($settings['home_about_section'], true) ?? ["background" => "", "image" => "", "title" => "", "text" => ""];
            $this->home_steps_section = json_decode($settings['home_steps_section'], true) ?? [["image" => "", "title" => ""], ["image" => "", "title" => ""], ["image" => "", "title" => ""], ["image" => "", "title" => ""]];
            $this->home_register_vendor_section = json_decode($settings['home_register_vendor_section'], true) ?? ["image" => "", "title" => "", "btn_title" => ""];
            $this->home_features_section = json_decode($settings['home_features_section'], true) ?? ["title" => "", "items" => [["image" => "", "title" => ""], ["image" => "", "title" => ""], ["image" => "", "title" => ""], ["image" => "", "title" => ""]]];
        }


    }


    public function render()
    {
        return view('livewire.dashboard.setting.home')->extends('layouts.app');
    }
}
