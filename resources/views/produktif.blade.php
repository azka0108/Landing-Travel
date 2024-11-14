<!--halaman jadi juragan yang lebih produktif-->
<h1 class="judulnya">Jadi Juragan Yang Lebih Produktif</h1>
<p>Jangan ketinggalan informasi dan promo menarik seputar tiket transportasi di Fastpay. Berikut beberapa artikel yang dapat membantu juragan dalam berbisnis</p>

<div class="kolom8">
    <div class="service-grid">
        @foreach ($artikels as $artikel)
        <div class="service-item">
            <img src="{{ asset('uploads/' . $artikel->foto) }}" alt="{{ $artikel->nama }}">
            <p>#Peluangbisnis</p>
            <p class="fontnya">{{ $artikel->nama }}</p>
        </div>
        @endforeach
    </div>
</div>
