@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <h4 class="mb-3">Status of the Bulk Read Job</h4>
    <form method="post" class="needs-validation" novalidate="">
	@csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="jobId">Job id</label>
                <input type="text" name="jobId" class="form-control" id="jobId" required="">
            </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Show</button>
    </form>
@endsection

