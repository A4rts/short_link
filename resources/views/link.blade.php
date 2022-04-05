<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Short Link</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal">Short Link</h1>
            <p class="fs-5 text-muted">Hello you can on this page write your long link and get short link</p>
        </div>
    </div>

    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="pricing-header p-0 pb-md-8 mx-auto text-center">
        <p style="color: red;" class="fs-5">{{$error}}</p>
    </div>
    @endforeach
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="/">
                            @csrf

                            <div class="row mb-3">
                                <label for="link" class="col-md-4 col-form-label text-md-end">Link</label>

                                <div class="col-md-6">
                                    <input id="link" type="text" class="form-control" name="link" placeholder="your long link">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        Convert to short link
                                    </button>

                                    <br><br><br>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br><br>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th scope="col">Orginal link</th>
                        <th scope="col">Short link</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shortlinks as $shortlink)
                    <tr>
                        <th>
                            <p class="text-break">{{ \Illuminate\Support\Str::limit($shortlink->link, 95, $end='...') }}</p>
                        </th>
                        <td>
                            <a style="color: black; font-family:sans-serif;" href="{{route('shortlink' , $shortlink->shortlink)}}" target="blank">
                                https://shorter.link/{{$shortlink->shortlink}}
                            </a>
                        </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>