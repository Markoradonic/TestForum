@extends('layouts.app')

@section('content')
    @if (auth()->check())
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a New Thread</div>

                    <div class="panel-body">
                        <form method="POST" action="/threads">
                            {{ csrf_field() }}


                            <div class="form-group">
                                <label for="threads_id">Izaberi</label>
                                <select name="threads_id" id="threads_id" class="form-control">
                                    @foreach(App\Thread::all() as $thread)


                                            <option value="{{$thread->id}}">

                                                {{$thread->title}}

                                            </option>


                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" required>
                            </div>

                            <div class="form-group">
                                <label for="body">Body:</label>
                                <textarea name="body" id="body" class="form-control" rows="8" required> {{old('body')}} </textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Publish</button>
                        </form>

                        <br>
                        @if(count($errors))

                            @foreach($errors->all() as $error)
                            <ul class="alert alert-danger">
                                <li>{{$error}}</li>
                            </ul>
                            @endforeach
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @else
        @include('auth.login')
    @endif
@endsection