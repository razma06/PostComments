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

        section{
            display: grid;
            justify-content: center;
        }


        button, input{
            width: 100%;
            height: 3rem;
        }
    </style>
</head>
<body>
    <form action="posts" method="POST">
        @csrf
        <section>
            <input type="text" name="title" id="" placeholder="enter title">
            <textarea name="body" id="body" cols="30" rows="10">enter text here</textarea>
            <input type="submit" value="Add Post">
        </section>
    </form>
</body>
</html>