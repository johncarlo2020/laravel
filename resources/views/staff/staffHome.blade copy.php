@extends('layouts.app')
   
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css">

<div class="container " style="padding-top:6em">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Staff</div>
                <div class="card-body">
                <h2 class="mb-5 mt-2"> Welcome Back ! , {{ Auth::user()->username }}</h2>

                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th><center>Stab No.</center></th>
                                <th><center>Fullname</center></th>
                                <th><center>School</center></th>
                                <th><center>Year</center></th>
                                <th><center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Row 1 Data 1</td>
                                <td>Row 1 Data 1</td>
                                <td>Row 1 Data 1</td>
                                <td>Row 1 Data 1</td>
                                <td>
                                    <!-- <button class="btn btn-primary">Detailed Info</button> -->
                                    <button class="btn btn-success">Files</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Row 2 Data 1</td>
                                <td>Row 1 Data 1</td>
                                <td>Row 1 Data 1</td>
                                <td>Row 1 Data 1</td>
                                <td>
                                    <!-- <button class="btn btn-primary">Detailed Info</button> -->
                                    <button class="btn btn-success">Files</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
<script>
let table = new DataTable('#table_id', {
    // options
});
</script>
@endsection