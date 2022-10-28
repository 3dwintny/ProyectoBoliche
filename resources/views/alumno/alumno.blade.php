<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Formulario de Inscripción</h1>
    <h3>Información Personal</h3>
    <form method="posts" role="form" enctype="multipart/form-data">
        <label>Primer Nombre</label>
        <input  type="text" name="nombre1" placeholder="Primer Nombre">
        <label>Segundo Nombre</label>
        <input  type="text" name="nombre2" placeholder="Segundo Nombre">
        <label>Tercer Nombre</label>
        <input  type="text" name="nombre3" placeholder="Tercer Nombre">
        <label>Primer Apellido</label>
        <input  type="text" name="apellido1" placeholder="Primer Apellido">
        <label>Segundo Apellido</label>
        <input  type="text" name="apellido2" placeholder="Segundo Apellido">
        <label>CUI</label>
        <input  type="text" name="cui" placeholder="CUI">
        <label>Fecha de Nacimiento</label>
        <input  type="date" name="fecha">
        <label>Peso</label>
        <input  type="text" name="peso" placeholder="Peso">
        <label>Altura</label>
        <input  type="text" name="altura" placeholder="Altura">
        <label>Género</label>
        <select name="genero">
            <option selected disabled>Género</option>
            <option>Femenino</option>
            <option>Masculino</option>
        </select>
        <label>Dirección</label>
        <input type="text" name="direccion" placeholder="Dirección">
        <label>Teléfono de Casa</label>
        <input type="tel" name="telefono_casa" placeholder="Teléfono Residencial">
        <label>Celular</label>
        <input type="tel"  name="celular" placeholder="Celular">
        <label>Correo</label>
        <input type="email" name="correo" placeholder="Correo">
        <label>Contacto de Emergencia</label>
        <input type="tel" name="contacto_emergencia" placeholder="Contacto de Emergencia">
        <label>Fotografía</label>
        <input type="file" name="foto">
        <label>NIT</label>
        <input type="text" name="nit" placeholder="NIT">
        <label>Pasaporte</label>
        <input type="text" name="pasaporte" placeholder="Pasaporte">
        <label>Departamento de Nacimiento</label>
        <select name="id_departamento" id="_departamento">
            <option selected disabled>Seleccionar Departamento</option>
        </select>
        <label>Municipio de Nacimiento</label>
        <select name="id_municipio" id="_municipio"></select>
        <label>Departamento de Residencia</label>
        <select name="id_departamento_residencia" id="_departamentoR">
            <option selected disabled>Departamento</option>
        </select>
        <label>Municipio de Nacimiento de Residencia</label>
        <select name="id_municipio_residencia" id="_municipioR"></select>
        <label>Nacionalidad</label>
        <select name="nacionalidad" id="">
            <option selected disabled>Nacionalidad</option>
        </select>
    </form>
</body>
</html>