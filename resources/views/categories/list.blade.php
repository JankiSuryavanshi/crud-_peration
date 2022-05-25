<!DOCTYPE html>
<html lang="en">
<head>
  <title>Categories</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body>

<div class="container mt-3">
  <h2>Categories Table <a class="btn btn-info" href="/category-create">New Category</a></h2>
  @if (session()->has('success'))
  <div class="alert alert-info" role="alert">
      <span>{{  session()->get('success') }}</span>
  </div>

  @endif
  <table id="myTable" class="table table-dark">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>Title</th>
        <th>Body</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)

      <tr>
        <td>{{ $loop->index+1 }}</td>
        <td>{{ $category->tittle }}</td>
        <td>{{ $category->body }}</td>
        <td>
           <a href="/create-edit/{{ $category->id }}" class="btn btn-sm btn-info">Edit</a>
           <a href="/create-delete/{{ $category->id }}" class="btn btn-sm btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{-- {{ $categories->links()}} --}}
</div>

{{--
$(document).ready( function () {
    $('#myTable').DataTable();
} ); --}}
</body>
</html>
