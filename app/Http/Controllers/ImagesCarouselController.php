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
                asset('Assets/CarouselImage/image1.jpg'),
                asset('Assets/CarouselImage/image2.jpg'),
                asset('Assets/CarouselImage/image3.jpg'),
            ],
            'home' => [
                asset('Assets/CarouselImage/image4.jpg'),
                asset('Assets/CarouselImage/image5.jpg'),
                asset('Assets/CarouselImage/image6.jpg'),
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
