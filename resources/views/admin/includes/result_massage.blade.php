@if ($errors->any())
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert border-0 bg-light-danger alert-dismissible fade show">
                <div class="text-danger">
                    <ul>
                        @foreach($errors->all() as $errorTxt)
                            <div>{{ $errorTxt }}</div>
                        @endforeach
                    </ul>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
@if(session('success'))

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert border-0 bg-light-success alert-dismissible fade show">
                <div class="text-success">{{ session()->get('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>


@endif
