    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="10">
          <div class="swiper-wrapper">
  @foreach ($actu as $actus)
      


            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  {{ $actus->content }}.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="actualiteimage/{{  $actus->image }}" class="testimonial-img" alt="">
                <h3>{{ $actus->autor }}.</h3>
                <h4>{{ $actus->grade }}.</h4>
              </div>
            </div><!-- End testimonial item -->

@endforeach

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section>