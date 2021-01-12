<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>LARAVEL, AJAX CRUD</title>
</head>
<body>
    <div class="container" style="padding-top: 30px;">
        <div class="card mb-4"> 
            <div class="card-body">
                <h5 class="card-title text-center">AJAX CRUD</h5> 
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-title">
                        <h4 class="text-center pt-2">All Teachers</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Institution</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody id="tbody">
                                 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h6 class="text-center pt-2" id="title_add">Add New Teacher</h6>
                        <h6 class="text-center pt-2" id="title_update">Update Teacher</h6>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Teacher Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Designation</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div> 
                            <div class="mb-3">
                                <label for="institution" class="form-label">Institution</label>
                                <input type="text" class="form-control" id="institution" name="institution">
                            </div> 
                            <button type="submit" id="btn_add" class="btn btn-success">Save</button>
                            <button type="submit" id="btn_update" class="btn btn-warning">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script> 
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script>  
        $( document ).ready(function() {
            $("#title_add").show();
            $("#title_update").hide(); 
            $("#btn_update").hide();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
                }
            })

            function allData() {
                $.ajax({
                    type:'GET',
                    dataType: 'json',
                    url:'/teacher/all', 
                    success:function(res) {
                        // $("#msg").html(data.msg);
                        var data = ""
                        $.each(res, function(key, value){
                            data = data+ "<tr>";
                            data = data+ "<td>"+value.id+"</td>";
                            data = data+ "<td>"+value.name+"</td>";
                            data = data+ "<td>"+value.title+"</td>";
                            data = data+ "<td>"+value.institute+"</td>";
                            data = data+ "<td>"+'<td><a type="button" class="btn btn-warning btn-sm">Edit</a><a type="button" class="btn btn-danger btn-sm">Delete</a></td>'+"</td>";
                            data = data+ "</tr>";
                        })
                        $("#tbody").html(data);
                    }
                });
            }
            allData();
        });
    </script>
</body>
</html>