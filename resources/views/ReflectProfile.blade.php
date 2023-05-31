<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <div style="background-color: #c2baba;width: 600px;margin: auto;height: 740px;">
        <div style="background-color: #146abe;height: 120px;"></div>
        <img style="width: 140px;margin: auto;height: 150px;border-radius: 1000px;position:relative;top: 20px;"  src="/images/{{$TheUser->ProfilePhoto}}" alt="cover">
        <h1 style="text-align: center;font-family: sans-serif;font-size: xxx-large;position:relative;top: 20px;">{{$TheUser->name}}</h1><br>
        <h1 style="text-align: center;font-family: sans-serif;color: gray">{{$TheUser->Wisdom}}</h1>
        <br>
        <br>
        <br>
        <div>
        <p style="font-family: sans-serif;font-size: x-large">BirthDay:{{$TheUser->Birthday}}</p><br>
        <p style="font-family: sans-serif;font-size: x-large">Country:{{$TheUser->Country}}</p><br>
        <p style="font-family: sans-serif;font-size: x-large">City:{{$TheUser->City}}</p><br>
        <p style="font-family: sans-serif;font-size: x-large">Gender:{{$TheUser->Gender}}</p><br>
        <p style="font-family: sans-serif;font-size: x-large">Work:{{$TheUser->work}}</p><br>

        </div>
    </div>
    <Style></Style>
</x-app-layout>

