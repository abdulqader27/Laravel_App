<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div style="background-color: white;width: 600px;margin: auto;height: 600px;">
         @if($user->Notifications->count() == 0) <p style="color: gray;text-align: center;font-family: sans-serif;font-size: x-large;position: relative;top: 100px;">There are no notifications</p> @endif
             @if($user->Notifications->count() != 0)  <a style="background-color: red;color: white;border-radius: 6px;padding: 10px;font-size: large;border-width: 0 20px;border-color: red;border-style: solid;position: relative;top: -40px;left: 200px;" href="{{url('/deleteNotifications')}}">Delete All</a> @endif
        @foreach($user->Notifications as $notification)
                 <a href="{{url('markAsRead' , $notification->id)}}" >
                     <div style="background-color: #e0e0e0;height: 165px;padding: 15px;font-family: sans-serif;">
                         <img style="width: 140px;margin: auto;height: 150px;border-radius: 1000px;position:relative;top: -6px;right: 220px"  src="/images/{{$notification->data['Publisher_Photo']}}" alt="cover">
                         <div style="color: black;position:relative;left: 400px;top: -157px">{{$notification->created_at}}</div>
                         @if($notification->read_at == NULL)
                             <div style="background-color: red;color: white;width: 20px;text-align: center;border-radius: 10px;position:relative;left: 555px;top: -182px;">1</div>
                         @endif
                         <h1 style="font-size: x-large;position: relative;left: 150px;top: -140px;">{{$notification->data['Publisher']}}</h1><br>
                         <p style="font-family: sans-serif;font-size: large;position: relative;left: 140px;top: -140px;">{{$notification->data['desc']}}</p>
                     </div>
                     <p style="background-color: black;height: 0.2rem">{{NULL}}</p>
                      </a>
        @endforeach
    </div>
    <Style></Style>
</x-app-layout>
