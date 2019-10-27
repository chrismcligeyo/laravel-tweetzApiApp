<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyTweetz</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    {{-- bootswatch--}}
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cerulean/bootstrap.min.css" rel="stylesheet" integrity="sha384-C++cugH8+Uf86JbNOnQoBweHHAe/wVKN/mb0lTybu/NZ9sEYbd+BbbYtNpWYAsNP" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <div class="navbar-header">
                <a href="/"class="navbar-brand">MyTweetz</a>
            </div>
        </div>

    </nav>

    <div class="container">
        @if(!empty($data))
            @foreach($data as $key => $tweet)

                <div class="card">
                    <div class="card-body">
                        <div class="card-title"><h5>{{$tweet['text']}}<i class="fas fa-heart"></i>
                                </i>{{$tweet['favorite_count']}}
                                <i class="fas fa-retweet"></i>{{$tweet['retweet_count']}}
                            </h5>

                        @if(!empty($tweet['extended_entities']['media']))
                            @foreach($tweet['extended_entities']['media'] as $image)

                                    <img src="{{$image['media_url_https']}}" style="width:100px">

                                @endforeach

                            @endif
                        </div>

                    </div>

                </div>

            @endforeach

        @else
            <p>No tweets found</p>

        @endif
    </div>
</body>
</html>