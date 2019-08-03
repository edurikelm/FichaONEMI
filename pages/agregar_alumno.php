
<!-- Conexion -->
<?php include ("../configs/conexion_db.php"); ?>

<?php
include('includes/interfaz.php');
?>
<script src="../js/validarut.js"></script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <a href="lista_alumno.php" class="btn btn-sm btn-primary btn-volver-lista">Lista alumnos</a>

            <h1 class="page-header">Agregar Alumno</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ingreso de datos
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form id="limpiar" name="formulario1" role="form" method="POST" action="../modulos/agregar_alumno.php" onsubmit="return validar();">

                            <div class="col-lg-6" >
                                <div class="form-group">
                                    <label for="">Rut</label>
                                    <input id="rut" name="rut" type="text" class="form-control" oninput="checkRut(this)" required selected autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="">Nombres</label>
                                    <input id="nombres" name="nombres" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Apellidos</label>
                                    <input id="apellidos" name="apellidos" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Fecha nacimiento</label>
                                    <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Dirección</label>
                                    <input id="direccion" name="direccion" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Previsión de salud</label>
                                    <select class="form-control" name="salud" required>
                                        <option value="" selected="selected">-- Seleccione --</option>
                                        <option value="Isapre">Isapre</option>
                                        <option value="Fonasa">Fonasa</option>
                                        <option value="Capredena">Capredena</option>
                                        <option value="Subsidio familiar">Subsidio familiar</option>
                                        <option value="Prais">Prais</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                                <div class="form-group"> 
                                    <label for="">Vive con</label>
                                    <select class="form-control" name="vive" required>
                                        <option value="">-- Seleccione --</option>
                                        <option value="Madre y Padre">Madre y Padre</option>
                                        <option value="Madre">Madre</option>
                                        <option value="Padre">Padre</option>
                                        <option value="Abuelos">Abuelos</option>
                                        <option value="Otro familiar">Otro familiar</option>
                                        <option value="Institución">Institución</option>

                                    </select>
                                </div>
                                <div class="form-group"> 
                                    <label for="">Institución Protección social</label>
                                    <select class="form-control" name="social" required>
                                        <option value="">-- Seleccione --</option>
                                        <option value="SENAME">SENAME</option>
                                        <option value="CEPIJ">CEPIJ</option>
                                        <option value="Tribunales">Tribunales</option>
                                        <option value="COSAM">COSAM</option>
                                        <option value="OPCION">OPCION</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Apodrado 1</label>
                                    <input id="apodrado1" name="apodrado1" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Apodrado 2</label>
                                    <input id="apodrado2" name="apodrado2" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Fono/Contacto</label>
                                    <input id="telefono" name="telefono" type="text" class="form-control" required>
                                </div>
                                <div class="form-group"> 
                                    <label for="">PIE</label>
                                    <select class="form-control" name="pie" required>
                                        <option value="">-- Seleccione --</option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="form-group"> 
                                    <label for="">Diagnostico</label>
                                    <input id="diagnostico" name="diagnostico" type="text" class="form-control" required>
                                    
                                </div>
                                
                                <div class="form-group"> 
                                    <label for="">Tipo de estudiante</label>
                                    <select class="form-control" name="tipo" required>
                                        <option value="">-- Seleccione --</option>
                                        <option value="Nuevo">Nuevo</option>
                                        <option value="Extranjero">Extranjero</option>
                                        <option value="De la escuela">De la escuela</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Curso</label>
                                    <input id="curso" name="curso" type="text" class="form-control" required>                                        
                                </div>
                                <div class="form-group"> 
                                    <label for="">Repitencia</label>
                                    <select class="form-control" name="repitencia" required>
                                        <option value="">-- Seleccione --</option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                        
                                    </select>
                                </div>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button id="send" class="btn btn-primary btn-lg btn-block " name="btn-crear" type="submit">Registrar
                                        Alumno</button>
                                </div>
                                <div class="col-lg-6">
                                    <input type="button" class="btn btn-lg btn-block btn-danger" value="Limpiar campos" onclick="Limpiar();" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6"></div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function Limpiar() {
    var t = document.getElementById("limpiar").getElementsByTagName("input");
    for (var i=0; i<t.length; i++) {
        t[i].value = "";
        }
    }
</script>


