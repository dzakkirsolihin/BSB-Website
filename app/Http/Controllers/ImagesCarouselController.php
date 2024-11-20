<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagesCarouselController extends Controller
{
    public function index()
    {
        // Ganti dengan logika Anda untuk mengambil data gambar dari database atau direktori
        $images = [
            asset('Assets/CarouselImage/image1.jpg'),
            asset('Assets/CarouselImage/image2.jpg'),
            asset('Assets/CarouselImage/image3.jpg'),
            asset('Assets/CarouselImage/image4.jpg'),
            asset('Assets/CarouselImage/image5.jpg'),
            asset('Assets/CarouselImage/image6.jpg'),
        ];

        return view('profile.profile', ['images' => $images]);
    }
}
