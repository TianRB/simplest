@extends('backend.layouts.app')

@section('title')
Edit Categoria
@endsection

@section('content')
  <a href="{{ route('categories.index') }}">Index</a>
  <form action="{{ route('categories.update', $m->id) }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />

    <label for="display_name">display_name</label>
    <input type="text" name="display_name" value="{{ $m->display_name }}">

    <label for="description">description</label>
    <input type="text" name="description" value="{{ $m->description }}">

    <input type="submit" value="submit">
  </form>
@endsection