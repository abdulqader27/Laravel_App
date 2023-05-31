<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div >
                    <form action="{{url('/change')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input id="lv" style="background-color: red;display: none" type="file"  name="ProfilePhoto"/><label style="cursor: pointer;padding: 10px;color: white;background-color: black;border-radius: 6px;position:relative;top: 230px;left: 490px;" for="lv">Change Your photo</label><br><br>
                        <img style="width: 140px;margin: auto;height: 150px;border-radius: 1000px;position:relative;top: -30px;left: 280px"  src="/images/{{Auth::User()->ProfilePhoto}}" alt="cover">
                        <br><br>
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </form>
                    </div>
                </div>
            </div>



            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form action="{{url('/SetMoreData')}}" method="POST">
                        @csrf
                        <h1 style="font-size: large;font-family: sans-serif">Complete Your Profile , Set Your Data</h1><br>
                     <label for="x">Country</label>
                    <select name="country" id="x" style="width: 600px;border-radius: 4px;">
                        <option>Syria</option>
                        <option>USA</option>
                        <option>UK</option>
                        <option>UAE</option>
                        <option>Egypt</option>
                        <option>Jordan</option>
                        <option>Kingdom Of Saudi Arabia</option>
                        <option>Japan</option>
                    </select><br><br>
                        <label for="n">City</label><br>
                        <input style="width: 600px;border-radius: 4px;" id="n" type="text" name="City"/><br><br>

                        <label>Date</label><br>
                        <select name="year" style="width: 100px;border-radius: 4px;">
                            <option>2023</option>
                            <option>2022</option>
                            <option>2021</option>
                            <option>2020</option>
                            <option>2019</option>
                            <option>2018</option>
                            <option>2017</option>
                            <option>2016</option>
                            <option>2015</option>
                            <option>2014</option>
                            <option>2013</option>
                            <option>2012</option>
                            <option>2011</option>
                            <option>2010</option>
                            <option>2009</option>
                            <option>2008</option>
                            <option>2007</option>
                            <option>2006</option>
                            <option>2005</option>
                            <option>2004</option>
                            <option>2003</option>
                            <option>2002</option>
                            <option>2001</option>
                            <option>2000</option>
                            <option>1999</option>
                            <option>1998</option>
                            <option>1997</option>
                            <option>1996</option>
                            <option>1995</option>
                            <option>1994</option>
                        </select>
                        <select name="month" style="width: 80px;border-radius: 4px;">
                            <option>12</option>
                            <option>11</option>
                            <option>10</option>
                            <option>9</option>
                            <option>8</option>
                            <option>7</option>
                            <option>6</option>
                            <option>5</option>
                            <option>4</option>
                            <option>3</option>
                            <option>2</option>
                            <option>1</option>
                        </select>
                        <select name="day" style="width: 80px;border-radius: 4px;">
                            <option>30</option>
                            <option>29</option>
                            <option>28</option>
                            <option>27</option>
                            <option>26</option>
                            <option>25</option>
                            <option>24</option>
                            <option>23</option>
                            <option>22</option>
                            <option>21</option>
                            <option>20</option>
                            <option>19</option>
                            <option>18</option>
                            <option>17</option>
                            <option>16</option>
                            <option>15</option>
                            <option>14</option>
                            <option>13</option>
                            <option>12</option>
                            <option>11</option>
                            <option>10</option>
                            <option>9</option>
                            <option>8</option>
                            <option>7</option>
                            <option>6</option>
                            <option>5</option>
                            <option>4</option>
                            <option>3</option>
                            <option>2</option>
                            <option>1</option>
                        </select><br><br>

                        <label for="z">Work</label>
                        <input value="{{old('work')}}" style="width: 600px;border-radius: 4px;" type="text" name="work"/><br><br>
                        <label for="kj">Wisdom</label><br>
                        <input type="text" name="Wisdom" style="width: 600px;border-radius: 4px;"/><br><br>
                        <label>Gender:</label>
                        <label for="cx">Male</label>
                        <input id="cx" type="radio" name="Gender" value="Male"/>
                        <label for="vc">Female</label>
                        <input id="vc" type="radio" name="Gender" value="Female"/>
                        <br><br>
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </form>
                </div>
            </div>


            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
