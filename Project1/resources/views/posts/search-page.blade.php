
<link href="{{asset('css/search.css')}}" rel="stylesheet">

    <div class="container" style="margin-bottom: 52px;">
        <form action="{{route('search.index')}}" method="GET" enctype="multipart/form-data" id="search-form">
            @csrf
            <div class="row">
                <div class="col-lg-12  margin-tb">
            <div class="float-left" >
                <h1 class="title">Search your posts:</h1>
            </div>
                <div class="float-right " id="modal">
                    <a href="#"  data-dismiss="modal" class="close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>

                    </a>
                </div>
            </div>
                </div>

            <div class="text-lg-center">
                <div class="col-md-7">
                <input class="search_input" role="search" name="search" id="search" placeholder="Search" autocomplete="off" autocapitalize="off" spellcheck="false" required/>
            </div>
            </div>
        </form>
</div>




