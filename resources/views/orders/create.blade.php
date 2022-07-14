@extends('layouts.main')

@section('content')
    @if(session('message'))
        <div style="color: green">
            {{ session('message') }}
        </div>
    @endif
    <form method="post" action="{{ route('orders.store') }}">
        {{--{{ csrf_field() }}--}}
        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
        @csrf
        <label for="deadline">Deadline</label>
        <br>
        <input name="deadline" id="deadline" value="{{ old('deadline') }}" class="@error('deadline') is-invalid @enderror">
        @error('deadline')
            <div class="error">
               Поле обязательное к заполнению
            </div>
        @enderror
        <br><br>
        <label for="product">Product</label>
        <br>
        <input name="product" id="product" value="{{ old('product') }}">
        <br><br>
        <label for="comment">Comments</label>
        <br>
        <textarea name="comment" id="comment">{{ old('comment') }}</textarea>
        <br><br>
        <input type="submit">
    </form>

    @if($errors->any())
        <div class="errors">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
@endsection

@section('header')
    <h1>Создание заказа</h1>
@endsection
