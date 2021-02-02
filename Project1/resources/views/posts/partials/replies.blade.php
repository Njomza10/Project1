<div class="container">

    @foreach($comments as $comment)

        <div class="display-comment">
            <Strong>{{$comment->user>name}}</Strong>
            <p>{{$comment->description}}</p>
            <a href="" id="reply"></a>
            <form action="{{route('reply.add')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <input type="text" name="description" class="form-control">
                    <input type="hidden" name="post_id" value="{{$post->id}}"/>
                    <input type="hidden" name="comment_id" value="{{$comment->id}}"/>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Reply" />
                </div>

            </form>
            @include('posts.partials.replies', ['comments' => $comment->replies])
        </div>
    @endforeach
</div>
