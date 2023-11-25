@extends('fontLayouts.app')
@section('main-section')
<!-- Title Section start -->
<section class="title-section">
    <div class="container title-section-main">
        <div class="title-section-main-left">
            <h2><strong>Hello</strong>Everone</h2>
            <h2>
                Welcome To <strong><span>Mustafizur's</span></strong> Blogs
            </h2>
            <p>
                Dive into the world of words, where every page is a gateway to
                endless possibilities and the key to unlocking your boundless
                potential.
            </p>
            <h2><strong>Go Ahead</strong></h2>
        </div>
        <div class="title-section-main-right">
            <iframe style="width: 100%; height: 90%" src="https://lottie.host/?file=9b3c274b-511d-4a46-976c-9a761cda496f/7e1nGiscMJ.json"></iframe>
        </div>
    </div>
</section>
<!-- Title Section End -->

<!-- Feature Blog Post Start -->
<section class="feature-blog-post">
    <div class="container">
        <h2><strong>FEATURED POSTS</strong></h2>
        <div class="feature-blog-post-inner">




            @foreach($featurePosts as $featurePost)
            <div class="card vartical-card" style="min-width: 280px; max-width: 25%">
                <a href="">

                    @if($featurePost->image)

                    <img src="{{ asset('storage/blog_images/' . $featurePost->image) }}" class="card-img-top" alt="Image" />
                    @else

                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJiT-UHSm6w0Jperb8SitpfoAKeMUE3uynPg5YO-2Drw&s" class="card-img-top" alt="Image" />
                    @endif


                    <div class="card-body">
                        <h5 class="card-title">

                            @if($featurePost->category==0)
                            Tech
                            @elseif($featurePost->category==1)
                            Education
                            @elseif($featurePost->category==2)
                            Business
                            @endif
                        </h5>
                        <p class="card-text" style="font-size: 0.9rem">
                            {{ Illuminate\Support\Str::limit($featurePost->post_title, 126) }}
                        </p>
                        <div class="post-vartical-card-footer" style="font-size: 0.8rem; color: rgb(61, 61, 61)">
                            <i class="fa-regular fa-calendar"></i> {{$featurePost->updated_at->diffForHumans()}}
                        </div>
                    </div>
                </a>
            </div>
            @endforeach









        </div>
    </div>
</section>
<!-- Feature Blog Post End -->

<!-- Recent Blog Post Start -->
<section class="recent-blog-post">
    <div class="container recent-blog-post-outer">
        <h2 style="margin-bottom: 50px"><strong>Recent Post</strong></h2>

        <div class="recent-blog-post-inner">

            @foreach($allPosts as $allPost)
            <div class="card mb-3 horzental-card">
                <a href="">
                    <div class="row g-0">
                        <div class="col-md-4">
                            @if($allPost->image)

                            <img src="{{ asset('storage/blog_images/' .$allPost->image) }}" class="card-img-top" alt="Image" />
                            @else

                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJiT-UHSm6w0Jperb8SitpfoAKeMUE3uynPg5YO-2Drw&s" class="card-img-top" alt="Image" />
                            @endif

                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"> @if($allPost->category==0)
                                    Tech
                                    @elseif($allPost->category==1)
                                    Education
                                    @elseif($allPost->category==2)
                                    Business
                                    @endif</h5>
                                <p class="card-text">
                                    {{ Illuminate\Support\Str::limit($allPost->post_title, 207) }}
                                </p>
                                <p class="card-text">
                                    <small class="text-muted">{{$allPost->updated_at->diffForHumans()}}</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- Recent Blog Post End -->

@endsection