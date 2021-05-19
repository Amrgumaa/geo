<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                    <br>
                    local
                    UTC {{ date('D, d-F-y H:i') }}
                    <br>
                    jamesmill
                    {{ Timezone::convertToLocal(now(), 'Y-m-d G:i', true) }}
                    <br>
                    jamesmill location timezone
                    {{ auth()->user()->timezone}}
                    <br>
                    <form role="form" class="card-body" action="{{route('timezone.update'),auth()->user()->id}}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method('Post')
                        <div class="card-body ">
                            <select class="form-control select2" name="timezone" id="timezone">
                                @foreach(timezone_identifiers_list() as $timezone)
                                <option {{ (auth()->user()->timezone) == $timezone ? 'selected' : '' }}>{{ $timezone }}
                                </option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-info">Update Record</button></a>
                        </div>

                    </form>

                    <br>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
