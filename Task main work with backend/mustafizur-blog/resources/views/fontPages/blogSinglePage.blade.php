@extends('fontLayouts.app')
@section('main-section')

<!-- single page header title start -->

<!-- blogger details start -->
<section class="bloger-details">
    <div class="container">
        <div class="bloger-details-inner">

            @if($post->user->image==null)
            <div class="bloger-details-inner-left">
                <img src="https://cdn.vectorstock.com/i/1000x1000/43/95/default-avatar-photo-placeholder-icon-grey-vector-38594395.webp" alt="" />
            </div>
            @else
            <div class="bloger-details-inner-left">
                <img src="{{ asset('storage/profile_images/' . $post->user->image) }}" alt="" />
                @endif

                <div class="bloger-details-inner-right">
                    <p>{{ $post->user->name }}</p>
                    <p>{{ \Carbon\Carbon::parse($post->updated_at)->format('d F Y') }}</p>



                </div>
            </div>
        </div>
</section>
<!-- blogger details end -->

<!-- post main image section start -->

<section class="main-image-section">
    @if($post->image)
    <div class="container">
        <img class="main-image" src="{{ asset('storage/blog_images/' . $post->image) }}" alt="" />
    </div>
    @endif
</section>
<!-- post main image section End -->



<!-- post title start -->
<section style="margin-top: 50px;" class="post-description">
    <div class="container post-description-main-section">
        <h2>
            {{$post->post_title}}
        </h2>

    </div>
</section>
<!-- post title end -->

<!-- post description start -->
<section class="post-description">
    <div class="container post-description-main-section">
        {{$post->post_description}}
    </div>
</section>
<!-- post description end -->

<!-- Recent Blog Post Start -->
<section class="recent-blog-post">
    <div class="container recent-blog-post-outer">
        <h2 style="margin-bottom: 50px"><strong>Recent Post</strong></h2>

        <div class="recent-blog-post-inner">

            @foreach($allPosts as $allPost)
            <div class="card mb-3 horzental-card">
                <a href="{{route('page.blogDetails',['id'=>$allPost->id])}}">
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