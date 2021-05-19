<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <div class="container">
            @include('flash::message')


        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
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
                                    <option {{ (auth()->user()->timezone) == $timezone ? 'selected' : '' }}>
                                        {{ $timezone }}
                                    </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-info">Update Record</button></a>
                            </div>

                        </form>

                        <br>
                        <br>
                        local
                        UTC {{ date('D, d-F-y H:i') }}
                        <br>
                        jamesmill
                        {{ Timezone::convertToLocal(now(), 'Y-m-d G:i', true) }}
                        <br>
                        test label timezone
                        {{ auth()->user()->timezone}}
                        <br>
                        <br>
                        <form role="form" class="card-body" action="{{route('timezone.update'),auth()->user()->id}}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('Post')
                            <div class="card-body ">
                                <select class="form-control select2" name="timezone" id="timezone">
                                    @foreach($time as $t)
                                    <option value="{{ ($t->value) }}" @if((auth()->user()->timezone) ==
                                        $t->value) selected @endif >{{ $t->label }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-info">Update</button></a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
