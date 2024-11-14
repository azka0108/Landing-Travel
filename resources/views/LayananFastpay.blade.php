<!-- layanan digital -->
<div class="kolom8">
    <h1 class="judulnya">Berbagai Layanan Bisnis Digital di Fastpay Pasti Berikan Keuntungan untuk Juragan</h1>
    <div class="service-grid">
        @foreach ($business as $bisnis)
        <div class="service-item">
            <img src="{{ asset('uploads/' . $bisnis->foto) }}" alt="{{ $bisnis->nama }}">
            <h4>{{ $bisnis->nama }}</h4>
            <p>{{ $bisnis->content }}</p>
        </div>
        @endforeach
    </div>
</div>
