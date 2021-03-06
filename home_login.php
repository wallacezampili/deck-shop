<!DOCTYPE html>
<html lang="en">

<head>

    <title> Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
        #nav {

            background-color: black;
            height: 50px;



        }

        #show {

            height: 400px;

        }

        #show {

            height: 400px;

        }

        #show2 {
            height: 300px;
            width: 200px;



        }

        #prod {
            height: 300px;
            width: 250px;



        }
    </style>
</head>

<body>

    
    <?php

    include "mysqli.php";

    $email = $_POST["email"];
    $password = $_POST["password"];

    $select = "SELECT * FROM userdata WHERE email = '$email' AND password = '$password';";
    if ($results = mysqli_query($con, $select)) {

        if ($results->num_rows > 0) {
            $user = $results->fetch_assoc();

            session_start();
            
            $_SESSION["name"] = $user["name"];
            $_SESSION["lastname"] = $user["lastname"];
            $_SESSION["password"] = $user["password"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["id"] = $user["id"];

        } else {

    ?>


            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                E-mail ou senha inválidos ! <a href="login.php" class="alert-link">Tente novamente.</a>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>





    <?php
        }
    } else {

        echo $con->error;
    }




    ?>

    
    <!-- NAVBAR -->

    <?php 
    include "mysqli.php";
    if(isset($_SESSION["id"]))
    {
        $sql = "SELECT adm from userdata WHERE id = ".$_SESSION["id"];
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
        $row = $result->fetch_assoc();
        $adm = $row["adm"];
    
    }else
    {

        $adm = 0;

    }
    
    ?>

    <header>


        <ul class="nav" id="nav">

            <li class="nav-brand mr-5 my-auto ml-2">

                <img src="img/logo.png" id="logo">

            </li>


            <li class="nav-item my-auto">

                <a class="nav-link text-light" id="item" href="#">Home</a>

            </li>

            <li class="nav-item my-auto">

                <a class="nav-link text-light" href="items.php">Itens</a>

            </li>

            <?php if($adm > 0) 
            { ?>

                <li class="nav-item dropdown my-auto">
                    <a class="nav-link dropdown-toggle text-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Gerenciar</a>
                    <div class="dropdown-menu">

                        <a class="dropdown-item" href="item_register.php">Cadastrar Produto</a>
                        <a class="dropdown-item" href="adm.php">Cadastrar Administrador</a>
                        <a class="dropdown-item" href="view.php">Visualizar Produtos</a>
                        <a class="dropdown-item" href="view_users.php">Visualizar usuários</a>


                    </div>
                </li>

            <?php } ?>

            <li class="nav-item ml-auto my-auto">

                <?php
                
                if (isset($_SESSION["name"])) {

                    echo "<a class=\"nav-link text-light\" href=\"profile.php\">" . $_SESSION["name"] . "</a>";
                } else {
                    echo '<a class="nav-link" href="login.php"><button type="button" class="btn btn-sm btn-outline-light">Login</button></a>';
                }
                ?>

            </li>
        </ul>




    </header>

    <!--Carrousel-->

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" id="show">

            <div class="carousel-item active ">

                <img class="d-block w-100" src="img/show1.png" alt="First slide">

            </div>

        </div>


    </div>

    <!-- Apresentação -->



    <div class="container my-5 py-5 z-depth-1">


        <!--Section: Content-->
        <section class="px-md-5 mx-md-5 text-center text-lg-left">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-7 order-md-2">

                    <br>
                    <h2 class="font-italic">Conheça o nosso criador </h2>
                    <br>
                    <p class="font-italic">

                        Desde pequeno sempre sonhei em ser mágico, mas percebo grandes dificuldades
                        ao buscar sobre conhecimentoe equipamento para praticar, portanto venho por
                        esse site para incentivar mágicos que, assim como eu, são fascinados por cartomagia,
                        vendendo baralhos de qualidades por preços acessíveis

                    </p>

                    <br>




                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4 order-md-1">

                    <!--Image-->
                    <div class="view overlay z-depth-1-half">

                        <img src="img/show3.jpg" alt="" id="show2">


                    </div>

                </div>


            </div>



        </section>



    </div>

    <!-- Apresentação dos produtos -->

    <div class="container my-5 py-5 z-depth-1">

        <section class="px-md-5 mx-md-5 text-center text-lg-left">

            <div class="row">

                <div class="col-md-12">

                    <h2 class="font-italic">Conheça o nossos produtos</h2>
                    <br>
                    <p class="font-italic">

                        Baralhos de qualidade para cardistry, mágica e jogos. Para o uso profissional ou casual. Aqui nós trabalhamos com as marcas de baralhos mais famosas
                        e com maior qualidade.
                    </p>

                </div>

                <br>

                <!--Grid column-->
                <div class="col-md-4 order-md-1">

                    <!--Image-->
                    <div class="view overlay z-depth-1-half">

                        <img src="img/prod1.webp" alt="" id="prod">


                    </div>

                </div>



                <!--Grid column-->
                <div class="col-md-4 order-md-1">

                    <!--Image-->
                    <div class="view overlay z-depth-1-half">

                        <img src="img/prod2.jpg" alt="" id="prod">


                    </div>

                </div>

                <!--Grid column-->
                <div class="col-md-4 order-md-1">

                    <!--Image-->
                    <div class="view overlay z-depth-1-half">

                        <img src="img/prod3.jpg" alt="" id="prod">


                    </div>

                </div>

            </div>





        </section>


    </div>

    <footer style="background-color: black;">

        <!-- Contatos -->

        <div class="container my-5 py-5 z-depth-1 text-light">

            <section class="px-md-5 mx-md-5 text-center text-lg-left">

                <div class="row">

                    <div class="col-md-12">

                        <h2 class="font-italic">Contatos</h2>
                        <br>
                        <p>Para mais informaçoes contate:
                            <br>
                            <br>
                            <label for="email" class="ml-2">E-mail: wallacewwwallace@gmail.com</label>
                            <br>

                            <img src="img/wpp2.png" style="width:28px; height:28px;" class="ml-2">
                            <label for="number">+55 (21) 99764-4321</label>
                            <br>
                            <img src="img/fb1.jpg" class="" style="width:50px; height:50px;">
                            <label for="number" class="pr-1">Magic Cards</label>
                            <br>

                        </p>


                    </div>




                </div>
            </section>
        </div>
    </footer>








</body>

</html>