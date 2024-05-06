<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Models\EducationItem;
use App\Models\ExperienceItem;
use App\Models\Footer;
use App\Models\Home;
use App\Models\Portfolio;
use App\Models\PortfolioItem;
use App\Models\ServiceItem;
use App\Models\Services;
use App\Models\Settings;
use App\Models\SkillItem;
use App\Models\Social;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $home = Home::first();
        $about = About::first();
        $services = Services::first();
        $portfolio = Portfolio::first();
        $contact = Contact::first();
        $socials = Social::get();
        $settings = Settings::first();
        $portfolioItems = PortfolioItem::get();
        $serviceItems = ServiceItem::get();
        $skillItems = SkillItem::get();
        $experienceItems = ExperienceItem::latest()->get();
        $educationItems = EducationItem::latest()->get();

        return view(
            'index',
            compact(
                'home',
                'about',
                'services',
                'portfolio',
                'contact',
                'socials',
                'settings',
                'portfolioItems',
                'serviceItems',
                'skillItems',
                'experienceItems',
                'educationItems'
            )
        );
    }
}
