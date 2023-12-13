@component('layouts.app')
    @section('content')
        <div class="container">
            <div class="page-content import-content">
                <div class="import-form-content">
                    <form action="{{route('import.file')}}" id="form-import" enctype="multipart/form-data">
                        <div class="form-row">
                            <label class="pb-3" for="file">Import file</label>
                            <input  type="file" name="file" id="file" accept=".txt">
                        </div>
                    </form>
                </div>
                <div class="import-text-content">
                </div>
            </div>
        </div>
    @endsection
@endcomponent
