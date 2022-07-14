<section id="services" class="services">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Outstanding Posts</h2>
        </div>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-lg-4 col-md-6 align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box">
                    <div class="icon"><i class="bx bxl-dribbble"></i></div>
                    <h4><a href="">{!! $post->name !!}</a></h4>
                    <p>{{ $post->description }}</p>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
