<h4 class="d-flex justify-content-between align-items-center mb-3">
    <span class="text-muted">CRM API</span>
</h4>
<ul class="list-group mb-3">
    <li class="list-group-item d-flex justify-content-between lh-condensed">
        <div>
            <h6 class="my-0"><a class="p-2" href="{{ route('deal_create') }}">Create Deal record</a></h6>
        </div>
    </li>
    <li class="list-group-item d-flex justify-content-between lh-condensed">
        <div>
            <h6 class="my-0"><a class="p-2" href="{{ route('job_create') }}">Create Bulk Read Job</a></h6>
        </div>
    </li>
    <li class="list-group-item d-flex justify-content-between lh-condensed">
        <div>
            <h6 class="my-0"><a class="p-2" href="{{ route('job_details') }}">Status of the Bulk Read Job</a></h6>
        </div>
    </li>
    <li class="list-group-item d-flex justify-content-between bg-light">
        <div class="text-success">
            <h6 class="my-0"><a class="p-2" href="{{ route('job_result') }}">Download Bulk Read Result</a></h6>
        </div>
    </li>
</ul>

<h4 class="d-flex justify-content-between align-items-center mb-3">
    <span class="text-muted">Api-Console Application config</span>
</h4>
<ul class="list-group mb-3">
    <li class="list-group-item d-flex justify-content-between lh-condensed">
        <div>
            <h6 class="my-0"><a class="p-2" href="{{ route('zoho_config') }}">Configurations</a></h6>
        </div>
    </li>
</ul>


<h4 class="d-flex justify-content-between align-items-center mb-3">
    <span class="text-muted">Generate Access Token by Auth Token</span>
</h4>
<form action="{{ route('access_token_generate') }}" method="post" class="card p-2">
    @csrf
    <div class="input-group">
        <input type="text" class="form-control" name="auth_token" placeholder="Auth Token">
        <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Generate</button>
        </div>
    </div>
</form>
