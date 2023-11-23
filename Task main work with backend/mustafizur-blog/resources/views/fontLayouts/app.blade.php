<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />



  <link rel="stylesheet" href="{{asset('assets/css/navbar/navheader.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/navbar/navbarMain.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/titleSection/title-section.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/featureBlogPost/featureBlogPost.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/recentBlogPost/recentBlogPost.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/featureBlogPost/featureBlogPost.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/recentBlogPost/recentBlogPost.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/blogTopSearch/blogTopSearch.css')}}" />
  <link
      rel="stylesheet"
      href="{{asset('assets/css/SinglePageDesign/singlePageDesign.css')}}"
    />



  <title>Mustafizur Blogs</title>
</head>

<body>

  @include('fontLayouts.header')
  @yield('main-section')
  @include('fontLayouts.footer')


  <script>
    const currentYear = new Date().getFullYear();
    document.getElementById("currentYear").innerText = currentYear;
  </script>
</body>

</html>