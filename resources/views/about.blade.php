@extends('layout')

@section('content')
    <div class="about-banner">
        <div class="banner-overlay"></div>
        <div class="banner-content">
            <h1 class="banner-title">Tentang Kami</h1>
            <p class="banner-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>
    </div>

    <div class="container">
        <div class="content-section">
            <div class="content-text">
                <h2 class="content-title">What is Lorem Ipsum?</h2>
                <p class="content-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            </div>
            <div class="content-image">
                <img src="/images/about1.jpg" alt="Gambar Bagian Pertama">
            </div>
        </div>

        <div class="content-section">
            <div class="content-text">
                <h2 class="content-title">Where does it come from?</h2>
                <p class="content-description">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>
            </div>
            <div class="content-image">
                <img src="/images/about2.jpg" alt="Gambar Bagian Kedua">
            </div>
        </div>

        <div class="commitment-section">
            <h2 class="commitment-title">Komitmen Kami</h2>
            <div class="cards">
                <div class="card">
                    <img src="/images/komitmen1.png" alt="Komitmen 1">
                    <h3 class="card-title">Kualitas</h3>
                    <p class="card-description">Kami memastikan produk kami selalu berkualitas tinggi.</p>
                </div>
                <div class="card">
                    <img src="/images/care.png" alt="Komitmen 2">
                    <h3 class="card-title">Caring</h3>
                    <p class="card-description">Kami selalu peduli terhadap hewan sekitar, dan yang dipercayakan kepada kami.</p>
                </div>
                <div class="card">
                    <img src="/images/trusted.png" alt="Komitmen 3">
                    <h3 class="card-title">Kepercayaan</h3>
                    <p class="card-description">Kami membangun kepercayaan dengan pelanggan kami melalui pelayanan terbaik.</p>
                </div>
                <div class="card">
                    <img src="/images/vaccine.png" alt="Komitmen 4">
                    <h3 class="card-title">Keberlanjutan</h3>
                    <p class="card-description">Kami peduli terhadap lingkungan dan mendorong sterilisasi terhadap hewan.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
