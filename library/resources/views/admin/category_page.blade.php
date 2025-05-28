
@extends('admin.header')

@section('content')
<div class="container">
    <h2>Categories</h2>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Category Title</th>
        </tr>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->cat_title }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection