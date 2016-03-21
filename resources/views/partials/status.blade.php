@foreach( $statuses as $status )
<!-- Status Item -->
<div class="status-item">
    <div class="status-item-header">
        <div class="small-image" style="background-image: url({{ $status->author->photo }});"></div>
        <div class="status-item-header-title">
            <h1><a href="">{{ $status->author->alias }}</a> comentó.</h1>
            <time>{{  $status->created_at > Carbon\Carbon::now()->subDays(1) ? Date::parse($status->created_at)->diffForHumans() : ucfirst(Date::parse($status->created_at)->format('F j \\- h:i A')) }}</time>
        </div>
    </div>
    <div class="status-item-text">
        <p>{{ $status->body }}</p>
    </div>
    <div class="status-item-info">
        <div class="options">
            <ajaxbutton id="{{ $status->id }}" type="status" number="{{ count($status->likes) == 0 ? ' ' : count($status->likes) }}"></ajaxbutton>
        </div>
        <div class="count-comments">
            <svg><use xlink:href="#chat" /></svg>
            <small>{{ count($status->comments) }}</small>
        </div>
    </div>

    <!-- Status comments -->
    <div class="status-comments-wrapper">
        @foreach($status->comments as $comment)
            <div class="status-item-comment">
                <div class="small-image" style="background-image: url({{ $comment->author->photo }});"></div>
                <div class="status-item-content">
                    <div class="status-item-content-header">
                        <h1><a href="">{{ $comment->author->alias }}</a></h1>
                        <time>{{ $comment->created_at->format('h:i A') }}</time>
                    </div>
                    <div class="status-item-content-text">
                        <p>{{ $comment->body }}</p>
                    </div>
                    <div class="options">
                        <ajaxbutton id="{{ $comment->id }}" type="comment" number="{{ count($comment->likes) == 0 ? ' ' : count($comment->likes) }}"></ajaxbutton>
                        <a href="" class="show-reply">
                            @if(count($comment->replies) < 1)
                                Responder
                            @else
                                {{ count($comment->replies) }} Respuestas
                            @endif
                        </a>
                    </div>
                </div>
                <!-- Replies container for a comment -->
                <div class="status-comment-replies">
                    @foreach($comment->replies as $reply)
                        <!-- Reply -->
                        <div class="comment-reply">
                            <div class="small-image" style="background-image: url({{ $reply->author->photo }});"></div>
                            <div class="reply-text">
                                <a href="#">{{ $reply->author->alias }}:</a>
                                <p>{{ $reply->body }}</p>
                                <div class="time">
                                    <time>{{ $comment->created_at->format('h:i A') }}</time>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Add a reply -->
                    <div class="add-reply">
                        {!! Form::open(array('route' => ['storeReply', $comment->id], 'method' => 'POST')) !!}
                            <label for="reply">
                                <div class="small-image" style="background-image: url('img/photo.jpg');"></div>
                                <input type="text" id="reply" name="body" placeholder="Escribe una respuesta">
                            </label>
                            <button>Responder</button>
                       {{ Form::close() }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    

    <!-- Comment -->
    <div class="add-comment">
        {!! Form::open(array('route' => ['storeComment', $status->id], 'method' => 'POST')) !!}
            <div class="small-image" v-bind:style="{ backgroundImage: 'url(' + photo + ')' }"></div>
            <input type="text" name="body" placeholder="Escribe un comentario">
            <button>Comentar</button>
        {!! Form::close() !!}
    </div>
</div>

@endforeach

