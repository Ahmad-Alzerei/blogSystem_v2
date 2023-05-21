<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Css/index.css">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        ::placeholder {
            color: whitesmoke;
        }

        body {
            box-sizing: border-box;
            margin: 0px;
            padding: 0px;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(115deg, #267c84 10%, #4a0a67 90%);
        }

        input:focus {
            outline: rgba(0, 39, 79, 0.5);
        }

        input {
            display: block;
        }

        .form-container {
            height: 100vh;
            width: 100%;
            /* background: rgba(0, 25, 50, 0.45555); */
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .SIN {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
            height: 65%;
            width: 25%;
            text-align: center;
            background: rgba(123, 116, 149, 0.22);
            border-radius: 2.5%;
        }

        .Sin1,
        .Sin2 {
            width: 78%;
            height: 10%;
            caret-color: rgb(62, 55, 128);
            border-color: #7227cd;
            background-color: transparent;
            padding-left: 2.5%;
            border-radius: 7px;
            font-family: cursive;
            color: rgb(114, 103, 206);
            border-width: 1.5px;
            border-style: groove;
            font-size: .8em;
        }

        h3 {
            color: rgb(255, 255, 255);
            font-size: 160%;
            letter-spacing: 6px;
            font-family: cursive;
        }

        .form-btn {
            color: white;
            background: linear-gradient(115deg, #267c84 10%, #4a0a67 90%);
            width: 60%;
            height: 10%;
            border: none;
            cursor: pointer;
            font-size: 100%;
            letter-spacing: 3px;
            font-family: cursive;
        }

        .form-btn:hover {
            transition: 3s;
            background: linear-gradient(115deg, #4a0a67 10%, #267c84 90%);
        }

        p,
        a {
            font-family: cursive;
        }

        a {
            text-decoration: none;
            color: whitesmoke;
        }
    </style>
</head>

<body>