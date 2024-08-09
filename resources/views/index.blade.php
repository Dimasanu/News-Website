<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <!-- ======= Hero Slider Section ======= -->
    <section id="hero-slider" class="hero-slider">
        <div class="container-md" data-aos="fade-in">
            <div class="row">
                <div class="col-12">
                    <div class="swiper sliderFeaturedPosts">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href="" class="img-bg d-flex align-items-end"
                                    style="background-image: url(assets/img/post-slide-1.jpg);">
                                    <div class="img-bg-inner">
                                        <h2>The Best Homemade Masks for Face (keep the Pimples Away)</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est
                                            mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam
                                            obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem
                                            atque.</p>
                                    </div>
                                </a>
                            </div>

                            <div class="swiper-slide">
                                <a href="/single-post" class="img-bg d-flex align-items-end"
                                    style="background-image: url(assets/img/post-slide-2.jpg);">
                                    <div class="img-bg-inner">
                                        <h2>17 Pictures of Medium Length Hair in Layers That Will Inspire Your New
                                            Haircut</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est
                                            mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam
                                            obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem
                                            atque.</p>
                                    </div>
                                </a>
                            </div>

                            <div class="swiper-slide">
                                <a href="/single-post" class="img-bg d-flex align-items-end"
                                    style="background-image: url(assets/img/post-slide-3.jpg);">
                                    <div class="img-bg-inner">
                                        <h2>13 Amazing Poems from Shel Silverstein with Valuable Life Lessons</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est
                                            mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam
                                            obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem
                                            atque.</p>
                                    </div>
                                </a>
                            </div>

                            <div class="swiper-slide">
                                <a href="/single-post" class="img-bg d-flex align-items-end"
                                    style="background-image: url(assets/img/post-slide-4.jpg);">
                                    <div class="img-bg-inner">
                                        <h2>9 Half-up/half-down Hairstyles for Long and Medium Hair</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est
                                            mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam
                                            obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem
                                            atque.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="custom-swiper-button-next">
                            <span class="bi-chevron-right"></span>
                        </div>
                        <div class="custom-swiper-button-prev">
                            <span class="bi-chevron-left"></span>
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Hero Slider Section -->

    <!-- ======= Post Grid Section ======= -->
    <section id="posts" class="posts">
        <div class="container" data-aos="fade-up">
            <div class="row g-5">
                <!-- Main Post Entry -->
                <div class="col-md-9 order-md-2">
                    @foreach ($posts as $item)
                        <div class="post-entry-1 md d-flex align-items-center mb-4 w-100">
                            <div class="text">
                                <div class="post-meta"><span class="date">{{ $item->category->name }}</span> <span
                                        class="mx-1">&bullet;</span>
                                    <span>{{ $item->created_at->format('M jS, Y') }}</span></div>
                                <h2><a href="/single-post">{{ $item->judul }}</a></h2>
                                <p class="mb-4 d-block">{{ Str::limit($item->isi, 100) }}</p>
                                <div class="d-flex align-items-center author">
                                    <div class="name">
                                        <h3 class="m-0 p-0">{{ $item->penulis }}</h3>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('single-post', ['id' => $item->id]) }}"><img
                                    src="assets/img/post-landscape-1.jpg" alt="" class="img-fluid"
                                    style="max-width: 500px; height: auto; margin-left:20px;"></a>
                        </div>
                    @endforeach
                </div>


                <!-- Trending Section -->
                <div class="col-md-3">
                    <div class="trending">
                        <h3>Latest</h3>
                        <ul class="trending-post">
                            @foreach ($latest as $item)
                                <li>
                                    <a href="{{ route('single-post', ['id' => $item->id]) }}">
                                        <span class="number">{{ $loop->iteration }}</span>
                                        <h3>{{ $item->judul }}</h3>
                                        <span class="author">{{ $item->penulis }}</span>
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div> <!-- End Trending Section -->
            </div> <!-- End .row -->
        </div>
    </section>
    <!-- End Post Grid Section -->

    @foreach ($categories as $category)
        <!-- ======= Category Section ======= -->
        <section class="category-section">
            <div class="container" data-aos="fade-up">
                <div class="section-header d-flex justify-content-between align-items-center mb-5">
                    <h2>{{ $category->name }}</h2>
                    <div><a href="{{ route('category', ['id' => $category->id]) }}" class="more">See All
                            {{ $category->name }}</a></div>
                </div>
                <div class="row">
                    <div class="col-md-9 order-md-2">
                        @foreach ($category->articles->take(5) as $item)
                            <div class="d-lg-flex post-entry-2">
                                <a href="{{ route('single-post', ['id' => $item->id]) }}"
                                    class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                                    <img src="assets/img/post-landscape-6.jpg" alt="" class="img-fluid"
                                        style="max-width: 500px; height: auto;">
                                </a>
                                <div>
                                    <div class="post-meta">
                                        <span class="date">{{ $item->category->name }}</span>
                                        <span class="mx-1">&bullet;</span>
                                        <span>{{ $item->created_at->format('M jS, Y') }}</span>
                                    </div>
                                    <h3><a
                                            href="{{ route('single-post', ['id' => $item->id]) }}">{{ $item->judul }}</a>
                                    </h3>
                                    <p>{{ Str::limit($item->isi, 100) }}</p>
                                    <div class="d-flex align-items-center author">
                                        <div class="name">
                                            <h3 class="m-0 p-0">{{ $item->penulis }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-md-3">
                        @foreach ($category->articles->take(5) as $item)
                            <div class="post-entry-1 border-bottom">
                                <div class="post-meta">
                                    <span class="date">{{ $item->category->name }}</span>
                                    <span class="mx-1">&bullet;</span>
                                    <span>{{ $item->created_at->format('M jS, Y') }}</span>
                                </div>
                                <h2 class="mb-2">
                                    <a href="{{ route('single-post', ['id' => $item->id]) }}">{{ $item->judul }}</a>
                                </h2>
                                <span class="author mb-3 d-block">{{ $item->penulis }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section><!-- End Category Section -->
    @endforeach
</x-layout>
