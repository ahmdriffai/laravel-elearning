<!-- Modal -->
{!! Form::open(['route' => 'admin.siswa.import', 'method' => 'post', 'files' => true]) !!}

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            {!! Form::label('file', 'File Import'); !!}
            {!! Form::file('file', ['class' => 'form-control']) !!}
            <small id="emailHelp" class="form-text text-danger">* apabila kelas tidak terdaftar maka data tidak akan disimpan dalam database</small>
        </div>
        <a href="{{ asset('elearning_template_import_siswa.xlsx') }}" class="btn btn-sm btn-success">Download Template</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

{!! Form::close() !!}
