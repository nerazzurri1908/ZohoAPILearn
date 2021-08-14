@extends('layouts.app')

@section('content')

    <h4 class="mb-3">Create Bulk Read Job</h4>
    <form method="post" class="needs-validation" novalidate="">

        @csrf
        <div class="row">
            <div class="col-md-5 mb-3">
                <label for="moduleApiName">Module Api Name</label>
                <select name="module_api_name" class="custom-select d-block w-100" id="moduleApiName" required="">
                    <option value="">Choose...</option>
                    <option>Deals</option>
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label for="page">Page number</label>
                <input type="text" name="page" class="form-control" id="Page" value="1">
            </div>
        </div>


        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Create</button>
    </form>
@endsection

