<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body{
            width: 100vw;
            height: 100vh;
        }

        a{
            text-decoration: none;
            color: inherit;
        }

        section{
            display: grid;
            justify-content: center;
        }

        h2{
            text-align: center;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }

        p{
            color: rgba(0, 0, 0, 0.83);
        }

        button{
            width: 100%;
            height: 3rem;
        }

        .post{
            background-color: rgba(127, 255, 212, 0.2);
            margin-bottom: 1rem;
            transition-duration: 0.4s;
            color: rgba(0, 0, 0, 0.92);
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            box-shadow: 0px 0px 10px 5px rgba(10, 10, 10, 0.05);
            padding: 1rem;
            width: 60vw;
            border-radius: 10px;
        }

        .post:hover{
            background-color: rgba(127, 255, 212, 0.5);
        }
    </style>
</head>
<body>
    <section>
        <a href="create"><button >Add Post</button></a>
            @foreach ($posts as $post)
                <div class="post">
                    <a href={{"post/".$post->id}}>
                        <h2>{{$post->title}}</h2>
                        <p>{{$post->body}}</p>
                    </a>
                </div>
            @endforeach
    </section>
</body>
</html>