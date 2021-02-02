@extends('layouts.app')
@section('content')

    <link href="{{asset('css/blog.css')}}" rel="stylesheet">

    <div class="row">
        <div class="col-lg-12  margin-tb">
            <div class="text-lg-center">
                <h1>Blog Page</h1>
            </div>


            <div class="float-right">
                <a href="{{route('search.search')}}"  type="btn btn-search"  data-toggle="modal" data-target="#searchModal" class="float-left">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                         class="bi bi-search"
                         viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>

                </a>
                <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="content">
<span class="slide">
    <a id="mainbox" onclick="openSlideMenu()" style="margin-right:12px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
             class="bi bi-plus" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg>
    </a>
</span>
        <nav class="sidebar" id="menu">
            <a href="#" class="close" onclick="closeSlideMenu()">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x"
                     viewBox="0 0 16 16">
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </a>
            <ul class="mainmenu">
                <li><a href="" class="font-weight-bold">Categories</a>
                    <?php $categories = DB::table('categories')->get();?>
                    @foreach($categories as $category)
                        <ul class="submenu">

                            <li><input type="checkbox"> <a href="{{route('blog.show',$category->id)}}"
                                                           class="d-inline">{{$category->name}} <small
                                        class="text-muted">({{$posts->count()}})</small></a></li>
                        </ul>
                    @endforeach
                </li>

                <li><a href="" class="font-weight-bold">Fun</a>

                    <ul class="submenu">
                        <li><input type="checkbox"><a href="{{route('blog.show',$category->id)}}" class="d-inline">Gjegjeza</a>
                        </li>
                        <li><input type="checkbox"><a href="{{route('blog.show',$category->id)}}" class="d-inline">Barcoleta</a>
                        </li>
                    </ul>
                </li>

                <li><a href="" class="font-weight-bold">Sport</a>
                    <ul class="submenu">
                        <li><input type="checkbox"><a href="{{route('blog.show',$category->id)}}" class="d-inline">Football</a>
                        </li>
                        <li><input type="checkbox"><a href="{{route('blog.show',$category->id)}}" class="d-inline">Basketball</a>
                        </li>
                        <li><input type="checkbox"><a href="{{route('blog.show',$category->id)}}" class="d-inline">Tennis</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    @foreach($posts as $post)
        <div class="d-inline-block p-4">
            <div class="content">
                <div class="card border border-transparent" style="width: 18rem; height: 23rem; margin-left:36px;">
                    <img class="card-img-top" src="{{$post->image_url}}" alt="card-image-cap"
                         style="width:286px; height:150px;">
                    <div class="card-body">
                        <small class="card-subtitle pt-2 text-muted">{{$post->category->name ?? '-'}}</small>
                        <p class="card-title font-weight-bold">
                            <a href="{{route('posts.show',$post->id)}}">{{$post->title}}</a>
                        </p>
                        <p class="card-text">{{$post->body}}</p>
                        <div class="d-inline">
                            <img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAM1BMVEXk5ueutLfn6eqrsbTp6+zg4uOwtrnJzc/j5earsbW0uby4vcDQ09XGyszU19jd3+G/xMamCvwDAAAFLklEQVR4nO2d2bLbIAxAbYE3sDH//7WFbPfexG4MiCAcnWmnrzkjIRaD2jQMwzAMwzAMwzAMwzAMwzAMwzAMwzAMwzAMwzAMw5wQkHJczewxZh2lhNK/CBOQo1n0JIT74/H/qMV0Z7GU3aCcVPuEE1XDCtVLAhgtpme7H0s1N1U7QjO0L8F7llzGeh1hEG/8Lo7TUmmuSrOfns9xnGXpXxsONPpA/B6OqqstjC6Ax/0ujkNdYQQbKNi2k64qiiEZ+ohi35X+2YcZw/WujmslYewiAliVYrxgJYrdwUmwXsU+RdApUi83oNIE27YvrfB/ZPg8+BJETXnqh9CVzBbTQHgojgiCvtqU9thFJg/CKz3VIMKMEkIXxIWqIpIg2SkjYj+xC816mrJae2aiWGykxRNsW0UwiJghJDljYI5CD8GRiCtIsJxizYUPQ2pzItZy5pcisTRdk/a9m4amtNNfBuQkdVhSaYqfpNTSFGfb9GRIakrE2Pm+GFLaCQPqiu0OpWP+HMPQQcgQMiQprWXNmsVwIjQjYi/ZrhAqNTCgr2gu0Jnz85RSSjso0HkMFZ0YZjKkc26a/jlmh9JiDyDxi9oeorTYAzZkwwoMz19pzj9bnH/GP/+qbchjSGflneWYhtTuKdMOmNKZcJ5TjInQKcYXnESd/jQxy0ENpULTNGOGgxpap/oyw9pbUAqhfx2Dbkhovvfgz4iUzoM9+GlK6/Mh4q29hyC1mwro30hpVVLPF9wYQr71RazOeM5/cw81iBRD+A03aM9/C/obbrKjbYSpCmIVG3qT/Q8oeUo3Rz0IL7vI1tEbCB9pSiu8I/aV8x3Kg/BGWrWp4ZVs0nZfmAoEG4h/61yHYIJiFSl6Q0Vk6tTW1N8kYp8hdOkfHYYMXd2Qft+8CYwqYDSKvqIh+MCF8Wgca2u/cwdgeW3TtuVn6+1oBs3yLo5C2JpK6CvQzGpfUkz9UG/87gCsi5o2LIXolxN0FbwAsjOLEr+YJmXn7iR6N0BCt5p5cMxm7eAsfS+/CACQf4CTpKjzgkvr2cVarVTf96372yut7XLJ1sa7lv6VcfgYrWaxqr3Wlo1S6pvStr22sxOtTNPLzdY3nj20bPP+ejFdJYkLsjGLdtPBEbe/mr2bQKiXWJDroA+vtzc0p9aahuwqHMDYrQEXHEw9jwQl3drMpts9JBU1SdktPe5FBRdJQ6bwXBpa57ib2A8kukQDzMjh++Uo7Fo6Wd02Pkf4fknqoo4HtvAIjsqUcjx6DIPgWCaOML9rKI/oqD9/lgNrn+eF+p7j8tnzHBiR7+kdUGw/+V1Kzkc75mMy6U+FMaxjPibiM1U1uGM+puInHpmALZCgP4pt7i840MV8+0R1zPsRB6UTcqpizncYwZ89syDydfyWCwXB1l8/zRNGWbTG/GHKUm9AkxHMc/EGSk3z2+ArEhPEV5TUBLEvUGFcjEUH80J/jveTGOAJEljJbILWGQT3zRYiwuKsUXN1EEJAzBhRJFll7mBUG7KD8EqPkKekBREaL8hMDZLQSG6AQjtHPYmvTQnX0TtpC1SYCe2YdkkyLP3jj5BSbKiuR585eQhTgoje6yIb0Yb0C+mV6EYvebqw5SDy2WmubogZiF2AVxPC2FpDf8H2Q9QWo6IkjUxTWVEI3WY/wrCeSuqJ+eRWzXR/JXwgVjUMozbCOfoEZiSiKVGepqv5CJ8RyR4D7xBeamqa7z3BJ/z17JxuBPdv93d/a2Ki878MMAzDMAzDMAzDMAzDMF/KP09VUmxBAiI3AAAAAElFTkSuQmCC"
                                class="img-circle" alt="." width="30px" height="30px">
                        </div>
                        <p class="font-weight-bold d-inline ml-1">{{$post->user->name ?? '-'}}</p>
                        <div class="pl-4 pb-3"><small>{{$post->created_at->format('M,d Y')}}</small></div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{$posts->links()}}
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

    function openSlideMenu() {
        document.getElementById('menu').style.width = '200px';
        document.getElementById('content').style.marginLeft = '0';
        document.getElementById('mainbox').innerHTML = "";
    }

    function closeSlideMenu() {
        document.getElementById('menu').style.width = '0';
        document.getElementById('content').style.marginLeft = '0';
        document.getElementById('mainbox').style.marginLeft = '&#9776';
    }



</script>
