<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div style="font-family: sans-serif;" class="p-6 text-gray-900">
                        <a class="pk" href="{{url("/Reflect/$post->Publisher")}}" style="color: gray;">{{$post->Publisher}}:</a>
                        <h1 style="color: red;text-align: center;font-size: xxx-large;font-family: sans-serif">{{$post->title}}</h1><br>
                        <p style="font-family: sans-serif;font-size: x-large">{{$post->body}}</p><br>
                        <a style="color: white;background-color: black;border-radius: 6px;padding: 6px;position:relative;left: 550px;" href="{{url("/Comments/$post->id")}}">Comments</a><br>
                        <br><br><hr><br>
                        @foreach($post->comments as $comment)

                        <div style="font-family: sans-serif;background-color: #cad1e3;border-radius: 4px;width: 300px;">
                            <a class="lk" href="{{url("/Reflect/$comment->Commenter")}}" style="color: gray;">{{$comment->Commenter}}:</a>
                            <p>{{$comment->Comment}}</p>
                        </div><br><br>
                        @endforeach
                        <form style="font-family: sans-serif" action="{{url("/RecordeComment/$post->id")}}" method="POST">
                            @csrf
                            <input style="width: 40%;" type="text" name="comment" placeholder="Write Your Comment" />
                            <input style="background-color: green;color: white;border: 2px green solid;padding: 4px;width: 80px;border-radius: 3px; " type="submit" value="Send">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <Style>.lk:hover {text-decoration: underline;} .pk:hover{text-decoration: underline}</Style>
</x-app-layout>
