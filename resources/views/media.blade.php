@section('title','Media Manager')
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          @include('layouts.message') 
            <div class="card">
                <div class="card-header">Media Manager <span class="float-right"><a  id="addnew" class="btn btn-warning btn-sm" href="#">Add new</a></span></div>

                      <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Medianame</th>
      <th scope="col">Type</th>
      <th scope="col">Media URL</th>
      <th scope="col">Status</th>
      <th scope="col" width="200px">Action</th>
    </tr>
  </thead>
  <tbody>
      @forelse ($medias as $media)
    <tr class="table-active" id="tab-{{$media->id}}">
      <td>{{$media->id}}</td>
      <td>{{$media->title}}</td>
      <td>{{$media->name}}</td>
      <td>{{$media->vidurl}}</td>
      <td><span class="badge badge-success">{{$media->status ? 'ACTIVE':'INACTIVE'}}</span></td>
      <td><a id="edited" onclick="edite({{$media->id}},'{{$media->title}}')" class="btn btn-info btn-sm">Modify</a> <a id="delete" onclick="dele({{$media->id}})" class="btn btn-danger btn-sm">Delete</a></td>
    </tr>
    @empty
    <td colspan="12" class="text-center">No Data Founded</td>
    @endforelse
  </tbody>
</table> 
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create New Media</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="POST" action="">
          @csrf
      <div class="modal-body">
        <input type="hidden" name="edited" id="formedi" value="0">
        <label>Title :</label>
        <input type="text" name="title" class="form-control" id="titele" placeholder="Title here">
        <label>Type :</label>
        <select name="name" class="form-control">
          <option value="DIRECT">Direct</option>
          <option value="DRIVE">Drive</option>
        </select>
        <label>Media URL :</label>
        <input type="text" name="vidurl" class="form-control" placeholder="https://example.com/xxx.mp4">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="dataadd">Add data</button>
      </div>
    </form>
    </div>
@endsection
@section('javascript')
<script type="text/javascript">
  function edite(id,title){
    $('#modal').modal('show');
    $('#titele').val(title);
    $('.modal-title').html('Modify Data');
    $('#dataadd').html('Modify');
    $('#formedi').val(1);
  }
  function dele(id){
    $('#tab-'+id).remove();
  }
  $('#edited').click(function(){
    $('#tab-'+id).remove();
  })
  $('#addnew').click(function(){
    $('#modal').modal('show');
  })
  // $(function() {
  //   $('select').multipleSelect()
  // })
</script>
@endsection