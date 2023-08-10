@extends('layouts.master')

@section('content')
    <div class="row mb-3">
        <div class="col-lg-12 d-flex">
            <div class="card card-body flex-fill">
                <div class="page-title-box">
                    <center>
                        <h4 class="page-title">Upload Akad Kredit </h4>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <form method="post" action="{{ route('debitur.kirimrevisi', $debitur->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-lg-4 d-flex">
                <div class="card card-body flex-fill">
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-5">
                            <label style="font-weight:bold;">Nama
                                Debitur</label>
                        </div>
                        <div class="col-md-8 col-6">
                            {{ $debitur->name }}
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-5">
                            <label style="font-weight:bold;">Nomor Debitur</label>
                        </div>
                        <div class="col-md-8 col-6">
                            {{ $debitur->noDebitur }}
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-5">
                            <label style="font-weight:bold;">Jangka Waktu</label>
                        </div>
                        <div class="col-md-8 col-6">
                            {{ $debitur->jwk }} Bulan
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-5">
                            <label style="font-weight:bold;">Tanggal Realisasi</label>
                        </div>
                        <div class="col-md-8 col-6">
                            {{ date('d-m-Y') }}
                        </div>
                    </div>
                    <hr />
                    <br />
                </div>
            </div>
            <div class="col-lg-4 d-flex">
                <div class="card card-body flex-fill">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-12 col-form-label nominal">Tanggal Akad
                        </label>
                        <div class="col-md-8 col-6">
                            {{ $debitur->tglAkad }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-12 col-form-label nominal">Keterangan
                        </label>
                        <div class="col-md-8 col-6">
                            {{ $debitur->keterangan }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-8 col-form-label">Upload Akad Kredit
                            Kredit dan foto akad</label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="needsclick dropzone" id="document-dropzone">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('scripts')
    <script>
        function myFunction() {
            var x = document.getElementById("NoSpk");
            x.value = x.value.toUpperCase();
        }

        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: '{{ route('debitur.akadstoreMedia') }}',
            maxFilesize: 10, // MB
            acceptedFiles: '.image/*,application/pdf,.rar,.zip',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="akad[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function(file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="akad[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($project) && $project->document)
                    var files =
                        {!! json_encode($project->document) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="akad[]" value="' + file.file_name + '">')
                    }
                @endif
            }
        }
    </script>
@endpush
