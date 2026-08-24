<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catering Nusantara</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #2D3748;
        }

        .bg-brand-orange {
            background-color: #F7A11A;
        }

        .text-brand-orange {
            color: #F7A11A;
        }

        .border-brand-orange {
            border-color: #F7A11A;
        }

        .hover\:bg-brand-orange-dark:hover {
            background-color: #E08F12;
        }
    </style>
</head>

<body class="bg-white antialiased selection:bg-[white] selection:text-white">

    @include('pengguna.sections.navbar')

    @include('pengguna.sections.beranda')

    @include('pengguna.sections.tentang_kami')

    @include('pengguna.sections.paket')

    @include('pengguna.sections.galeri')

    @include('pengguna.sections.testimoni')

    @include('pengguna.sections.user_guide')

    @include('pengguna.sections.footer')

</body>

</html>