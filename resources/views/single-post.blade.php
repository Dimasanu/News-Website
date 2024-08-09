<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <!-- ======= Single Post ======= -->
    <section class="single-post-content">
      <div class="container">
        <div class="row">
          <div class="col-md-9 post-content" data-aos="fade-up">

            <!-- ======= Single Post Content ======= -->
            <div class="single-post">
              <div class="post-meta">
                <span class="date">{{ $article->category->name }}</span>
                <span class="mx-1">&bullet;</span>
                <span>{{ $article->created_at->format('M jS, Y') }}</span>
              </div>
              <h1 class="mb-5">{{ $article->judul }}</h1>
              <!-- Gambar pertama dengan keterangan -->
              <figure class="my-4">
                <img src="{{ asset('storage/images/' . $article->gambar)}}" alt="" class="img-fluid">
                <figcaption>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, odit?</figcaption>
              </figure>

              <p>
                <span class="firstcharacter">{{ substr($article->isi, 0, 1) }}</span>
                {{ substr($article->isi, 1) }}
              </p>
            
              <!-- Paragraf lanjutan -->
              <p>{{ $article->isi }}</p>
            </div>
            <!-- End Single Post Content -->

          </div>
          <x-sidebar-list></x-sidebar-list>
        </div>
      </div>
    </section>
  <!-- End Single Post -->
</x-layout>
