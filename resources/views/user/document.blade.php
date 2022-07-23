@extends('layouts.master')

@section('title', 'Document')
@section('heading', 'Document')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h4>My Documents</h4>
                    <a href='#' class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#documentModel">Add
                        <i class="fa fa-plus"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Added By</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documents as $document)
                                    <tr>

                                        <td>
                                        <a href="{{asset('images/'.$document->doc_file)}}" class="btn btn-link" target="_blank">{{ $document->doc_name }}</a>
                                        </td>
                                        <td>{{ $document->created_at }}</td>
                                        <td>{{ $document->updated_at }}</td>
                                        <td>{{ $document->user->firstName }}</td>


                                        <td>
                                            <div class="row float-right">

                                                <div class="col-sm-3">
                                                    <form id="deleteDocumentForm{{ $document->id}}"
                                                        action="{{ route('Document.destroy', $document->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm" type="button"
                                                            onclick="javascript:(confirm('Do you want to delete {{ $document->doc_name }}?'))?
                                                document.getElementById('deleteDocumentForm{{ $document->id}}').submit():'' "><i
                                                                class="fa fa-trash"></i></button>
                                                    </form>
                                                </div>
                                                <div class="col-sm-3">
                                                    <a href="javascript:;" class="btn btn-info btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#documentModelEdit{{ $document->id }}"><i
                                                            class="fa fa-edit"></i>
                                                    </a>
                                                </div>
                                             </div>




                                        </td>

                                    </tr>

                                    <div class="modal fade" id="documentModelEdit{{ $document->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit
                                                            {{ $document->doc_name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true" class="ti-close"></span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                  <form name="editDoc" action="{{ route('Document.update', $document->id) }}" method="POST" enctype="multipart/form-data" >
                                            @method('PUT')
                                            @csrf
                                                        <div class="form-group">
                                                            <label>Document </label>
                                                            <select class="form-control" name="doc_name">
                                                                @php
                                                                    $eduDropdown = App\Models\Dropdown::with('items')
                                                                        ->where('name', 'Clients Documents')
                                                                        ->first();
                                                                @endphp
                                                                @foreach ($eduDropdown->items as $row)

                                                                    <option value="{{ $row->item }}" <?=( $document->doc_name==$row->item)?'selected':'';?>>
                                                                        {{ $row->item }}
                                                                    </option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Document </label>
                                                            <input type="file" name="file"
                                                            class="form-control">
                                                        </div>



                                                            </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button onclick="$('form[name=editDoc]').submit();" class="btn btn-success">Update</button>

                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="documentModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Document</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
               
                    <div class="modal-body">
 <form   action="{{ route('Document.store') }}" method="POST" enctype="multipart/form-data"  class="dropzone" id="dropzone">
                    @csrf
                        <div class="form-group">
                            <label>Document </label>
                            <select class="form-control" name="doc_name">
                                @php
                                    $eduDropdown = App\Models\Dropdown::with('items')
                                        ->where('name', 'Clients Documents')
                                        ->first();
                                @endphp
                                @foreach ($eduDropdown->items as $row)
                               
                                    <option value="{{ $row->item }}"

                                     >
                                        {{ $row->item }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        
                     
                    </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" onclick="$('#dropzone').submit();">Add</button>

                    </div>
              
            </div>
        </div>

    </div>
@endsection
@section('scripts')

@endsection
@section('script')
<script type="text/javascript">
        Dropzone.options.dropzone =
         {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 5000,
            success: function(file, response) 
            {
                console.log(response);
            },
            error: function(file, response)
            {
               return false;
            }
};
</script>
@endsection