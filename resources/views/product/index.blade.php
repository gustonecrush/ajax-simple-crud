<!DOCTYPE html>
<html lang="en">
<head>
    {{-- Meta --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- Title --}}
    <title>Products</title>

    {{-- Styles --}}
    <style>
            * {
                font-family: 'Poppins', sans-serif;
            }

            .data-user {
                border-radius: 20px;
                box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
                padding: 50px 30px;
                display: flex;
                flex-direction: column;
                width: 500px;
            }

            .data-user button {
                width: 100px;
                margin-top: 20px;
            }

            .data-top {
                width: 500px;
            }

            .data-customer, .data-top {
                border-radius: 20px;
                box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
                padding: 50px 30px;
            }

            td, th {
                text-align: center;
            }

    </style>
</head>
<body>

    {{-- Main Content --}}
    <div class="container mt-5 data-customer">
        <div class="row">
            <div class="col-lg-8">
                <h1>CRUD USING AJAX</h1>
                <button type="button" class="btn btn-primary" onclick="create()">
                    + Add Product
                </button>
                <div id="read" class="mt-4"></div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal" tabindex="-1" id="addProduct">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="pageCreate" class="p-2"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- jQuery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    {{-- Script --}}
    <script>
        $(document).ready(function() {
            read();
        })

        function create() {
            $.get(`{{ url('create') }}`, {}, function(data, status) {
                $('.modal-title').html('Add Product');
                $('#pageCreate').html(data);
                $("#addProduct").modal('show');
            })
        }

        function read() {
            $.get("{{ url('read') }}", {}, function(data, status) {
                $("#read").html(data);
            })
        }

        function store() {
            let name = $("#name").val();
            $.ajax({
                url: '/store',
                type: 'get',
                data: "name=" + name,
                success: function(data) {
                    $('.btn-close').click();
                    read();
                }
            });
        }

        function show(id) {
            $.get(`{{ url('show') }}/` + id, {}, function(data, status) {
                $('.modal-title').html('Edit Product');
                $('#pageCreate').html(data);
                $("#addProduct").modal('show');
            })
        }

        function reset() {
            $('#name').val('');
        }

        function update(id) {
            let name = $("#name").val();
            $.ajax({
                url: '/update/' + id,
                type: 'get',
                data: "name=" + name,
                success: function(data) {
                    $('.btn-close').click();
                    read();
                }
            });
        }

        function destroy(id) {
            confirm("Are you sure wanna delete this product?");
            $.ajax({
                url: '/destroy/' + id,
                type: 'get',
                data: "name=" + name,
                success: function(data) {
                    $('.btn-close').click();
                    read();
                }
            })
        }
    </script>
    
</body>
</html>