@extends('fontLayouts.app')
@section('main-section')
<!-- Blog Top Search Button Start -->
<section class="blog-top-search">
    <div class="container blog-top-search-inner">
        <div class="blog-page-title">
            <h1>
                @if($category)
                {{ ucfirst($category) }}
                @endif
            </h1>
        </div>

        <form class="container">
            <div class="row height d-flex justify-content-center align-items-center">
                <div class="col-md-8">
                    <div class="search">
                        <i class="fa fa-search"></i>
                        <input type="text" class="form-control" placeholder="Have a question? Ask Now" />
                        <button class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="blog-tag-search">
            <div style="font-weight: bold">
                <div style="display: inline-block;">Category:</div>



                <div style="margin-top: 10px; display: inline-block;">


                    <a href="{{ route('page.bloglistByCategory', ['category' => 'tech']) }}" style="text-decoration: none; ">
                        <strong>Tech</strong>
                    </a>
                </div>


                <div style="margin-top: 10px; display: inline-block;">


                    <a href="{{ route('page.bloglistByCategory', ['category' => 'education']) }}" style="text-decoration: none; ">
                        <strong>Education</strong>
                    </a>
                </div>


                <div style="margin-top: 10px; display: inline-block;">


                    <a href="{{ route('page.bloglistByCategory', ['category' => 'business']) }}" style="text-decoration: none; ">
                        <strong>Business</strong>
                    </a>
                </div>
                </d>
            </div>
        </div>
</section>
<!-- Blog Top Search Button End -->




<!-- Feature Blog Post Start -->
<section class="feature-blog-post">
    <div class="container">
        <h2><strong> @if($category)
                {{ ucfirst($category) }}
                @endif</strong></h2>
        <div class="feature-blog-post-inner">


            @foreach($posts as $post)

            <div class="card vartical-card" style="min-width: 280px; max-width: 25%">
                <a href="">
                    <img src="https://images.unsplash.com/photo-1516648064-ee10acfa64db?q=80&w=2063&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <h5 class="card-title">
                            @if($post->category==0)
                            Tech
                            @elseif($post->category==1)
                            Education
                            @elseif($post->category==2)
                            Business
                            @endif</h5>
                        <p class="card-text" style="font-size: 0.9rem">
                            {{ Illuminate\Support\Str::limit($post->post_title, 126) }}
                        </p>
                        <div class="post-vartical-card-footer" style="font-size: 0.8rem; color: rgb(61, 61, 61)">
                            <i class="fa-regular fa-calendar"></i> {{$post->updated_at->diffForHumans()}}
                        </div>
                    </div>
                </a>
            </div>

            @endforeach




        </div>
    </div>
</section>
<!-- Feature Blog Post End -->
@endsection