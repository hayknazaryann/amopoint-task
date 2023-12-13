@component('layouts.app')
    @section('content')
        <div class="container">
            <div class="page-content">
                <div class="import-content">
                    <div class="import-form-content">
                        <form action="{{route('import.file')}}" id="form-import" enctype="multipart/form-data">
                            <div class="form-row">
                                <label class="pb-3" for="file">Import file</label>
                                <input  type="file" name="file" id="file" accept=".txt">
                            </div>
                        </form>
                        <div class="info-row">
                            <div id="characters"></div>
                            <div id="numbers"></div>
                        </div>
                    </div>
                    <div class="import-text-content">
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endcomponent
