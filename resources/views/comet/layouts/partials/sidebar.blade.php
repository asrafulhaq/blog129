
      
      <div class="col-md-3 col-md-offset-1">
        <div class="sidebar hidden-sm hidden-xs">
          <div class="widget">
            <h6 class="upper">Search blog</h6>
            <form action="{{ route('search.blog') }}" method="POST">
              @csrf
              <input name="s" type="text" placeholder="Search.." class="form-control">
            </form>
          </div>
          <!-- end of widget        -->
          <div class="widget">
            <h6 class="upper">Categories</h6>
            <ul class="nav">
          
              @php
                 $cats =  App\Models\Category::all();
              @endphp
              @foreach ($cats as $cat)
                <li><a href="{{ route('category.blog', $cat -> slug) }}">{{ $cat -> name }}</a>
                </li>
              @endforeach
              


            </ul>
          </div>
          <!-- end of widget        -->
          <div class="widget">
            <h6 class="upper">Popular Tags</h6>
            <div class="tags clearfix"><a href="#">Design</a><a href="#">Fashion</a><a href="#">Startups</a><a href="#">Tech</a><a href="#">Web</a><a href="#">Lifestyle</a>
            </div>
          </div>
          <!-- end of widget      -->
          <div class="widget">
            <h6 class="upper">Latest Posts</h6>
            <ul class="nav">
              <li><a href="#">Checklists for Startups<i class="ti-arrow-right"></i><span>30 Sep, 2015</span></a>
              </li>
              <li><a href="#">The Death of Thought<i class="ti-arrow-right"></i><span>29 Sep, 2015</span></a>
              </li>
              <li><a href="#">Give it five minutes<i class="ti-arrow-right"></i><span>24 Sep, 2015</span></a>
              </li>
              <li><a href="#">Uber launches in Las Vegas<i class="ti-arrow-right"></i><span>20 Sep, 2015</span></a>
              </li>
              <li><a href="#">Fun with Product Hunt<i class="ti-arrow-right"></i><span>16 Sep, 2015</span></a>
              </li>
            </ul>
          </div>
          <!-- end of widget          -->
        </div>
        <!-- end of sidebar-->
      </div>