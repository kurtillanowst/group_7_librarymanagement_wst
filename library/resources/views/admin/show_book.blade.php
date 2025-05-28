<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')

<style class="text/css">
.table_center{
  text-align: center;
  margin: auto;
  border-color: yellowgreen;
  border: 1px solid;
  margin-top: 50px;
}
th{
  background-color: skyblue;
  padding: 10px;
  font-size: 20px;
  font-weight: bold;
  color: black;
}
td {
  padding: 8px;
  border: 1px solid #ddd;
}
</style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      @include('admin.sidebar')
      
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div>
              <table class="table_center">
                <tr>
                  <th>Book Title</th>
                  <th>Author Name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Description</th>
                  <th>Category</th>
                </tr>

                @foreach($books as $book)  <!-- Changed variable name -->
               <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author_name }}</td>
                <td>{{ $book->price }}</td>
                <td>{{ $book->Quantity }}</td>
                <td>{{ $book->description }}</td>
                <td>{{ $book->category->name ?? 'N/A' }}</td>  <!-- Assuming relationship -->
               </tr>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>

      @include('admin.footer')
  </body>
</html>