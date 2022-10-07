<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>Document</title>

</head>
<style>

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap');

    *{
        margin: 0;
        padding: 0;
        font-family: 'Poppins','FontAwesome 6 Free', 'FontAwesome 6 Brands';
    }
    body{
        background-color: red;
    }

    .navigation{
        position: absolute;
        height: 100%;
        width: 20px;
        background-color: blue;
        transition: all 0.2s ease-in;
        padding: 1rem;
        overflow: hidden;
    }

    .navigation:hover{
        width: 190px;
    }

    .navigation-bx{
        display: flex;
        align-items: center;
    }

    .navigation-bx i{
        font-size: 1rem;
    }
    .navigation-bx h3{
        margin-left: 2rem;
    }
</style>
<body>
    
    <div class="navigation">
        <div class="navigation-bx">
            <i class="fa fa-home"></i>
            <h3>Home</h3>
        </div>
        <div class="navigation-bx">
            <i class="fa fa-home"></i>
            <h3>Services</h3>
        </div>
        <div class="navigation-bx">
            <i class="fa fa-home"></i>
            <h3>Products</h3>
        </div>
    </div>



</body>

</html>