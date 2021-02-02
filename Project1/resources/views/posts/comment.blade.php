@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Write Comment:</h2>
            </div>
        </div>
    </div>
    <form action="{{route('comment.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="form-row-group">
                        <div class="col-md-8">
                            <label for="description" class="col-form-label">Comment:</label>
                            <textarea id="description" type="text" name="description" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-left pt-4 pb-3">
                        <button class="btn btn-success">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
