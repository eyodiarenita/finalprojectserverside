@extends('layout.template')
        <!-- START DATA -->
        @section('content')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <!-- SEARCH FORM  -->
            <div class="pb-3">
              <form class="d-flex" action="{{ url('final') }}" method="get">
                  <input class="form-control me-1" type="search" name="keywords" value="{{ Request::get('keywords') }}" placeholder="Enter keywords" aria-label="Search">
                  <button class="btn btn-secondary" type="submit">Search</button>
              </form>
            </div>
            
            <!-- ADD DATA BUTTON -->
            <div class="pb-3">
              <a href='{{ url('final/create') }}' class="btn btn-primary">+ Add Data</a>
            </div>
      
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-3">NIM</th>
                        <th class="col-md-4">Name</th>
                        <th class="col-md-2">Major</th>
                        <th class="col-md-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = $data->firstItem() ?>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->nim }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->major }}</td>
                        <td>
                            <a href= '{{ url('/final/edit/'.$item->nim) }}' class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Are you sure want to delete the data?')" class='d-inline' action="{{ url('project/'.$item->nim) }}" method="post">
                                @csrf
                                @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
                    
                </tbody>
            </table>
        {{ $data->withQueryString()->links() }}   
      </div>
      <!-- END DATA --> 
        @endsection