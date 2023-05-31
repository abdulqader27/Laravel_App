<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @foreach($posts as $post)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div style="font-family: sans-serif;" class="p-6 text-gray-900">
                    <a class="Pub" href="{{url("/Reflect/$post->Publisher")}}" style="color: gray;font-family: sans-serif;">{{$post->Publisher}}:</a>
                    <h1 style="color: red;text-align: center;font-size: xxx-large;font-family: sans-serif;">{{$post->title}}</h1><br>
                    <p style="font-family: sans-serif;font-size: x-large">{{$post->body}}</p><br>
                    <a style="color: white;background-color: black;border-radius: 6px;padding: 6px;position:relative;left: 550px;font-family: sans-serif;" href="{{url("/Comments/$post->id")}}">Comments</a>
                    <?php $Counter = 0; ?>
                    <a style="color: black;background-color: rgb(190, 189, 189);border-radius: 6px;padding: 6px;position:relative;left: 550px;font-family: sans-serif;" href="{{url("/RecordLike/$post->id")}}">
                        <img style="display: inline;width: 20px;height: 20px;" src="/images/Like.png" alt="cover"/>
                        @foreach($post->reactions as $reaction)
                           <?php
                            $Counter++;

                            ?>
                        @endforeach
                        {{$Counter}}
                    </a>

                <Style>body {color: #146abe}</Style>
                </div>
            </div>
        </div>
    </div>
        <div style="background-color: white;width: 600px;position:relative;left: 550px;height: 300px;display: none;" class="CommentPanel">
            Hi there
        </div>
    @endforeach
    <Style>.Pub:hover{text-decoration: underline}</Style>
</x-app-layout>
