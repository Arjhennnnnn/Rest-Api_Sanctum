{{-- hasone
Name : {{ $product->name }} <br>
Slug : {{ $product->slug }} <br>
Description : {{ $product->description }} <br>
Price : {{ $product->price }} <br>
Detail Name : {{ $product->detail->name }} <br>
Detail Slug : {{ $product->detail->slug }} <br>
Detail Description : {{ $product->detail->description }} <br> --}}
 
{{-- hasmany --}}
Name : {{$user->name}} <br>
Email : {{$user->email}} <br> <br>

@if($user->posts->count() > 0)
    @foreach($user->posts as $post)
        Title : {{ $post->title }} <br>
        Body : {{ $post->body }} <br> <br>
    @endforeach
@else
    <h1>No Posts</h1>
@endif
