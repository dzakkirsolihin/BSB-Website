<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagesCarouselController extends Controller
{
    public function getCarouselImages($viewName)
    {
        // Define image sets for different views
        $imageSets = [
            'profile-yayasan' => [
                asset('Assets/CarouselImage/profile-yayasan/1.jpg'),
                asset('Assets/CarouselImage/profile-yayasan/2.jpg'),
                asset('Assets/CarouselImage/profile-yayasan/3.jpg'),
                asset('Assets/CarouselImage/profile-yayasan/4.jpg'),
                asset('Assets/CarouselImage/profile-yayasan/5.jpg'),
            ],
        ];

        // Get the images for the specified view, or return an empty array if not found
        $images = $imageSets[$viewName] ?? [];

        return view($viewName, ['images' => $images]);
    }

    public function profileYayasan(){
        return $this->getCarouselImages('company_profile.profile-yayasan');
    }

    public function home(){
        return $this->getCarouselImages('company_profile.home');
    }
}
