@extends('layout')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
@endsection

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold is-size-4">New article</h1>

            <form action="/articles" method="post">
                @csrf
                <div class="field">
                    <label for="" class="label">Title</label>
                    <div class="control">
                        <input type="text" class="input @error('title') is-danger @enderror" name="title" id="title" value="{{old('title')}}">

                        @error('title')
                            <p class="help is-danger">{{$errors->first('title')}}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="" class="label">Excerpt</label>
                    <div class="control">
                        <textarea type="text" class="textarea @error('excerpt') is-danger @enderror" name="excerpt" id="excerpt" >{{old('excerpt')}}</textarea>

                        @error('excerpt')
                            <p class="help is-danger">{{$errors->first('excerpt')}}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="" class="label">Text</label>
                    <div class="control">
                        <textarea type="text" class="textarea @error('body') is-danger @enderror" name="body" id="body" >{{old('body')}}</textarea>

                        @error('body')
                            <p class="help is-danger">{{$errors->first('body')}}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="" class="label">Add tags</label>
                    <div class="select is-mutiple control">
                        <select
                            multiple
                            name="tags[]"
                        >
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>

                        @error('tags')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>

                    <div class="control">
                        <button class="button is-text">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
