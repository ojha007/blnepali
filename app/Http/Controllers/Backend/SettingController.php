<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Backend\Http\Responses\Response;

class SettingController extends Controller
{
    protected string $routePrefix = 'settings';

    protected string $viewPath = 'backend::setting.';

    public function index()
    {

        $site_settings = $this->getSettingAttributes();

        return new Response($this->viewPath.'index', ['site_settings' => $site_settings]);
    }

    public function getSettingAttributes()
    {
        return [
            'general_setting' => [
                'website_name' => 'text',
                'website_subtitle' => 'text',
                'slogan' => 'text',
                'website_url' => 'text',
                'website_email' => 'email',
                'contact_number' => 'tel',
                'opening_hours' => 'time',
                'address' => 'text',
                'default_logo' => 'file',
                'description' => 'textarea',
                'map' => 'textarea',
            ],
            'social_media_setting' => [
                'facebook' => 'text',
                'twitter' => 'text',
                'instagram' => 'text',
                'youtube' => 'text',
                'skype' => 'text',
                'whatsapp' => 'text',
                'google' => 'text',
                'linked in' => 'text',
                'fb_app_id' => 'number',
                'fb_pages' => 'number',
                'fb_admins' => 'number',
            ],
            'meta_setting' => [
                'meta_title' => 'text',
                'meta_keywords' => 'textarea',
                'meta_description' => 'textarea',
            ],
            'organization_setting' => [
                'vat_number' => 'number',
                'registration_number' => 'text',
            ],

        ];
    }

    public function store(Request $request)
    {
        $attributes = $request->all();
        foreach ($attributes as $name => $value) {
            if ($value) {
                \Setting::set($name, $value);
            }
        }
        \Setting::save();

        return redirect()->back()
            ->with('success', 'Setting Created successfully');

    }
}
