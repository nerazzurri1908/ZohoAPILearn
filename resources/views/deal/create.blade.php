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
    <h4 class="mb-3">Create Deal record</h4>
    <form method="post" class="needs-validation" novalidate="">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="owner">Owner</label>
                <input type="text" name="Owner" class="form-control" id="owner" placeholder="382151000000266001" required="">
            </div>
            <div class="col-md-6 mb-3">
                <label for="accountName">Account Name</label>
                <input type="text" name="Account_Name" class="form-control" id="accountName" placeholder="382151000000268196" required="">
            </div>
        </div>

        <div class="mb-3">
            <label for="contactName">Contact Name</label>
            <input type="text" name="Contact_Name" class="form-control" id="contactName" placeholder="382151000000268288">

        </div>

        <hr class="mb-4">
        <div class="mb-3">
            <label for="dealName">Deal Name <span class="text-muted"></span></label>
            <input type="text" name="Deal_Name" class="form-control" id="dealName" required="" placeholder="">
        </div>

        <div class="mb-3">
            <label for="closingDate">Closing Date</label>
            <input type="date" name="Closing_Date" class="form-control" id="closingDate" required="" placeholder="">
        </div>

        <div class="mb-3">
            <label for="stage">Stage <span class="text-muted">(Optional)</span></label>
            <input type="text" name="Stage" class="form-control" id="stage" required="" placeholder="Needs Analysis">
        </div>

        <div class="row">
            <div class="col-md-5 mb-3">
                <label for="type">Type</label>
                <select name="Type" class="custom-select d-block w-100" id="type" >
                    <option value="">Choose...</option>
                    <option>New Business</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="description">Description</label>
                <input type="text" name="Description" class="form-control" id="description" placeholder="">
            </div>


            <div class="col-md-3 mb-3">
                <label for="amount">Amount</label>
                <input type="text" name="Amount" class="form-control" id="amount" placeholder="">
            </div>
            <div class="col-md-6 mb-3">
                <label for="nextStep">Next Step</label>
                <input type="text" name="Next_Step" class="form-control" id="nextStep" placeholder="">
            </div>
            <div class="col-md-6 mb-3">
                <label for="leadSource">Lead Source</label>
                <input type="text" name="Lead_Source" class="form-control" id="leadSource" placeholder="Cold Call">
            </div>
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Create</button>
    </form>
@endsection

