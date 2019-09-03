@section('title','XML Manager')
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          @include('layouts.message')
            <div class="card">
                <div class="card-header">XML Manager <span class="float-right"><a id="addnew" class="btn btn-warning btn-sm" href="#">Add new</a></span></div>

                      <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">VAST URL</th>
      <th scope="col">Total Media</th>
      <th scope="col">Type VAST</th>
      <th scope="col">Status</th>
      <th scope="col" width="200px">Action</th>
    </tr>
  </thead>
  <tbody>
      @forelse ($vasts as $vast)
    <tr class="table-active" id="tab-{{$vast->id}}">
      <td>{{$vast->id}}</td>
      <td>{{$vast->title}}</td>
      <td>{{route('vast',$vast->name)}}</td>
      <td>{{count(explode(',',$vast->media_data))}}</td>
      <td><span class="badge badge-warning">{{$vast->type}}</span></td>
      <td><span class="badge badge-success">{{$vast->status ? 'ACTIVE':'INACTIVE'}}</span></td>
      <td><a id="edited" onclick="edite({{$vast->id}},'{{$vast->title}}')" class="btn btn-info btn-sm">Modify</a> <a id="delete" onclick="dele({{$vast->id}})" class="btn btn-danger btn-sm">Delete</a></td>
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
        <h5 class="modal-title">Create New VAST</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="POST" action="">
          @csrf
      <div class="modal-body">
        <label>Title :</label>
        <input type="text" name="title" class="form-control" id="titele" placeholder="Describe here">
        <label>URL :</label>
        <input type="text" name="urltarget" class="form-control" placeholder="http://website.com">
        <label>Type :</label>
        <select name="type" class="form-control">
          <option value="Pre-roll">Pre-roll</option>
<!--           <option value="Mid-roll">Mid-roll</option>
          <option value="Past-roll">Past-roll</option> -->
        </select>
        <label>Media :</label>
        <select name="media" multiple="multiple" class="form-control medialist">
      @forelse ($medias as $media)
          <option value="{{$media->id}}">{{$media->name}} - {{$media->title}}</option>
      @empty
      <option disabled="">None</option>
      @endforelse
        </select>
        <label>Duration :</label>
        <input type="hidden" name="listmedia" value="" id="listmedia">
        <input type="text" name="duration" class="form-control" placeholder="30">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="dataadd">Create New</button>
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
    $('.close').remove();
  }
  function dele(id){
    $('#tab-'+id).remove();
  }
  $('#addnew').click(function(){
    $('#modal').modal('show');
  })
  $(function() {
  var $select = $('.medialist');
    $select.multipleSelect({
      onClose: function () {
        $('#listmedia').val($select.multipleSelect('getSelects'));
      }
    });
    $('.medialist').removeClass('form-control');

  })
</script>
@endsection