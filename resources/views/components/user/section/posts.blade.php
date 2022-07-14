<section id="services" class="services">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>{{ $category ? "List Posts By ". strtoupper($category->name) : "List All Posts" }}</h2>
        </div>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-lg-4 col-md-6 align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="row">
                            <img src="{{ asset(config('common.url.path_image_post')).'/'.$post->image }}"
                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""sizes="(max-width: 300px) 100vw, 300px">
                        </div>
                        <h4><a href="">{!! $post->name !!}</a></h4>
                        <p>{{ $post->description }}</p>
                    </div>
                    </span>
                </div>
            @endforeach
        </div>

    </div>
</section>
