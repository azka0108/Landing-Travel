<!-- untuk layanan transportasi -->
<section id="tutors">
    <div class="tengah">
        <div class="kolom">
            <p class="deskripsi">layanan Tiket Transportasi</p>
        </div>

        <div class="tutor-list">
            @foreach($services as $service)
                <div class="kartutravel">
                    <img src="{{ asset('uploads/'.$service->foto)}}" alt="" width="150" height="180"  />
                    <p class="fonttravel">{{ $service['nama'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
