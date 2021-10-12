<! DOCTYPE html>

<html>

<cabeza>

    <title> ejemplo de carga de archivo laravel 6 - ItSolutionStuff.com.com </title>

    <link rel = "stylesheet" href = "http://getbootstrap.com/dist/css/bootstrap.css">

</head>

<cuerpo>

<div>

    <div>

      <div> <h2> ejemplo de carga de archivo laravel 6 - ItSolutionStuff.com.com </h2> </div>

      <div>

        @if ($ mensaje = Sesión :: get ('éxito'))

        <div>

            <button type = "button" data-dispats = "alert"> × </button>

                <strong> {{$ mensaje}} </strong>

        </div>

        <img src = "uploads / {{Session :: get ('file')}}">

        @terminara si

        @if (recuento ($ errores)> 0)

            <div>

                <strong> ¡Vaya! </strong> Hubo algunos problemas con tu entrada.

                <ul>

                    @foreach ($ errores-> all () como $ error)

                        <li> {{$ error}} </li>

                    @endforeach

                </ul>

            </div>

        @terminara si

        <form action = "{{route ('file.upload.post')}}" method = "POST" enctype = "multipart / form-data">

            @csrf

            <div>

                <div>

                    <input type = "file" name = "file">

                </div>

                <div>

                    <button type = "enviar"> Subir </button>

                </div>

            </div>

        </form>

      </div>

    </div>

</div>

</body>

</html>