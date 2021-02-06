@extends('layouts.adminLayout')

@section('title')
Job Management
@endsection()

@section('content')
<div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-5 col-md-7 col-lg-7 col-xl-6 offset-0" style="text-align: center;">
                <h4 class="text-center">Current Job Listings</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Job Title/ Position</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Some Title /Position Here @ Table</td>
                                <td><button class="btn btn-info" type="button"
                                        style="margin: 2px;border-width: 0px;">Edit</button>
                                    <button class="btn btn-danger" type="button"
                                        style="margin: 2px;border-width: 0;">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Some Title /Position Here @ Table</td>
                                <td><button class="btn btn-info" type="button"
                                        style="margin: 2px;border-width: 0px;">Edit</button>
                                    <button class="btn btn-danger" type="button"
                                        style="margin: 2px;border-width: 0;">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-7 col-md-5 col-lg-5 col-xl-6">
                <h4 class="text-center">New Job / Edit Job</h4>
                <form>
                    <div class="form-group"><label>Title / Position</label><input class="form-control" type="text">
                    </div>
                    <div class="form-group"><label>Job Type</label><select class="form-control form-control-sm">
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                            <option value="Contract">Contract</option>
                            <option value="Internship">Internship</option>
                            <option value="Remote">Remote</option>
                        </select></div>
                    <div class="form-group"><label>Pay Type</label><select class="form-control form-control-sm">
                            <option value="Hourly">Hourly</option>
                            <option value="Salary">Salary</option>
                            <option value="Contract">Contract</option>
                        </select></div>
                    <div class="form-group"><label>Pay $</label><input class="form-control form-control-sm"
                            type="number" min="5.00" max="999999.00" step="0.25"></div>
                    <div class="form-group"><label>Description</label><textarea class="form-control form-control-lg"
                            style="height: 225px;"></textarea></div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Include Editor JS files. -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js">
</script>

<!-- Initialize the editor. -->
<script>
new FroalaEditor('textarea');
</script>

@endsection()
