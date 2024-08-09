<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section>
        <div class="container">
            <div class="row">
    
                <div class="col-md-9" data-aos="fade-up">
                    <h3 class="category-title">Category: {{ $category ? $category->name : 'All Categories' }}</h3>
        
                    @foreach ($articles as $article)
                    <div class="d-md-flex post-entry-2 half">
                        <a href="{{ route('single-post', ['id' => $article->id]) }}" class="me-4 thumbnail">
                            <img src="{{ asset('storage/images/' . $article->gambar)}}" alt="" class="img-fluid">
                        </a>
                        <div>
                            <div class="post-meta">
                                <span class="date">{{ $article->category->name }}</span>
                                <span class="mx-1">&bullet;</span>
                                <span>{{ $article->created_at->format('M jS, Y') }}</span>
                                </div>
                                <h3><a href="{{ route('single-post', ['id' => $article->id]) }}">{{ $article->judul }}</a></h3>
                                <p>{{ $article->isi }}</p>
                                <div class="d-flex align-items-center author">
                                <div class="name">
                                    <h3 class="m-0 p-0">{{ $article->penulis }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
        
                    <div class="text-start py-4">
                        <div class="custom-pagination">
                            {{ $articles->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
    
                <x-sidebar-list></x-sidebar-list>
    
            </div>
        </div>
    </section>
</x-layout>