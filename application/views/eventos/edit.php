<head>
    <style>
        div { text-align: center;
            width: 80%;
            margin: 0 auto;}
        label { color: green;}
        small { color: red;}
    </style>
</head>

<h2><?= $titulo;?></h2><br><br>

<?php echo validation_errors(); ?>
<?php echo form_open ('eventos/update'); ?>
<input type="hidden" name="id" value="<?php echo $evento['evento_id'];?>">
<div class="form-group">
    <label for="titulo">Título</label>
    <input type="text" class="form-control" name="titulo" placeholder="Introduce Título de la Noticia">
    <small id="ayudaTitulo">Máximo de 250 carácteres.</small>
</div>
<div class="form-group">
    <label for="cartel">Cartel</label>
    <input type="text" class="form-control" name="cartel" placeholder="Cártel del Evento">
    <small id="ayudaCartel">Máximo de 250 carácteres.</small>
</div>
<div class="form-group">
    <label for="reglamento">Reglamento</label>
    <textarea id="editor1" class="form-control" name="reglamento" placeholder="Reglamento del Evento"></textarea>
    <small id="ayudaReglamento">Máximo de 1000 carácteres.</small>
</div>
<div class="form-group">
    <label for="fecha">Fecha</label>
    <input type="date" class="form-control" name="fecha" placeholder="Fecha del Evento">
    <small id="ayudaFecha">Formato inglés (YYYY/MM/DD).</small>
</div>
<div class="form-group">
    <label for="hora">Hora</label>
    <input type="time" class="form-control" name="hora" placeholder="Horario del Evento">
    <small id="ayudaHora">Formato (HH:MM).</small>
</div>
<div class="form-group">
    <label for="provincia">Provincia</label>
    <input type="text" class="form-control" name="provincia" placeholder="Provincia Donde Tiene Lugar el Evento">
    <small id="ayudaProvincia">Máximo de 15 carácteres.</small>
</div>
<div class="form-group">
    <label for="poblacion">Población</label>
    <input type="text" class="form-control" name="poblacion" placeholder="Poblacion Donde Tiene Lugar el Evento">
    <small id="ayudaPoblacion">Máximo de 15 carácteres.</small>
</div>
<div class="form-group">
    <label for="organizador">Organizador</label>
    <input type="text" class="form-control" name="organizador" placeholder="Organizador del Evento">
    <small id="ayudaOrganizador">Máximo de 20 carácteres.</small>
</div>
<div class="form-group">
    <label for="salida">Salida</label>
    <input type="text" class="form-control" name="salida" placeholder="Carretera Donde se Encuentra la Salida del Evento">
    <small id="ayudaSalida">Máximo de 20 carácteres.</small>
</div>
<div class="form-group">
    <label for="meta">Meta</label>
    <input type="text" class="form-control" name="meta" placeholder="Carretera Donde se Encuentra la Meta del Evento">
    <small id="ayudaMeta">Máximo de 20 carácteres.</small>
</div>
<div class="form-group">
    <label for="tipo">Tipo</label>
    <select name="tipo" class="form-control">
        <?php foreach($tipos as $tipo): ?>
            <option value="<?php echo $tipo['tipo_id']; ?>"><?php echo $tipo['tipo_descripcion']; ?></option>
        <?php endforeach; ?>
</div>
<button type="submit" class="btn btn-primary">Actualizar Datos</button>
</form>