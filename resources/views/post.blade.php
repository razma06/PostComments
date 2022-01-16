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

        .post{
            background-color: rgba(127, 255, 212, 0.2);
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


        .comment{
            padding-inline: 1rem;
            width: 100%;
            border-radius: .5rem;
            background-color: lightgray;
        }
    </style>
</head>
<body>
    <section>
            <article class="post">
                    <h2>{{$post->title}}</h2>
                    <p>{{$post->body}}</p>
            </article>

            <form action="" id="commentForm" method="POST">
                <input type="text" name="" id="name" placeholder="enter your name">
                <br><br>
                <input type="text" name="" id="comment" placeholder="comment here">
                <br>
                <input type="submit" value="add comment">
            </form>

            <div id="comments">
                @foreach ($comments as $comment)
                    <div class="comment">
                        <h3>{{$comment->user_name}}</h3>
                        <p>{{$comment->body}}</p>
                        <button id="{{$comment->id}}" onclick="deleteComment(this)">DELETE COMMENT</button>
                    </div>   
                @endforeach
            </div>
    </section>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        document.getElementById('commentForm').addEventListener("submit", function(e){
            console.log("submitted")
            e.preventDefault();
            <?php 
                    echo "var id = '$post->id';"
            ?>
            const name = document.getElementById("name").value;
            const comment = document.getElementById("comment").value;

            axios.post('', {
                posts_id: id,
                name: name,
                comment: comment
            })
            .then(function (response) {
                console.log(response);
                <?php 
                    echo "var comments = '$comments';"
                ?>
                document.getElementById('comments').insertAdjacentHTML('beforeend',`
                    <div class="comment">
                        <h3>${name}</h3>
                        <p>${comment}</p>
                        <button id=${response.data} onclick=deleteComment(this)>DELETE COMMENT</button>
                    </div>
                    `)
                
            })
            .catch(function (error) {
                console.log(error);
            });
        })

        function deleteComment(e){
            console.log(e.id)
            axios({
                method:'delete',
                url: '',
                data: {
                    'cid': e.id
                }
            })
            .then(function (response) {
                console.log(e.id)
                console.log(response)
                document.getElementById('comments').removeChild(e.parentNode)    
            })
            .catch(function (error) {
                console.log(error);
            });
        }

        
    </script>
</body>
</html>