<!-- resources/views/components/footer.blade.php -->

<footer id="footer" class="footer">
  <div class="footer-content">
      <div class="container">
          <div class="row g-5">
              <div class="col-lg-4">
                  <h3 class="footer-heading">About Newzzz</h3>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ab, perspiciatis beatae autem deleniti voluptate nulla a dolores, exercitationem eveniet libero laudantium recusandae officiis qui aliquid blanditiis omnis quae. Explicabo?</p>
                  <p><a href="/about" class="footer-link-more">Learn More</a></p>
              </div>
              <div class="col-6 col-lg-2">
                  <h3 class="footer-heading">Navigation</h3>
                  <ul class="footer-links list-unstyled">
                      <li><a href="/"><i class="bi bi-chevron-right"></i> Home</a></li>
                      <li><a href="/"><i class="bi bi-chevron-right"></i> Blog</a></li>
                      <li><a href="/category"><i class="bi bi-chevron-right"></i> Categories</a></li>
                      <li><a href="/single-post"><i class="bi bi-chevron-right"></i> Single Post</a></li>
                      <li><a href="/about"><i class="bi bi-chevron-right"></i> About us</a></li>
                      <li><a href="/contact"><i class="bi bi-chevron-right"></i> Contact</a></li>
                  </ul>
              </div>
              <div class="col-6 col-lg-2">
                  <h3 class="footer-heading">Categories</h3>
                  <ul class="footer-links list-unstyled">
                      @foreach ($categories as $category)
                          <li><a href="{{ route('category', ['id' => $category->id]) }}"><i class="bi bi-chevron-right"></i> {{ $category->name }}</a></li>
                      @endforeach
                  </ul>
              </div>

              <div class="col-lg-4">
                  <h3 class="footer-heading">Recent Posts</h3>
                  <ul class="footer-links footer-blog-entry list-unstyled">
                      @foreach ($latestArticles as $post)
                          <li>
                              <a href="{{ route('single-post', ['id' => $post->id]) }}" class="d-flex align-items-center">
                                  <img src="{{ asset('assets/img/post-sq-1.jpg') }}" alt="" class="img-fluid me-3">
                                  <div>
                                      <div class="post-meta d-block">
                                          <span class="date">{{ $post->category->name }}</span>
                                          <span class="mx-1">&bullet;</span>
                                          <span>{{ $post->created_at->format('M jS, Y') }}</span>
                                      </div>
                                      <span>{{ $post->judul }}</span>
                                  </div>
                              </a>
                          </li>
                      @endforeach
                  </ul>
              </div>
          </div>
      </div>
  </div>

  <div class="footer-legal">
      <div class="container">
          <div class="row justify-content-between">
              <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                  <div class="copyright">
                      © Copyright <strong><span>Newzzz</span></strong>. All Rights Reserved
                  </div>
                  <div class="credits">
                      <!-- All the links in the footer should remain intact. -->
                      <!-- You can delete the links only if you purchased the pro version. -->
                      <!-- Licensing information: https://bootstrapmade.com/license/ -->
                      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
                      Designed by <a href="#">DimSan</a>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="social-links mb-3 mb-lg-0 text-center text-md-end">
                      <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                      <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                      <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                      <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
                      <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</footer>
