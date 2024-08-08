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
                    @foreach ($posts as $post)
                    <div class="post-entry-1 md d-flex align-items-center mb-4 w-100">
                        <div class="text">
                            <div class="post-meta"><span class="date">{{$post->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$post->created_at->format('M jS, Y')}}</span></div>
                            <h2><a href="/single-post">{{$post->judul}}</a></h2>
                            <p class="mb-4 d-block">{{$post->isi}}</p>
                            <div class="d-flex align-items-center author">
                                <div class="name">
                                    <h3 class="m-0 p-0">{{$post->penulis}}</h3>
                                </div>
                            </div>
                        </div>
                        <a href="/single-post"><img src="assets/img/post-landscape-1.jpg" alt="" class="img-fluid ml-3"></a>
                    </div>
                    @endforeach
                </div>    
                
    
                <!-- Trending Section -->
                <div class="col-md-3">
                    <div class="trending">
                        <h3>Latest</h3>
                        <ul class="trending-post">
                            @foreach ($latest as $late)
                            <li>
                                <a href="/single-post">
                                    <span class="number">{{$loop->iteration}}</span>
                                    <h3>{{$late->judul}}</h3>
                                    <span class="author">{{$late->penulis}}</span>
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

    <!-- ======= Culture Category Section ======= -->
    <section class="category-section">
        <div class="container" data-aos="fade-up">

            <div class="section-header d-flex justify-content-between align-items-center mb-5">
                <h2>Culture</h2>
                <div><a href="/category" class="more">See All Culture</a></div>
            </div>

            <div class="row">
                <div class="col-md-9 order-md-2">
                    @foreach ($cultures as $item)
                    <div class="d-lg-flex post-entry-2">
                        <a href="/single-post" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                            <img src="assets/img/post-landscape-6.jpg" alt="" class="img-fluid">
                        </a>
                        <div>
                            <div class="post-meta"><span class="date">{{$item->category->name}}</span> <span
                                    class="mx-1">&bullet;</span> <span>{{$post->created_at->format('M jS, Y')}}</span></div>
                            <h3><a href="/single-post">{{$item->judul}}</a></h3>
                            <p>{{$item->isi}}</p>
                            <div class="d-flex align-items-center author">
                                <div class="name">
                                    <h3 class="m-0 p-0">{{$item->penulis}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="col-md-3">
                    @foreach ($culture as $item)
                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date"></span>{{$item->category->name}} <span
                                class="mx-1">&bullet;</span> <span>{{$post->created_at->format('M jS, Y')}}</span></div>
                        <h2 class="mb-2"><a href="/single-post">{{$item->judul}}</a></h2>
                        <span class="author mb-3 d-block">{{$item->penulis}}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Culture Category Section -->

    <!-- ======= Business Category Section ======= -->
    <section class="category-section">
        <div class="container" data-aos="fade-up">

            <div class="section-header d-flex justify-content-between align-items-center mb-5">
                <h2>Business</h2>
                <div><a href="/category" class="more">See All Business</a></div>
            </div>

            <div class="row">
                <div class="col-md-9 order-md-2">
                    @foreach ($business as $item)
                    <div class="d-lg-flex post-entry-2">
                        <a href="/single-post" class="me-4 thumbnail d-inline-block mb-4 mb-lg-0">
                            <img src="assets/img/post-landscape-3.jpg" alt="" class="img-fluid">
                        </a>
                        <div>
                            <div class="post-meta"><span class="date">{{$item->category->name}}</span> <span
                                    class="mx-1">&bullet;</span> <span>{{$post->created_at->format('M jS, Y')}}</span></div>
                            <h3><a href="/single-post">{{$item->judul}}</a></h3>
                            <p>{{$item->isi}}</p>
                            <div class="d-flex align-items-center author">
                                <div class="name">
                                    <h3 class="m-0 p-0">{{$item->penulis}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-3">
                    @foreach ($business1 as $item)
                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">{{$item->category->name}}</span> <span
                                class="mx-1">&bullet;</span> <span>{{$post->created_at->format('M jS, Y')}}</span></div>
                        <h2 class="mb-2"><a href="/single-post">{{$item->judul}}</a></h2>
                        <span class="author mb-3 d-block">{{$item->penulis}}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section><!-- End Business Category Section -->

    <!-- ======= Lifestyle Category Section ======= -->
    <section class="category-section">
        <div class="container" data-aos="fade-up">

            <div class="section-header d-flex justify-content-between align-items-center mb-5">
                <h2>Lifestyle</h2>
                <div><a href="/category" class="more">See All Lifestyle</a></div>
            </div>

            <div class="row">
                <div class="col-md-9 order-md-2">
                    @foreach ($lifestyles as $item)
                    <div class="d-lg-flex post-entry-2">
                        <a href="/single-post" class="me-4 thumbnail d-inline-block mb-4 mb-lg-0">
                            <img src="assets/img/post-landscape-3.jpg" alt="" class="img-fluid">
                        </a>
                        <div>
                            <div class="post-meta"><span class="date">{{$item->category->name}}</span> <span
                                    class="mx-1">&bullet;</span> <span>{{$post->created_at->format('M jS, Y')}}</span></div>
                            <h3><a href="/single-post">{{$item->judul}}</a></h3>
                            <p>{{$item->isi}}</p>
                            <div class="d-flex align-items-center author">
                                <div class="name">
                                    <h3 class="m-0 p-0">{{$item->penulis}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-3">
                    @foreach ($business1 as $item)
                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">{{$item->category->name}}</span> <span
                                class="mx-1">&bullet;</span> <span>{{$post->created_at->format('M jS, Y')}}</span></div>
                        <h2 class="mb-2"><a href="/single-post">{{$item->judul}}</a></h2>
                        <span class="author mb-3 d-block">{{$item->penulis}}</span>
                    </div>
                    @endforeach
                </div>
            </div>
                        <div class="col-lg-4">
                            @foreach ($lifestyle as $item)
                                
                            <div class="post-entry-1 border-bottom">
                                <div class="post-meta"><span class="date">Lifestyle</span> <span
                                        class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                <h2 class="mb-2"><a href="/single-post">10 Life-Changing Hacks Every Working Mom
                                        Should Know</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Lifestyle Category Section -->
</x-layout>
