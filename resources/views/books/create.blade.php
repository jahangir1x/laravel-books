@extends('layout')


@section('page-content')
    <h2>New Book</h2>

    <form method="post" action="{{route('books.store')}}" >

        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" name="title" value="{{old('title')}}"  placeholder="Enter Title">
            @if($errors->first('title'))
                <div class="alert alert-danger" role="alert">{{$errors->first('title')}}</div>
            @endif
            </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Author</label>
            <input type="text" class="form-control" name="author" value="{{old('author')}}"  placeholder="Enter Auther">
            <div>{{$errors->first('author')}}</div>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">ISBN</label>
            <input type="text" class="form-control" name="isbn" value="{{old('isbn')}}"  placeholder="Enter ISBN">
            <div>{{$errors->first('isbn')}}</div>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Stock</label>
            <input type="text" class="form-control" name="stock" value="{{old('stock')}}"  placeholder="Enter Stock">
            <div>{{$errors->first('stock')}}</div>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Price</label>
            <input type="text" class="form-control" name="price" value="{{old('price')}}"  placeholder="Enter Price">
            <div>{{$errors->first('price')}}</div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('books.index')}}" class="btn btn-danger">Back</a>
    </form>


@endsection
