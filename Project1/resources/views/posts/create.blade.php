@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Create Post</h2>
            </div>
            <div class="float-right">
                <a href="{{route('posts.index')}}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="{{route('posts.store')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="title" class="col-form-label">Title</label>
                                <input id="title" type="text" class="form-control" name="title" autocomplete="title"
                                       autofocus>

                                @if($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('title')}}</strong>
                                </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group-row">
                            <div class="col-md-12">
                                <label for="body" class="col-form-label">Description</label>
                                <input id="body" type="text" class="form-contr" name="body" autocomplete="body"
                                       autofocus>

                                @if($errors->has('body'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('body')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group-row">
                            <div class="col-md-12">
                                <label for="category_id" class="col-form-label">Category</label>
                                <select id="category_id" name="category_id" class="custom-select"
                                        id="inputGroupSelect01">
                                    <option selected>Category</option>

                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group-row">
                            <div class="col-md-12">
                                <label for="image" class="col-form-label">Image</label>
                                <input type="file" class="form-control-file" name="image" id="image">
                            </div>
                            @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                              <strong> {{$errors->first('image')}}</strong>
                        </span>
                            @endif
                        </div>

                        <div  class="col-xs-12 col-sm-12 col-md-12 text-left pt-4 pb-3">
                            <button class="btn btn-success">Submit</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
