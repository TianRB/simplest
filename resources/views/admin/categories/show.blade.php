@extends('layouts.app')
@section('title')
Show de Tipos de Platillo
@endsection
@section('content')
<a href="{{ route('tipos_platillo.index') }}">index</a>
  {{-- var_dump($tipoPlatillo) --}}
  <p>{{ $tipoPlatillo->display_name }}</p>
  <a href="{{ route('tipos_platillo.edit', $tipoPlatillo->id) }}">edit</a>
  <form action="{{ route('tipos_platillo.destroy', ['id' => $tipoPlatillo->id]) }}" method="POST" class="no-margin">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="delete" />
    <button type="submit" class="btn btn-danger"><i class="fa fa-trash">delete</i></button>
  </form>
@endsection