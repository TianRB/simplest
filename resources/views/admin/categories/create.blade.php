@extends('backend.layouts.app')

@section('title')
Create categories
@endsection

@section('content')
<a href="{{ route('categories.index') }}">Index</a>
<form action="{{ route('categories.store') }}" method="post">
  {{ csrf_field() }}

  <label for="name">name</label>
  <input type="text" name="name" value="{{ old('name') }}">

  <label for="description">description</label>
  <input type="text" name="description" value="{{ old('description') }}">

  <input type="submit" value="submit">
</form>
@endsection