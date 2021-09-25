@extends('comet.layouts.app')

@section('main')

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="blog-posts">






          {{-- <article class="post-single">
            <div class="post-info">
              <h2><a href="#">Checklists for Startups</a></h2>
              <h6 class="upper"><span>By</span><a href="#"> Admin</a><span class="dot"></span><span>28 September 2015</span><span class="dot"></span><a href="#" class="post-tag">Startups</a></h6>
            </div>
            <div class="post-media">
              <div data-options="{&quot;animation&quot;: &quot;slide&quot;, &quot;controlNav&quot;: true" class="flexslider nav-outside">
                <ul class="slides">
                  <li>
                    <img src="comet/images/blog/1.jpg" alt="">
                  </li>
                  <li>
                    <img src="comet/images/blog/2.jpg" alt="">
                  </li>
                  <li>
                    <img src="comet/images/blog/3.jpg" alt="">
                  </li>
                </ul>
              </div>
            </div>
            <div class="post-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae ut ratione similique temporibus tempora dicta soluta? Qui hic, voluptatem nemo quo corporis dignissimos voluptatum debitis cumque fugiat mollitia quasi quod. Repudiandae
                possimus quas odio nisi optio asperiores, vitae error laudantium, ratione odit ipsa obcaecati debitis deleniti minus, illo maiores placeat omnis magnam.</p>
              <p><a href="#" class="btn btn-color btn-sm">Read More</a>
              </p>
            </div>
          </article> --}}





          <!-- end of article-->
          {{-- <article class="post-single">
            <div class="post-info">
              <h2><a href="#">Never Tell People What You Do</a></h2>
              <h6 class="upper"><span>By</span><a href="#"> Admin</a><span class="dot"></span><span>28 September 2015</span><span class="dot"></span><a href="#" class="post-tag">Entrepreneurship</a></h6>
            </div>
            <div class="post-media">
              <div class="media-video">
                <iframe src="https://www.youtube.com/embed/rrT6v5sOwJg" frameborder="0"></iframe>
              </div>
            </div>
            <div class="post-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae ut ratione similique temporibus tempora dicta soluta? Qui hic, voluptatem nemo quo corporis dignissimos voluptatum debitis cumque fugiat mollitia quasi quod. Repudiandae
                possimus quas odio nisi optio asperiores, vitae error laudantium, ratione odit ipsa obcaecati debitis deleniti minus, illo maiores placeat omnis magnam.</p>
              <p><a href="#" class="btn btn-color btn-sm">Read More</a>
              </p>
            </div>
          </article> --}}
          <!-- end of article-->
          {{-- <article class="post-single">
            <div class="post-info">
              <h2><a href="#">Give It Five Minutes</a></h2>
              <h6 class="upper"><span>By</span><a href="#"> Admin</a><span class="dot"></span><span>28 September 2015</span><span class="dot"></span><a href="#" class="post-tag">Startups</a></h6>
            </div>
            <div class="post-body">
              <blockquote class="italic">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et quam neque facilis similique laborum, nihil id ratione, error illum. Porro quas maxime accusamus numquam consequatur consequuntur eveniet quis, fuga repellendus.</p>
              </blockquote>
            </div>
          </article> --}}
          <!-- end of article-->




          @forelse ($all_posts as $post)
          <article class="post-single">
            <div class="post-info">
              <h2><a href="#">{{ $post -> title }}</a></h2>
              <h6 class="upper"><span>By</span><a href="#"> {{ $post -> author -> name }} </a><span class="dot"></span><span>{{ date('d F, Y', strtotime($post -> created_at)) }}</span><span class="dot"></span>
                
                @foreach( $post -> categories  as $cat )
                <a href="{{ $cat -> slug }}" class="post-tag">{{ $cat -> name }}</a>
                @endforeach
              
              </h6>
            </div>
            <div class="post-media">
              @php
              $featured =   json_decode( $post -> featured);
              @endphp


              
                
               
                @if( $featured -> post_type == 'Standard' )
                <a href="#">
                  <img src="{{ URL::to('media/posts/') }}/{{ $featured -> post_image }}" alt="">
                </a>
                @endif
              
                @if($featured -> post_type == 'Gallery') 


                <div class="post-media">
                  <div data-options="{&quot;animation&quot;: &quot;slide&quot;, &quot;controlNav&quot;: true" class="flexslider nav-outside">
                    <ul class="slides">

                      @foreach($featured  -> post_gallery as $gall)
                      <li>
                        <img src="{{ URL::to('media/posts/' . $gall) }}" alt="">
                      </li>
                      @endforeach
                    </ul>
                  </div>

                @endif

                @if($featured -> post_type == 'Video') 
                  <div class="post-media">
                    <div class="media-video">
                      <iframe src="{{ $featured  -> post_video }}" frameborder="0"></iframe>
                      
                    </div>
                  </div>
                @endif


                @if($featured -> post_type == 'Audio') 
                  <div class="post-media">
                    {!! htmlspecialchars_decode($featured -> post_audio) !!}
                  </div>
                @endif



            </div>
            <div class="post-body">
              {!! htmlspecialchars_decode(Str::of($post -> content) -> words(30)) !!}
              <p><a href="#" class="btn btn-color btn-sm">Read More</a>
              </p>
            </div>
          </article>
          @empty  
            <h3>No post found</h3>              
          @endforelse
          
         




          <!-- end of article-->
          {{-- <article class="post-single">
            <div class="post-info">
              <h2><a href="#">Fun With Product Hunt</a></h2>
              <h6 class="upper"><span>By</span><a href="#"> Admin</a><span class="dot"></span><span>28 September 2015</span><span class="dot"></span><a href="#" class="post-tag">Tech</a></h6>
            </div>
            <div class="post-media">
              <div class="media-audio">
                <iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/51057943&amp;amp;color=ff5500&amp;amp;auto_play=false&amp;amp;hide_related=false&amp;amp;show_comments=true&amp;amp;show_user=true&amp;amp;show_reposts=false"
                frameborder="0"></iframe>
              </div>
            </div>
            <div class="post-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae ut ratione similique temporibus tempora dicta soluta? Qui hic, voluptatem nemo quo corporis dignissimos voluptatum debitis cumque fugiat mollitia quasi quod. Repudiandae
                possimus quas odio nisi optio asperiores, vitae error laudantium, ratione odit ipsa obcaecati debitis deleniti minus, illo maiores placeat omnis magnam.</p>
              <p><a href="#" class="btn btn-color btn-sm">Read More</a>
              </p>
            </div>
          </article> --}}
          <!-- end of article-->
        </div>
        <ul class="pagination">
          <li><a href="#" aria-label="Previous"><span aria-hidden="true"><i class="ti-arrow-left"></i></span></a>
          </li>
          <li class="active"><a href="#">1</a>
          </li>
          <li><a href="#">2</a>
          </li>
          <li><a href="#">3</a>
          </li>
          <li><a href="#">4</a>
          </li>
          <li><a href="#">5</a>
          </li>
          <li><a href="#" aria-label="Next"><span aria-hidden="true"><i class="ti-arrow-right"></i></span></a>
          </li>
        </ul>
        <!-- end of pagination-->
      </div>

      @include('comet.layouts.partials.sidebar')





    </div>
    <!-- end of row-->
  </div>
  <!-- end of container-->
</section>

@endsection

