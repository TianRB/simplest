@extends('backend.layouts.app')

@section('title')
Index Categorias
@endsection

@section('content')
  <div class="container">
    <div class="messages">
      @if (Session::has('message'))
          {{Session::get('message')}}
      @endif
    </div>
    <a href="{{ route('categories.create') }}">create</a>
    @forelse ($list as $m)
      {{-- var_dump($m) --}}
      <p>{{ $m->display_name }}</p>
      <a href="{{ route('categories.show', $m->id) }}">show</a>
      <a href="{{ route('categories.edit', $m->id) }}">edit</a>
      <form action="{{ route('categories.destroy', ['id' => $m->id]) }}" method="POST" class="no-margin">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="delete" />
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash">delete</i></button>
      </form>
    @empty
      <p>Tabla Vacía</p>
    @endforelse
  </div>
@endsection