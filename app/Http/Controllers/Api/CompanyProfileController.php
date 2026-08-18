<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class CompanyProfileController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'name' => 'Catering Nusantara',
            'owner' => 'Ibu Eva Rudianti',
            'phone' => '08561155113',
            'whatsapp_link' => 'https://wa.me/628561155113',
            'address' => 'Jln. Kapten Yusuf gang Purnama, Bogor',
            'area' => 'Bogor, Depok, Jakarta, dan sekitarnya',
            'vision' => 'Menjadi penyedia jasa boga terpercaya yang menyajikan cita rasa autentik Nusantara secara higienis dan berkualitas.',
            'mission' => [
                'Menggunakan bahan baku segar harian tanpa pengawet.',
                'Menyajikan porsi memuaskan dengan harga terjangkau.',
                'Menjamin pengiriman tepat waktu untuk setiap momen istimewa.'
            ]
        ]);
    }
}