@foreach ($posts as $post)
    <div class="card card-body mt-2">
        <h2> {{ $post->title }} </h2>
        <div>
            {!! $post->description !!}
        </div>
        <a href="{{ route('index.show', $post->id) }}" class="btn btn-info" style="width: 100px;">
            View
        </a>
    </div>
@endforeach


@if (!count($posts))
    <div class="bg-warning p-4">
        No Posts found...
    </div>
@endif