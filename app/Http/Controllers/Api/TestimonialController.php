<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class TestimonialController extends Controller
{
    public function index(): JsonResponse
    {
        // Data ulasan dummy terstruktur untuk dikonsumsi React
        $testimonials = [
            [
                'id' => 1,
                'name' => 'Bpk. Hendra Kurnia',
                'event' => 'Acara Rapat Kantor',
                'comment' => 'Nasi box-nya lengkap, rasanya autentik khas rempah Nusantara dan ayam gorengnya empuk banget. Rekomendasi!',
                'rating' => 5,
            ],
            [
                'id' => 2,
                'name' => 'Ibu Rina Sastrowardoyo',
                'event' => 'Syukuran & Arisan Keluarga',
                'comment' => 'Pesan tumpeng dan prasmanan di sini tidak pernah mengecewakan. Tepat waktu dan semua tamu puji makanannya.',
                'rating' => 5,
            ],
            [
                'id' => 3,
                'name' => 'Dina & Farhan',
                'event' => 'Pernikahan',
                'comment' => 'Pelayanan Bu Eva ramah sekali. Makanan prasmanan pernikahan kami dipuji keluarga besar.',
                'rating' => 5,
            ]
        ];

        return response()->json($testimonials);
    }
}