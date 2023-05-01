@extends('layout.template')
<!-- START FORM -->
@section('content')


<form action='{{ url('final') }}' method='post'>
@csrf 
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{ url('final') }}' class="btn btn-secondary"><< back </a>
        <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='nim' value="{{ Session::get('nim') }}" id="nim">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='name' value="{{ Session::get('name') }}" id="name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="major" class="col-sm-2 col-form-label">Major</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='major' value="{{ Session::get('major') }}" id="major">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="major" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SAVE</button></div>
        </div>
</div>
</form>
    <!-- END FORM -->
@endsection
