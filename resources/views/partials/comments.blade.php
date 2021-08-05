<h4 class="mb-3 mt-4">Comments:</h4>

<ul class="list-group mt-2">
    @foreach($comments as $comment)
        <li class="list-group-item">
            {{ $comment->body }}
        </li>
    @endforeach
</ul>