<script type="text/javascript">
			//1) Definir Las Variables Correspondintes
			ciudades_1 = new Array("Arica");
    ciudades_2 = new Array("Alto Hospicio", "Iquique", "Pozo Almonte");
    ciudades_3 = new Array("Caldera", "Chanaral", "Copiapo", "Diego de Almagro", "El Salvador", "Huasco",
        "Tierra Amarilla", "Vallenar");
    ciudades_4 = new Array("Andacollo", "Combarbala", "Coquimbo", "El Palqui", "Illapel", "La Serena", "Los Vilos",
        "Montepatria", "Ovalle", "Salamanca", "Vicuna");
    ciudades_5 = new Array("Algarrobo", "Cabildo", "Calle Larga", "Cartagena", "Casablanca", "Catemu", "Concon",
        "El Melon", "El Quisco", "El Tabo", "Hijuelas", "La Calera", "La Cruz", "La Ligua", "Las Ventanas",
        "Limache", "Llaillay", "Los Andes", "Nogales", "Olmue", "Placilla de Penuelas", "Putaendo", "Quillota",
        "Quilpue", "Quintero", "Rinconada", "San Antonio", "San Esteban", "San Felipe", "Santa Maria",
        "Santo Domingo", "Valparaiso", "Villa Alemana", "Villa Los Almendros", "Vina del Mar");
    ciudades_6 = new Array("Chimbarongo", "Codegua", "Donihue", "Graneros", "Gultro", "Las Cabras", "Lo Miranda",
        "Machali", "Nancagua", "Palmilla", "Peumo", "Pichilemu", "Punta Diamante", "Quinta de Tilcoco", "Rancagua",
        "Rengo", "Requinoa", "San Fernando", "San Francisco de Mostazal", "San Vicente de Tagua Tagua",
        "Santa Cruz");
    ciudades_7 = new Array("Cauquenes", "Constitucion", "Curico", "Hualane", "Linares", "Longavi", "Molina", "Parral",
        "San Clemente", "San Javier", "Talca", "Teno", "Villa Alegre");
    ciudades_8 = new Array("Arauco", "Bulnes", "Cabrero", "Canete", "Chiguayante", "Chillan", "Chillan Viejo",
        "Coelemu", "Coihueco", "Concepcion", "Conurbacion La Laja-San Rosendo", "Coronel", "Curanilahue", "Hualpen",
        "Hualqui", "Huepil", "Lebu", "Los alamos", "Los angeles", "Lota", "Monte aguila", "Mulchen", "Nacimiento",
        "Penco", "Quillon", "Quirihue", "San Carlos", "San Pedro de la Paz", "Santa Barbara", "Santa Juana",
        "Talcahuano", "Tome", "Yumbel", "Yungay");
    ciudades_9 = new Array("Angol", "Carahue", "Collipulli", "Cunco", "Curacautin", "Freire", "Gorbea", "Labranza",
        "Lautaro", "Loncoche", "Nueva Imperial", "Padre Las Casas", "Pitrufquen", "Pucon", "Puren", "Renaico",
        "Temuco", "Traiguen", "Victoria", "Villarrica");
    ciudades_14 = new Array("Futrono", "La Union", "Lanco", "Los Lagos", "Paillaco", "Panguipulli", "Rio Bueno",
        "San Jose de la Mariquina", "Valdivia");
    ciudades_11 = new Array("Coihaique", "Puerto Aisen");
    ciudades_12 = new Array("Punta Arenas", "Puerto Natales");
    ciudades_13 = new Array("Alto Jahuel", "Bajos de San Agustin", "Batuco", "Buin", "Cerrillos", "Cerro Navia",
        "Colina", "Conchali", "Curacavi", "El Bosque", "El Monte", "Estacion Central", "Hospital", "Huechuraba",
        "Independencia", "Isla de Maipo", "La Cisterna", "La Florida", "La Granja", "La Islita", "La Pintana",
        "La Reina", "Lampa", "Las Condes", "Lo Barnechea", "Lo Espejo", "Lo Prado", "Macul", "Maipu", "Melipilla",
        "Nunoa", "Padre Hurtado", "Paine", "Pedro Aguirre Cerda", "Penaflor", "Penalolen", "Pirque", "Providencia",
        "Pudahuel", "Puente Alto", "Quilicura", "Quinta Normal", "Recoleta", "Renca", "San Bernardo", "San Joaquin",
        "San Jose de Maipo", "San Miguel", "San Ramon", "Santiago", "Talagante", "Tiltil", "Vitacura");
    ciudades_10 = new Array("Ancud", "Calbuco", "Castro", "Fresia", "Frutillar", "Llanquihue", "Los Muermos", "Osorno",
        "Puerto Montt", "Puerto Varas", "Purranque", "Quellon", "Rio Negro");
    ciudades_15 = new Array("Antofagasta", "Calama", "Maria Elena", "Mejillones", "Taltal", "Tocopilla");
			// 2) crear una funcion que permita ejecutar el cambio dinamico
			
			function cambia(){
				var cosa;
				//Se toma el vamor de la "cosa seleccionada"
				cosa = document.formulario1.cosa[document.formulario1.cosa.selectedIndex].value;
				//se chequea si la "cosa" esta definida
				if(cosa!=0){
					//selecionamos las cosas Correctas
					mis_opts=eval("ciudades_" + cosa);
					//se calcula el numero de cosas
					num_opts=mis_opts.length;
					//marco el numero de opt en el select
					document.formulario1.opt.length = num_opts;
					//para cada opt del array, la pongo en el select
					for(i=0; i<num_opts; i++){
						document.formulario1.opt.options[i].value=mis_opts[i];
						document.formulario1.opt.options[i].text=mis_opts[i];
					}
					}else{
						//si no habia ninguna opt seleccionada, elimino las cosas del select
						document.formulario1.opt.length = 1;
						//ponemos un guion en la unica opt que he dejado
						document.formulario1.opt.options[0].value="-";
						document.formulario1.opt.options[0].text="-";
					}
					//hacer un reset de las opts
					document.formulario1.opt.options[0].selected = true;
					
				}
			
			
		
		</script>


<?php include('includes/cierre-interfaz.php'); ?>