<div class="col-md-3">
    <!-- ======= Sidebar ======= -->
    <div class="aside-block">
        <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-latest" type="button" role="tab"
                    aria-controls="pills-latest" aria-selected="false">Latest</button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <!-- Latest -->
            <div class="tab-pane fade" id="pills-latest" role="tabpanel"
                aria-labelledby="pills-latest-tab">
                @foreach ($latestArticles as $item)
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
            </div> <!-- End Latest -->
        </div>
    </div>

    <div class="aside-block">
        <h3 class="aside-title">Categories</h3>
        <ul class="aside-links list-unstyled">
            @foreach ($categories as $category)
            <li><a href="{{ route('category', ['id' => $category->id]) }}"><i class="bi bi-chevron-right"></i> {{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div><!-- End Categories -->

    <div class="aside-block">
        <h3 class="aside-title">Tags</h3>
        <ul class="aside-tags list-unstyled">
            @foreach ($categories as $category)
            <li><a href="{{ route('category', ['id' => $category->id]) }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div><!-- End Tags -->
</div>