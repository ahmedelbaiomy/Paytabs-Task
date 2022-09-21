<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <title>Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
    <main>
          
    <div class="container dropdown">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h2 class="mb-5">Task Paytabs AJAX Dependent Categories & Sub Categories Dropdown</h2>
                <form>
                    <div class="form-group mb-5">
                        <select  id="categories" class="form-control form-control-lg">
                            <option value="">Select Main Categories</option>
                            @foreach ($mainCategories as $data)
                            <option value="{{$data->id}}">
                                {{$data->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <select id="sub-categories" class="form-control form-control-lg">
                        </select>
                    </div>
                    <div class="form-group">
                        <select id="sub-sub-categories" class="form-control form-control-lg">
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#categories').on('change', function () {
                var idCategory = this.value;
                $("#sub-categories").html('');
                $.ajax({
                    url: "{{url('fetch-subCategories')}}",
                    type: "POST",
                    data: {
                        category_id: idCategory,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#sub-categories').html('<option value="">Select sub Categories</option>');
                        $.each(result, function (key, value) {
                            $("#sub-categories").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#sub-sub-categories').html('<option value="">Select Sub Sub Categories</option>');
                    }
                });
            });
            $('#sub-categories').on('change', function () {
                var idSubCategory = this.value;
                $("#sub-sub-categories").html('');
                $.ajax({
                    url: "{{url('fetch-subSubCategories')}}",
                    type: "POST",
                    data: {
                        sub_category_id: idSubCategory,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#sub-sub-categories').html('<option value="">Select Sub Sub Categories</option>');
                        $.each(res, function (key, value) {
                            $("#sub-sub-categories").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
    </main>
  </body>
</html>
