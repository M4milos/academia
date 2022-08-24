<!DOCTYPE html>
<html>
  
<head>
    <meta charset="utf-8">
    <title>
        How to make a CSS glass/blur
        effect work for an overlay?
    </title>
      
    <link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  
    <style>
        body {
            margin: 0;
            padding: 0;
        }
  
        section {
            position: relative;
            background: url(demo.jpg);
            background-attachment: fixed;
            height: 100vh;
        }
  
        section .layout {
            position: relative;
            top: 35%;
            left: 30%;
            max-width: 600px;
            padding: 50px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, .5);
            color: rgb(255, 254, 254);
        }
  
        section .layout::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: url(demo.jpg);
            background-attachment: fixed;
            filter: blur(8px);
        }
  
        section .layout h2 {
            position: relative;
        }
  
        section .layout p {
            position: relative;
        }
  
        section .layout button {
            position: relative;
        }
    </style>
</head>
  
<body>
    <section>
        <div class="layout">
            <h2>GeeksforGeeks</h2>
            <p>
                It is a computer science portal for geeks.
                It is a platform where you can learn and
                practice programming problems. It contains
                programming content, web technology content,
                and some other domain content also.
            </p>
  
            <button class="btn btn-outline-danger">
                Button
            </button>
        </div>
    </section>
</body>
  
</html>