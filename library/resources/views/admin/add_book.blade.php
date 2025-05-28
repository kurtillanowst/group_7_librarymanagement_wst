<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')

<style type="text/css">

  .div_center
  {
text-align: center;
margin: auto;
  }
.title
{
 color: white;
    padding: 35px;
    font: size 40px;
    font-weight: bold;
}
  label
  {
    display: inline-block;
    width: 200px;
  }
  .div_pad
  {
    padding: 15px;
  }

</style>

  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
   
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid"></div>

          <div class="div_center">

<h1 class="title">Add Books</h1>

<form action="{{ url('store_book') }}" method="" enctype="multipart/form-data">

@csrf

<div class="div_pad">
  <label>Book Title</label>
  <input type="tex" name="book_name">
</div>

<div class="div_pad">
  <label>Author name</label>
  <input type="tex" name="author_name">
</div>

<div class="div_pad">
  <label>Price</label>
  <input type="tex" name="price">
</div>

<div class="div_pad">
  <label>Quantity</label>
  <input type="number" name=">quantity">
</div>


<div class="div_pad">
  <label>Description</label>
  <textarea name="description"></textarea>
</div>

<div class="div_pad">
<label>Category</label>
<select name="category" required>
    <option value="">Select Category</option>
    @foreach($data as $category)
        <option value="{{ $category->id }}">{{ $category->cat_title }}</option>
    @endforeach
</select>
</div>



<div class="div_pad">
  <input type="submit" value="Add book" class="btn btn-info">
</div>


</form>

</div>
      
</div>
</div>
</div>

      @include('admin.footer')
  </body>
</html>