<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bro.net | Bintang Respon Optimal - Koneksi Stabil, Produktivitas Maksimal</title>
    <link rel="icon" type="image/png" href="/brologo.png">
    <meta name="description" content="Layanan internet WiFi Bro.net dari Bintang Respon Optimal. Koneksi stabil, unlimited, dan profesional. Harga mulai dari 150rb/bulan.">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&family=Outfit:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #006D77;
            --primary-light: #83C5BE;
            --secondary: #EDF6F9;
            --accent: #FFDDD2;
            --dark: #1F2937;
            --white: #FFFFFF;
            --gradient: linear-gradient(135deg, #006D77 0%, #0099A8 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--secondary);
            color: var(--dark);
            line-height: 1.6;
            overflow-x: hidden;
        }

        h1, h2, h3 {
            font-family: 'Outfit', sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Navbar */
        nav {
            padding: 15px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        nav.scrolled {
            padding: 10px 0;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }

        .nav-links {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 600;
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--dark);
            cursor: pointer;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo {
            height: 60px;
            transition: transform 0.3s ease;
        }

        .logo-text {
            font-family: 'Outfit', serif;
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--dark);
            letter-spacing: 2px;
            text-transform: uppercase;
            line-height: 1;
        }

        .logo-text span {
            color: var(--primary);
        }

        .logo:hover {
            transform: scale(1.05);
        }

        /* Hero Section */
        header {
            padding: 160px 0 100px;
            background: radial-gradient(circle at top right, var(--primary-light), transparent),
                        radial-gradient(circle at bottom left, var(--accent), transparent);
            min-height: 90vh;
            display: flex;
            align-items: center;
            position: relative;
        }

        header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: linear-gradient(to top, var(--secondary), transparent);
        }

        .hero-flex {
            display: flex;
            align-items: center;
            gap: 50px;
            flex-wrap: wrap;
        }

        .hero-content {
            flex: 1;
            min-width: 300px;
        }

        .hero-tagline {
            display: inline-block;
            background-color: var(--white);
            color: var(--primary);
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        .hero-content h1 {
            font-size: clamp(2.5rem, 5vw, 4rem);
            line-height: 1.1;
            margin-bottom: 25px;
            color: var(--primary);
        }

        .hero-content p {
            font-size: 1.2rem;
            color: #4B5563;
            margin-bottom: 40px;
            max-width: 500px;
        }

        .hero-image {
            flex: 1;
            min-width: 300px;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 20px 20px 60px rgba(0,0,0,0.1);
            position: relative;
        }

        .hero-image img {
            width: 100%;
            display: block;
            transition: transform 0.5s ease;
        }

        .hero-image:hover img {
            transform: scale(1.05);
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 16px 36px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            font-family: 'Outfit', sans-serif;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-primary {
            background: var(--gradient);
            color: var(--white);
            box-shadow: 0 10px 25px rgba(0, 109, 119, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 109, 119, 0.4);
        }

        /* Features Section */
        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: var(--primary);
        }

        .features {
            padding: 100px 0;
            background-color: var(--white);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .feature-card {
            padding: 40px;
            background: var(--secondary);
            border-radius: 24px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            background: var(--white);
            box-shadow: 0 20px 40px rgba(0,0,0,0.05);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient);
            color: var(--white);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 25px;
        }

        /* Package Section */
        .pricing {
            padding: 100px 0;
            background-color: var(--secondary);
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 40px;
            justify-content: center;
        }

        .pricing-card {
            background: var(--white);
            padding: 40px;
            border-radius: 32px;
            box-shadow: 0 30px 60px rgba(0,0,0,0.08);
            position: relative;
            overflow: hidden;
            border: 2px solid var(--primary-light);
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease;
        }

        .pricing-card:hover {
            transform: translateY(-10px);
        }

        .pricing-card.featured {
            border-color: var(--primary);
            box-shadow: 0 40px 80px rgba(0, 109, 119, 0.15);
        }

        .pricing-card::before {
            content: 'SILVER';
            position: absolute;
            top: 20px;
            right: -30px;
            background: var(--primary);
            color: var(--white);
            padding: 5px 40px;
            transform: rotate(45deg);
            font-size: 0.8rem;
            font-weight: bold;
            display: none; /* Can be enabled for featured packages */
        }

        .pkg-badge {
            background: var(--primary);
            color: var(--white);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
            margin-bottom: 15px;
            display: inline-block;
        }

        .pricing-card h3 {
            font-size: 2.2rem;
            margin-bottom: 20px;
            color: var(--primary);
        }

        .price {
            font-size: 4rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 15px;
            font-family: 'Outfit', sans-serif;
        }

        .price span {
            font-size: 1rem;
            color: #6B7280;
            font-weight: 400;
        }

        .pricing-card ul {
            list-style: none;
            margin: 30px 0;
        }

        .pricing-card li {
            padding: 12px 0;
            display: flex;
            align-items: center;
            gap: 15px;
            font-weight: 500;
        }

        .pricing-card li i {
            color: #10B981;
            font-size: 1.2rem;
        }

        .pricing-note {
            background-color: var(--accent);
            padding: 15px;
            border-radius: 12px;
            font-size: 0.9rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 25px;
        }

        /* Footer */
        footer {
            background: var(--dark);
            color: var(--white);
            padding: 80px 0 40px;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 40px;
            padding-bottom: 40px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .footer-info h3 {
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .footer-addr {
            margin-top: 15px;
            font-size: 0.95rem;
            color: #9CA3AF;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .contact-pills {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        .contact-pill {
            color: var(--white);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255,255,255,0.05);
            padding: 10px 20px;
            border-radius: 50px;
            transition: background 0.3s ease;
        }

        .contact-pill:hover {
            background: var(--primary);
        }

        .copyright {
            text-align: center;
            margin-top: 40px;
            font-size: 0.9rem;
            color: #9CA3AF;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .nav-links {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background: white;
                flex-direction: column;
                padding: 40px;
                gap: 20px;
                box-shadow: 0 20px 40px rgba(0,0,0,0.1);
                border-bottom: 2px solid var(--primary-light);
            }

            .nav-links.active {
                display: flex;
            }

            .menu-toggle {
                display: block;
            }

            .hero-flex {
                flex-direction: column-reverse;
                text-align: center;
            }

            .hero-content p {
                margin: 0 auto 40px;
            }
        }

        @media (max-width: 768px) {
            header { padding: 120px 0 60px; }
            .hero-content h1 { font-size: 2.5rem; }
            .footer-content { flex-direction: column; text-align: center; }
            .contact-pills { justify-content: center; flex-wrap: wrap; }
            .map-container { height: 350px; }
            .section-title h2 { font-size: 2rem; }
        }

        @media (max-width: 480px) {
            .logo { height: 45px; }
            .hero-content h1 { font-size: 2rem; }
            .map-container { height: 250px; }
            .pricing-card { padding: 30px 20px; }
            .price { font-size: 3rem; }
        }

        /* Coverage Area Section */
        .coverage {
            padding: 100px 0;
            background-color: var(--white);
        }

        .area-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            margin-top: 40px;
        }

        .area-card {
            padding: 30px 20px;
            background: var(--secondary);
            border-radius: 20px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }

        .area-card:hover {
            transform: scale(1.05);
            background: var(--white);
            border-color: var(--primary-light);
            box-shadow: 0 15px 30px rgba(0,0,0,0.05);
        }

        .area-card i {
            font-size: 1.5rem;
            color: var(--primary);
            margin-bottom: 15px;
            display: block;
        }

        .map-container {
            margin-top: 50px;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0,0,0,0.1);
            position: relative;
            background: var(--secondary);
            max-width: 1100px;
            height: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .map-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.8s ease;
        }

        .map-container:hover img {
            transform: scale(1.05);
        }

        .map-overlay {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.9);
            padding: 15px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            backdrop-filter: blur(5px);
        }

        .map-overlay img {
            height: 30px;
            width: auto;
        }

        /* Testimonials Section */
        .testimonials {
            padding: 100px 0;
            background-color: var(--secondary);
        }

        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .testimonial-card {
            background: var(--white);
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            position: relative;
            transition: transform 0.3s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-10px);
        }

        .testimonial-stars {
            color: #FBBF24;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        .testimonial-text {
            font-style: italic;
            color: #4B5563;
            margin-bottom: 25px;
            font-size: 1.1rem;
        }

        .testimonial-user {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            background: var(--primary-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-weight: 700;
        }

        .user-info h4 {
            font-size: 1rem;
            color: var(--dark);
            margin: 0;
        }

        .user-info span {
            font-size: 0.85rem;
            color: #9CA3AF;
        }

        /* Social Links */
        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 25px;
        }

        .social-link {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1.2rem;
        }

        .social-link:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }
    </style>
</head>
<body>

    <nav id="mainNav">
        <div class="container" style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
            <a href="/" class="logo-container" style="text-decoration: none;">
                <img src="/Bronet.png" alt="Bintang Respon Optimal" class="logo">
            </a>
            <div class="nav-links" id="navLinks">
                <a href="#">Beranda</a>
                <a href="#fitur">Fitur</a>
                <a href="#paket">Paket</a>
                <a href="#ulasan">Ulasan</a>
                <a href="#jangkauan">Area</a>
                <a href="https://wa.me/6288223980063" class="btn btn-primary" style="padding: 10px 20px; font-size: 0.8rem;">Hubungi Kami</a>
            </div>
            <button class="menu-toggle" id="menuToggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <header>
        <div class="container">
            <div class="hero-flex">
                <div class="hero-content">
                    <span class="hero-tagline">WiFi Pilihan Keluarga & Bisnis</span>
                    <h1>Koneksi Stabil,<br>Produktivitas Maksimal.</h1>
                    <p>Hadirkan pengalaman internet super cepat dan tanpa hambatan dengan Bro.net. Stabil di segala kondisi untuk dukung aktivitas digital kamu.</p>
                    <a href="https://wa.me/6288223980063?text=Halo%20Bro.net,%20saya%20tertarik%20untuk%20berlangganan%20paket%20WiFi" class="btn btn-primary" target="_blank">
                        Langganan Sekarang <i class="fab fa-whatsapp ml-2"></i>
                    </a>
                </div>
                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&q=80&w=1200" alt="High speed internet router">
                </div>
            </div>
        </div>
    </header>

    <section class="features" id="fitur">
        <div class="container">
            <div class="section-title">
                <h2>Mengapa Bro.net?</h2>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <h3>Kabel Optic</h3>
                    <p>Teknologi fiber optic terbaru menjamin transmisi data yang lebih cepat dan stabil.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-infinity"></i>
                    </div>
                    <h3>Unlimited</h3>
                    <p>Bebas kuota! Nikmati internetan sepuasnya tanpa khawatir FUP atau lemot di akhir bulan.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-wifi"></i>
                    </div>
                    <h3>Free Router</h3>
                    <p>Pemasangan sudah termasuk peminjaman perangkat router WiFi berkualitas tinggi.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="pricing" id="paket">
        <div class="container">
            <div class="section-title">
                <h2>Paket Berlangganan</h2>
            </div>
            <div class="pricing-grid">
                <!-- Bronze Package -->
                <div class="pricing-card glass">
                    <span class="pkg-badge">Bronze Package</span>
                    <h3>Bro.net Speed</h3>
                    <div class="price">20 <span>MBPS</span></div>
                    <div class="pricing-note">
                        <i class="fas fa-info-circle"></i> Harga termasuk pajak & biaya lainnya
                    </div>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> Kecepatan hingga 20 Mbps</li>
                        <li><i class="fas fa-check-circle"></i> Kuota Tanpa Batas (Unlimited)</li>
                        <li><i class="fas fa-check-circle"></i> Dukungan Teknis 24/7</li>
                        <li><i class="fas fa-check-circle"></i> Biaya Instalasi Rp 100.000</li>
                    </ul>
                    <div class="price" style="font-size: 2.5rem; margin-top: auto;">150k <span>/ Bulan</span></div>
                    <a href="https://wa.me/6288223980063?text=Halo%20Bro.net,%20saya%20ingin%20pasang%20Paket%20Bronze%2020Mbps" class="btn btn-primary" style="width: 100%; text-align: center; margin-top: 20px;" target="_blank">
                        Pesan Sekarang
                    </a>
                </div>

                <!-- Silver Package -->
                <div class="pricing-card glass featured">
                    <span class="pkg-badge" style="background: var(--primary);">Silver Package</span>
                    <h3>Bro.net Fast</h3>
                    <div class="price">25 <span>MBPS</span></div>
                    <div class="pricing-note">
                        <i class="fas fa-star" style="color: #FBBF24;"></i> Paket Paling Populer
                    </div>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> Kecepatan hingga 25 Mbps</li>
                        <li><i class="fas fa-check-circle"></i> Kuota Tanpa Batas (Unlimited)</li>
                        <li><i class="fas fa-check-circle"></i> Prioritas Dukungan Teknis</li>
                        <li><i class="fas fa-check-circle"></i> Biaya Instalasi Rp 100.000</li>
                    </ul>
                    <div class="price" style="font-size: 2.5rem; margin-top: auto;">175k <span>/ Bulan</span></div>
                    <a href="https://wa.me/6288223980063?text=Halo%20Bro.net,%20saya%20ingin%20pasang%20Paket%20Silver%2025Mbps" class="btn btn-primary" style="width: 100%; text-align: center; margin-top: 20px;" target="_blank">
                        Pesan Sekarang
                    </a>
                </div>

                <!-- Gold Package -->
                <div class="pricing-card glass">
                    <span class="pkg-badge" style="background: #D97706;">Gold Package</span>
                    <h3>Bro.net Ultra</h3>
                    <div class="price">50 <span>MBPS</span></div>
                    <div class="pricing-note">
                        <i class="fas fa-rocket"></i> Performa Maksimal
                    </div>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> Kecepatan hingga 50 Mbps</li>
                        <li><i class="fas fa-check-circle"></i> Kuota Tanpa Batas (Unlimited)</li>
                        <li><i class="fas fa-check-circle"></i> VIP Dukungan Teknis</li>
                        <li><i class="fas fa-check-circle"></i> Biaya Instalasi Rp 100.000</li>
                    </ul>
                    <div class="price" style="font-size: 2.5rem; margin-top: auto;">200k <span>/ Bulan</span></div>
                    <a href="https://wa.me/6288223980063?text=Halo%20Bro.net,%20saya%20ingin%20pasang%20Paket%20Gold%2050Mbps" class="btn btn-primary" style="width: 100%; text-align: center; margin-top: 20px;" target="_blank">
                        Pesan Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials" id="ulasan">
        <div class="container">
            <div class="section-title">
                <h2>Apa Kata Mereka?</h2>
                <p>Simak pengalaman langsung dari pengguna setia Bro.net di Kota Depok</p>
            </div>
            <div class="testimonial-grid">
                <div class="testimonial-card">
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"Internetnya luar biasa stabil! Padahal di rumah dipake bareng-bareng buat kerja remote sama anak sekolah online. CS-nya juga fast respon banget."</p>
                    <div class="testimonial-user">
                        <div class="user-avatar">D</div>
                        <div class="user-info">
                            <h4>Ibu Dian</h4>
                            <span>Limo, Depok</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"Sebagai freelancer, koneksi itu nyawa buat saya. Bro.net bener-bener kasih performa yang saya butuhin dengan harga yang sangat terjangkau."</p>
                    <div class="testimonial-user">
                        <div class="user-avatar">R</div>
                        <div class="user-info">
                            <h4>Rian</h4>
                            <span>Beji, Depok</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"Pasang WiFi buat kedai kopi, pelanggan sekarang jadi makin betah nongkrong karena internetnya kenceng dan gak lemot. Best choice!"</p>
                    <div class="testimonial-user">
                        <div class="user-avatar">B</div>
                        <div class="user-info">
                            <h4>Pak Budi</h4>
                            <span>Grogol, Depok</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="coverage" id="jangkauan">
        <div class="container">
            <div class="section-title">
                <h2>Area Jangkauan</h2>
                <p>Bro.net kini hadir di berbagai titik strategis di Kota Depok</p>
            </div>
            <div class="area-grid">
                <div class="area-card">
                    <i class="fas fa-map-marker-alt"></i>
                    <h4>Limo</h4>
                </div>
                <div class="area-card">
                    <i class="fas fa-map-marker-alt"></i>
                    <h4>Grogol</h4>
                </div>
                <div class="area-card">
                    <i class="fas fa-map-marker-alt"></i>
                    <h4>Beji</h4>
                </div>
                <div class="area-card">
                    <i class="fas fa-map-marker-alt"></i>
                    <h4>Pancoran Mas</h4>
                </div>
                
            </div>
         
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-info">
                    <h3>Bintang Respon Optimal</h3>
                    <p>Connecting you to the future with reliable and high-speed internet solutions.</p>
                    <div class="footer-addr">
                        <i class="fas fa-map-marker-alt"></i> Jalan Cemara, Grogol, Limo Depok
                    </div>
                    <div class="social-links">
                        <a href="#" class="social-link" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link" title="Facebook"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="social-link" title="Twitter"><i class="fab fa-twitter"></i></a>
                        <span style="align-self: center; color: #9CA3AF; font-size: 0.9rem; margin-left: 5px;">@Bro.net</span>
                    </div>
                </div>
                <div class="footer-contact">
                    <div class="contact-pills">
                        <a href="tel:088223980063" class="contact-pill">
                            <i class="fas fa-phone"></i> 088223980063
                        </a>
                        <a href="https://wa.me/6288223980063" class="contact-pill" target="_blank">
                            <i class="fab fa-whatsapp"></i> Chat Admin
                        </a>
                    </div>
                </div>
            </div>
            <div class="copyright">
                &copy; 2024 Bro.net | Bintang Respon Optimal. All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        // Scroll effect
        window.addEventListener('scroll', function() {
            const nav = document.getElementById('mainNav');
            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });

        // Mobile menu toggle
        const menuToggle = document.getElementById('menuToggle');
        const navLinks = document.getElementById('navLinks');

        menuToggle.addEventListener('click', function() {
            navLinks.classList.toggle('active');
            const icon = menuToggle.querySelector('i');
            if (navLinks.classList.contains('active')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        // Close menu when link is clicked
        const links = navLinks.querySelectorAll('a');
        links.forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('active');
                const icon = menuToggle.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            });
        });
    </script>
</body>
</html>
