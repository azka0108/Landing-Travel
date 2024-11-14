
    <!-- Testimonial Section -->

    <section class="testimonial-section">
        @foreach ($reviews as $review) <!-- Mulai loop dengan variabel $reviews -->
        <div class="testimonial">
            <div class="testimonial-content">
                <p class="quote">“</p>
                <img src="{{ asset('uploads/'.$review->foto) }}" alt="" width="100" height="100" />
                <div class="testimonial-text">
                    <h3>{{ $review->nama }}</h3>
                    <p>{{ $review->content }}</p>
                </div>
            </div>
        </div>
        @endforeach <!-- Akhiri loop -->
    </section>
    