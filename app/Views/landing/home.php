<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo esc($title) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }

        #pattern {
            background-image: url('data:image/svg+xml,%3Csvg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="%23059669" fill-opacity="0.1" fill-rule="evenodd"%3E%3Ccircle cx="20" cy="20" r="3"/%3E%3C/g%3E%3C/svg%3E');
        }
    </style>
</head>
<body class="font-sans">
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 glass-card">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <a href="#" class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center">
                        <!-- <i class="ph ph-plant text-2xl text-green-600"></i> -->
                        <img src="<?php echo base_url('img/logo.png') ?>" />
                    </div>
                    <div class="flex items-center gap-1">
                        <span class="text-2xl font-bold text-gray-900">Ngudi</span>
                        <span class="text-2xl font-bold text-green-600">Kamulyan</span>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center gap-1">
                    <a href="#profile" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-xl transition-all duration-200">Profil</a>
                    <a href="#visi-misi" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-xl transition-all duration-200">Visi & Misi</a>
                    <a href="#calendar" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-xl transition-all duration-200">Kalendar</a>
                    <a href="#gallery" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-xl transition-all duration-200">Galeri</a>
                    <a href="#contact" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-xl transition-all duration-200">Hubungi Kami</a>
                    <div class="w-px h-6 bg-gray-200 mx-2"></div>
                    <?php if(session()->get('isLoggedIn')): ?>
                        <a href="/dashboard" class="px-4 py-1.5 text-sm font-semibold text-white bg-green-600 rounded-xl hover:bg-green-500 shadow-sm hover:shadow transition-all duration-200 flex items-center gap-2">
                            <i class="ph ph-gauge text-sm"></i>
                            Dashboard
                        </a>
                    <?php else: ?>
                        <a href="/auth/login" class="px-4 py-1.5 text-sm font-semibold text-white bg-green-600 rounded-xl hover:bg-green-500 shadow-sm hover:shadow transition-all duration-200 flex items-center gap-2">
                            <i class="ph ph-sign-in text-sm"></i>
                            Masuk
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Mobile Menu Button -->
                <button type="button" class="md:hidden w-10 h-10 flex items-center justify-center text-gray-700 hover:bg-gray-100 rounded-xl transition-colors" onclick="toggleMobileMenu()">
                    <i class="ph ph-list text-2xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white/80 backdrop-blur-lg border-t border-gray-100">
            <div class="container mx-auto px-4 py-4 space-y-2">
                <a href="#profile" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-xl transition-all duration-200">
                    <i class="ph ph-user text-lg"></i>
                    <span class="font-medium">Profil</span>
                </a>
                <a href="#visi-misi" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-xl transition-all duration-200">
                    <i class="ph ph-target text-lg"></i>
                    <span class="font-medium">Visi & Misi</span>
                </a>
                <a href="#calendar" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-xl transition-all duration-200">
                    <i class="ph ph-calendar text-lg"></i>
                    <span class="font-medium">Kalendar</span>
                </a>
                <a href="#gallery" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-xl transition-all duration-200">
                    <i class="ph ph-image text-lg"></i>
                    <span class="font-medium">Galeri</span>
                </a>
                <a href="#contact" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-xl transition-all duration-200">
                    <i class="ph ph-phone text-lg"></i>
                    <span class="font-medium">Hubungi Kami</span>
                </a>
                <div class="pt-2 mt-2 border-t border-gray-100">
                    <?php if(session()->get('isLoggedIn')): ?>
                        <a href="/dashboard" class="flex items-center gap-3 px-4 py-1 text-green-600 hover:bg-green-50 rounded-xl transition-all duration-200">
                            <i class="ph ph-gauge text-lg"></i>
                            <span class="font-semibold">Dashboard</span>
                        </a>
                    <?php else: ?>
                        <a href="/auth/login" class="flex items-center gap-3 px-4 py-1 text-green-600 hover:bg-green-50 rounded-xl transition-all duration-200">
                            <i class="ph ph-sign-in text-lg"></i>
                            <span class="font-semibold">Masuk</span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="relative min-h-screen flex items-center bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 pt-20 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 -z-10 opacity-20">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="%23059669" fill-opacity="0.1" fill-rule="evenodd"%3E%3Ccircle cx="20" cy="20" r="3"/%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>

        <!-- Decorative Elements -->
        <div class="absolute top-20 -left-20 w-80 h-80 bg-green-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
        <div class="absolute bottom-20 -right-20 w-80 h-80 bg-emerald-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-20 left-40 w-80 h-80 bg-teal-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"></div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="flex flex-col items-center justify-center text-center max-w-4xl mx-auto" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/50 backdrop-blur-sm rounded-2xl text-sm font-medium text-green-800 mb-8 shadow-sm hover:shadow transition-all duration-300">
                    <i class="ph ph-plant text-lg"></i>
                    <span>Kelompok Tani Ngudi Kamulyan</span>
                </div>

                <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-gray-900 mb-8 tracking-tight">
                    Membangun <span class="text-green-600">Pertanian</span><br>
                    <span class="relative inline-block">
                        <span class="relative z-10">Berkelanjutan</span>
                        <div class="absolute bottom-2 -z-10 left-0 right-0 h-3 bg-green-200/50 transform -skew-x-12"></div>
                    </span>
                </h1>

                <p class="text-xl text-gray-600 mb-12 max-w-2xl leading-relaxed">
                    Bersama menciptakan masa depan pertanian yang lebih baik
                    untuk kesejahteraan petani Indonesia.
                </p>
            </div>
        </div>

        <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 animate-bounce">
            <i class="ph ph-arrow-down text-2xl text-green-600"></i>
        </div>
    </header>

    <!-- Profile Section -->
    <section id="profile" class="py-24 bg-gradient-to-br from-white to-green-50/30 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 -z-10 opacity-[0.15]">
            <div class="absolute inset-0" id="pattern"></div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-green-50 rounded-2xl text-sm font-medium text-green-800 mb-4 shadow-sm hover:shadow transition-all duration-300">
                    <i class="ph ph-leaf text-lg"></i>
                    <span>TENTANG KAMI</span>
                </div>
                <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-6 tracking-tight">
                    <span class="relative inline-block">
                        <span class="relative z-10">Membangun Masa Depan</span>
                        <!-- <div class="absolute bottom-2 -z-10 left-0 right-0 h-3 bg-green-200/50 transform -skew-x-12"></div> -->
                    </span>
                    <br>Pertanian Indonesia
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Kami berkomitmen untuk mengembangkan pertanian berkelanjutan dengan menerapkan teknologi modern dan praktik ramah lingkungan.
                </p>
            </div>

            <!-- Profile Content -->
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <!-- Image Section -->
                <div class="relative order-2 md:order-1" data-aos="fade-right">
                    <!-- Decorative Elements -->
                    <div class="absolute -top-6 -right-6 w-32 h-32 bg-green-100 rounded-full mix-blend-multiply filter blur-lg opacity-70 animate-blob"></div>
                    <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-emerald-100 rounded-full mix-blend-multiply filter blur-lg opacity-70 animate-blob animation-delay-2000"></div>
                    
                    <!-- Main Image -->
                    <div class="relative">
                        <div class="relative z-10 rounded-2xl overflow-hidden shadow-xl bg-white p-2">
                            <div class="aspect-w-4 aspect-h-3 rounded-xl overflow-hidden">
                                <img src="<?php echo base_url('img/profile.jpg') ?>" alt="Profil Kelompok Tani" 
                                    class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-500">
                            </div>
                        </div>
                        <!-- Pattern Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-tr from-green-600/20 to-transparent mix-blend-overlay rounded-2xl"></div>
                    </div>
                </div>

                <!-- Features -->
                <div class="space-y-6 order-1 md:order-2" data-aos="fade-left">
                    <!-- Feature 1 -->
                    <div class="group glass-card p-6 rounded-2xl hover:shadow-lg transition-all duration-300 border border-white/20">
                        <div class="flex items-start gap-4">
                            <div class="bg-green-50 p-3 rounded-xl group-hover:scale-110 transition-transform duration-300">
                                <i class="ph ph-leaf text-2xl text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Pertanian Modern</h3>
                                <p class="text-gray-600 leading-relaxed">Mengembangkan pertanian dengan teknologi modern dan praktik ramah lingkungan untuk hasil yang optimal dan berkelanjutan.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="group glass-card p-6 rounded-2xl hover:shadow-lg transition-all duration-300 border border-white/20">
                        <div class="flex items-start gap-4">
                            <div class="bg-green-50 p-3 rounded-xl group-hover:scale-110 transition-transform duration-300">
                                <i class="ph ph-users-three text-2xl text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Pemberdayaan Komunitas</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Aktif dalam berbagai kegiatan pemberdayaan masyarakat dan edukasi pertanian untuk kesejahteraan bersama.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="group glass-card p-6 rounded-2xl hover:shadow-lg transition-all duration-300 border border-white/20">
                        <div class="flex items-start gap-4">
                            <div class="bg-green-50 p-3 rounded-xl group-hover:scale-110 transition-transform duration-300">
                                <i class="ph ph-tree text-2xl text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Pertanian Berkelanjutan</h3>
                                <p class="text-gray-600 leading-relaxed">Menerapkan praktik pertanian yang ramah lingkungan dan berkelanjutan untuk masa depan yang lebih baik.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>      

    <!-- Visi & Misi Section -->
    <section class="bg-gradient-to-b from-green-50 to-white py-24" id="visi-misi">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="inline-flex items-center px-4 py-2 bg-green-50 rounded-full text-sm text-green-600 font-medium mb-4">
                    <span>VISI & MISI</span>
                </div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Komitmen Kami untuk<br>Masa Depan Pertanian</h2>
                <p class="text-lg text-gray-600">Bersama membangun pertanian berkelanjutan dan kesejahteraan masyarakat pedesaan</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 max-w-6xl mx-auto">
                <!-- Visi -->
                <div class="group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300">
                    <div class="flex items-start gap-6">
                        <div class="bg-blue-50 p-4 rounded-xl group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">Visi</h3>
                            <p class="text-gray-600 leading-relaxed">
                            Menjadi kelompok tani yang mandiri, berdaya saing, dan berkelanjutan dalam meningkatkan kesejahteraan petani
                            melalui pengelolaan pertanian yang inovatif dan ramah lingkungan.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Misi -->
                <div class="group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300">
                    <div class="flex items-start gap-6">
                        <div class="bg-green-50 p-4 rounded-xl group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">Misi</h3>
                            <ul class="space-y-3">
                                <li class="flex items-center gap-3 text-gray-600">
                                    <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Mengembangkan pertanian ramah lingkungan</span>
                                </li>
                                <li class="flex items-center gap-3 text-gray-600">
                                    <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Meningkatkan kesejahteraan anggota</span>
                                </li>
                                <li class="flex items-center gap-3 text-gray-600">
                                    <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Membangun kerjasama dengan berbagai pihak</span>
                                </li>
                                <li class="flex items-center gap-3 text-gray-600">
                                    <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Menciptakan wadah untuk saling berbagi informasi dan pengalaman di antara anggota kelompok tani
                                        guna meningkatkan solidaritas dan kolaborasi</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Calendar Section -->
    <section id="calendar" class="py-24 bg-white" data-aos="fade-up">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="inline-flex items-center px-4 py-2 bg-green-50 rounded-full text-sm text-green-800 font-medium mb-4">
                    <span>KALENDER KEGIATAN</span>
                </div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Jadwal Kegiatan<br>Kelompok Tani</h2>
                <p class="text-lg text-gray-600">Berbagai kegiatan rutin dan program pengembangan untuk kemajuan pertanian</p>
            </div>

            <!-- Timeline Container -->
            <div class="max-w-4xl mx-auto relative">
                <!-- Timeline Line -->
                <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-0.5 bg-gray-200"></div>

                <!-- Timeline Items -->
                <div class="space-y-12">
                    <!-- Item 1 -->
                    <div class="relative" data-aos="fade-up">
                        <div class="flex items-center justify-center mb-6">
                            <div class="bg-green-500 text-white text-sm font-semibold px-4 py-2 rounded-full z-10">
                                Maret 2025
                            </div>
                        </div>
                        <div class="flex items-start justify-between">
                            <div class="w-5/12"></div>
                            <div class="absolute left-1/2 transform -translate-x-1/2">
                                <div class="w-4 h-4 bg-green-500 rounded-full border-4 border-white shadow"></div>
                            </div>
                            <div class="w-5/12 bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Pelatihan Pertanian Organik</h3>
                                <p class="text-gray-600 mb-4">Workshop teknik pertanian organik dan pembuatan pupuk alami untuk meningkatkan hasil panen.</p>
                                <div class="flex items-center gap-3 text-sm text-gray-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span>Balai Desa Sukamaju</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="relative" data-aos="fade-up" data-aos-delay="100">
                        <div class="flex items-center justify-center mb-6">
                            <div class="bg-green-500 text-white text-sm font-semibold px-4 py-2 rounded-full z-10">
                                April 2025
                            </div>
                        </div>
                        <div class="flex items-start justify-between">
                            <div class="w-5/12 bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Panen Raya Bersama</h3>
                                <p class="text-gray-600 mb-4">Kegiatan panen bersama dan evaluasi hasil pertanian musim ini bersama seluruh anggota.</p>
                                <div class="flex items-center gap-3 text-sm text-gray-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span>Lahan Pertanian Bersama</span>
                                </div>
                            </div>
                            <div class="absolute left-1/2 transform -translate-x-1/2">
                                <div class="w-4 h-4 bg-green-500 rounded-full border-4 border-white shadow"></div>
                            </div>
                            <div class="w-5/12"></div>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="relative" data-aos="fade-up" data-aos-delay="200">
                        <div class="flex items-center justify-center mb-6">
                            <div class="bg-green-500 text-white text-sm font-semibold px-4 py-2 rounded-full z-10">
                                Mei 2025
                            </div>
                        </div>
                        <div class="flex items-start justify-between">
                            <div class="w-5/12"></div>
                            <div class="absolute left-1/2 transform -translate-x-1/2">
                                <div class="w-4 h-4 bg-green-500 rounded-full border-4 border-white shadow"></div>
                            </div>
                            <div class="w-5/12 bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Studi Banding</h3>
                                <p class="text-gray-600 mb-4">Kunjungan ke kelompok tani lain untuk berbagi pengalaman dan pembelajaran bersama.</p>
                                <div class="flex items-center gap-3 text-sm text-gray-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span>Kabupaten Cilacap</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="py-24 bg-gradient-to-b from-gray-50 to-white overflow-hidden" data-aos="fade-up">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="inline-flex items-center px-4 py-2 bg-green-50 rounded-full text-sm text-green-800 font-medium mb-4">
                    <span>GALERI KEGIATAN</span>
                </div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Dokumentasi<br>Kegiatan Kami</h2>
                <p class="text-lg text-gray-600">Momen-momen berharga dalam perjalanan kami membangun pertanian yang lebih baik</p>
            </div>

            <!-- Swiper Gallery -->
            <div class="swiper gallerySwiper max-w-5xl mx-auto">
                <div class="swiper-wrapper pb-8">
                    <?php foreach ($gallery as $item): ?>
                    <div class="swiper-slide p-2">
                        <div class="relative group rounded-2xl overflow-hidden bg-white shadow-lg hover:shadow-xl transition-all duration-300">
                            <img src="<?php echo base_url('uploads/gallery/'. $item['file_name']) ?>" alt="<?php echo esc($item['title']) ?>" 
                                class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/75 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-4 text-white transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                                <h3 class="text-lg font-bold mb-1"><?php echo esc($item['title']) ?></h3>
                                <p class="text-xs text-gray-200"><?php echo esc($item['description']) ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Navigation Buttons -->
                <div class="swiper-button-next after:!text-sm !text-gray-800 !right-0"></div>
                <div class="swiper-button-prev after:!text-sm !text-gray-800 !left-0"></div>
                
                <!-- Pagination -->
                <div class="swiper-pagination !-bottom-2"></div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-24 bg-gradient-to-b from-gray-50 to-white" data-aos="fade-up">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="inline-flex items-center px-4 py-2 bg-green-50 rounded-full text-sm text-green-600 font-medium mb-4">
                    <span>HUBUNGI KAMI</span>
                </div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Kami Siap<br>Membantu Anda</h2>
                <p class="text-lg text-gray-600">Jangan ragu untuk menghubungi kami untuk informasi lebih lanjut</p>
            </div>

            <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-6">
                <!-- Contact Information -->
                <div class="space-y-8">
                    <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Informasi Kontak</h3>
                        
                        <!-- Address -->
                        <div class="flex items-start gap-4 mb-6">
                            <div class="bg-green-50 p-3 rounded-xl">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-1">Alamat</h4>
                                <p class="text-gray-600">Dk. Krenceng 2 Rt 07/02 <br>Desa Pandansari, Kec. Sruweng<br>Kab. Kebumen, 54362</p>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-start gap-4 mb-6">
                            <div class="bg-blue-50 p-3 rounded-xl">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-1">Telepon</h4>
                                <p class="text-gray-600">+62 81328439775<br>+62 87837766707</p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start gap-4 mb-6">
                            <div class="bg-yellow-50 p-3 rounded-xl">
                                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-1">Email</h4>
                                <p class="text-gray-600">NgudiKamulyan@gmail.com<br>PoktanKamulyan@gmail.com</p>
                            </div>
                        </div>

                        <!-- Social Media -->
                        <div class="flex items-start gap-4">
                            <div class="bg-purple-50 p-3 rounded-xl">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-1">Media Sosial</h4>
                                <div class="flex gap-4">
                                    <a href="#" class="text-gray-600 hover:text-gray-900 transition-colors">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                        </svg>
                                    </a>
                                    <a href="#" class="text-gray-600 hover:text-gray-900 transition-colors">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                    </svg>
                                </a>
                                <a href="#" class="text-gray-600 hover:text-gray-900 transition-colors">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Kirim Pesan</h3>
            <div class="space-y-6">
                <div>
                    <label for="name" class="block text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" id="name" name="name" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="email" class="block text-gray-700 mb-2">Email</label>
                    <input type="email" id="email" name="email" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
                </div>
                <!-- <div>
                    <label for="phone" class="block text-gray-700 mb-2">No. Telepon</label>
                    <input type="tel" id="phone" name="phone" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
                </div> -->
                <!-- <div>
                    <label for="subject" class="block text-gray-700 mb-2">Subjek</label>
                    <input type="text" id="subject" name="subject" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
                </div> -->
                <div>
                    <label for="message" class="block text-gray-700 mb-2">Pesan</label>
                    <textarea id="message" name="message" rows="4" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500"></textarea>
                </div>
                <button type="submit" id="btn-send"
                    class="w-full px-6 py-3 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-300 transition-colors duration-200 flex items-center justify-center gap-2">
                    <span>Kirim Pesan</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        </div>
    
    </div>
    </section>

     <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-12 md:pt-16 pb-6 md:pb-8">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12 mb-8 md:mb-12">
                <!-- About Section -->
                <div class="space-y-4 mb-6 sm:mb-0">
                    <h3 class="text-xl font-bold text-green-500 mb-4">Kelompok Tani Ngudi Kamulyan</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Kami adalah komunitas petani yang berkomitmen untuk memajukan pertanian modern dan berkelanjutan melalui inovasi dan kolaborasi.
                    </p>
                    <div class="flex space-x-4 mt-6">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-xl font-bold text-green-500 mb-4">Menu Utama</h3>
                    <ul class="space-y-2.5 md:space-y-2">
                        <li><a href="#home" class="text-gray-400 hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="#profile" class="text-gray-400 hover:text-white transition-colors">Profil</a></li>
                        <li><a href="#visi" class="text-gray-400 hover:text-white transition-colors">Visi & Misi</a></li>
                        <li><a href="#gallery" class="text-gray-400 hover:text-white transition-colors">Galeri</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white transition-colors">Kontak</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-xl font-bold text-green-500 mb-4">Kontak</h3>
                    <ul class="space-y-4 md:space-y-3">
                        <li class="flex items-center gap-3">
                            <svg class="w-6 h-6 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-gray-400 text-sm sm:text-base">Ds. Pandansari rt 07/02, Kec. Sruweng, Kab. Kebumen, Prov. Jawa tengah</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-6 h-6 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-gray-400 text-sm sm:text-base">PoktanKamulyan@gmail.com</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-6 h-6 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span class="text-gray-400 text-sm sm:text-base">+62 81328439775</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="pt-6 md:pt-8 mt-6 md:mt-8 border-t border-gray-800">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                    <p class="text-gray-400 text-sm">&copy; 2024 Kelompok Tani Ngudi Kamulyan. All rights reserved.</p>
                    <div class="flex items-center gap-4 text-sm mt-4 sm:mt-0">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a>
                        <span class="text-gray-600">|</span>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">Terms of Service</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        }

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 64, // Adjust for navbar height
                        behavior: 'smooth'
                    });
                    // Close mobile menu if open
                    const mobileMenu = document.getElementById('mobile-menu');
                    if (!mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                    }
                }
            });
        });

        // Change navbar background on scroll
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.classList.add('shadow');
            } else {
                nav.classList.remove('shadow');
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const btnSend = document.querySelector('#btn-send');
            btnSend.addEventListener('click', function() {
                const name = document.querySelector('#name').value;
                const email = document.querySelector('#email').value;
                // const phone = document.querySelector('#phone').value;
                // const subject = document.querySelector('#subject').value;
                const message = document.querySelector('#message').value;
                //buka newtab untuk mengirim pesan whatsapp
                const waMessage = `Halo admin Poktan%0A%0A` +
                  `nama saya *${name}*%0A` +
                  `email saya *${email}*%0A%0A` +
                  `saya ingin menyampaikan pesan bahwa :%0A${message}`;
                window.open(`https://wa.me/62895384046096?text=${waMessage}`, '_blank');
            });
        });
    </script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
    <script>
        // Initialize Swiper
        const gallerySwiper = new Swiper('.gallerySwiper', {
            slidesPerView: 1,
            spaceBetween: 16,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 24,
                }
            },
        });

        // Mobile menu toggle
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        }

        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
        });
    </script>
</body>
</html>
