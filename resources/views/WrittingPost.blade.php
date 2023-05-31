<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Make Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form style="font-family: sans-serif" action="{{url('/RecordPost')}}" method="POST">
                        <h1 style="font-size: larger">Write Your Post</h1><br>
                        @csrf
                        <label>Your Post Title</label><br>
                        <input style="outline: none;border: 1px black solid;border-radius: 3px;width: 700px" type="text" name="title"><br><br>
                        <label>Your Post Body</label><br>
                        <input style="outline: none;border: 1px black solid;border-radius: 3px;width: 700px" type="text" name="body"><br><br>
                        <input style="background-color: #1a202c;color: white;font-family: sans-serif;border-radius: 4px;padding: 6px;" type="submit" value="Publish">



                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
