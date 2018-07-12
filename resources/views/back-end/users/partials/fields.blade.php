
<!-- BLOCK ADD USER USER  -->

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataBloquesForEdit">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataformPersonales dataInformationPersonal">
        <h3>Información personal</h3>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Nombre</label>
            <input type="text" name="name" required>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Segundo Nombre</label>
            <input type="text" name="second_name" required>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Apellidos</label>
            <input type="text" name="lastname" required>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Correo personal</label>
            <input type="email" name="personal_email" required>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Genero</label>
            <select  name="gender" required>
                <option value="1">Masculino</option>
                <option value="0">Femenino</option>
            </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Estado civil</label>
            <select name="marital" required>
                <option value="0">Soltero/a</option>
                <option value="1">Casado/a</option>
                <option value="2">Divorciado/a</option>
                <option value="3">Viudo/a</option>
            </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Dirección</label>
            <input type="text" name="address" required>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Departamento</label>
            <input type="text" name="department" required>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Municipio</label>
            <input type="text" name="town" required>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Cumpleaños</label>
            <input type="date" name="birthdate" step="1" min="1960-01-01" value="1980-01-01" required>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats inputFilesd">
            <label for="">Foto</label>
            <input type="file" name="avatar" required>
        </div>

    </div>

    <!-- FORMACION ACADEMICA  -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataformPersonales">
        <h3 class="separe_block">Formación Academica</h3>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Bachillerato</label>
            <input type="text" name="school" required>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Técnico</label>
            <input type="text" name="technical">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Superior</label>
            <input type="text" name="university">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Posgrado</label>
            <input type="text" name="postgraduate">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Diplomado</label>
            <input type="text" name="diplomat">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Otros Conocimiento</label>
            <input type="text" name="others">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Habilidades</label>
            <input type="text" name="abilities" required>
        </div>
    </div>

    <!-- INFORMACION EMPLEADO -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataformPersonales">
        <h3 class="separe_block">Informacion Empleado</h3>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Marca</label>
            <select  name="mark_id" required>
                @forelse($marks as $key => $mark)
                    <option value="{{ $key }}">{{ $mark }}</option>
                @empty
                    <option>No hay marcas registradas</option>
                @endforelse
            </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Sucursal</label>
            <select name="branch_id" required>
                @forelse($branches as $key => $branch)
                    <option value="{{ $key }}">{{ $branch }}</option>
                @empty
                    <option>No hay marcas registradas</option>
                @endforelse
            </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Correo Corporativo</label>
            <input type="email" name="email" required>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Password</label>
            <input id="password" type="password" name="password" required>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats inputSaDbdi">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 datTwoBliuqye">
                <label for="">Celular</label>
                <input type="text" name="phone" required>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 datTwoBliuqye">
                <label for="">Extención</label>
                <input type="text" name="extension" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Fecha Ingreso</label>
            <input type="date" name="admission" step="1" min="1960-01-01" value="1980-01-01" required>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Area</label>
            <select name="area_id" required>
                @forelse($areas as $key => $area)
                    <option value="{{ $key }}">{{ $area }}</option>
                @empty
                    <option>No hay areas registradas</option>
                @endforelse
            </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Cargo</label>
            <input type="text" name="position" required>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Jefe Inmediato</label>
            <select name="boss_id" required>
                @forelse($bosses as $key => $boss)
                    <option value="{{ $boss->id }}">{{ $boss->full_name }}</option>
                @empty
                    <option>No hay jefes registradas</option>
                @endforelse
            </select>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Rol User</label>
            <select name="role_id" required>
                @forelse($roles as $key => $rol)
                    <option value="{{ $key }}">{{ $rol }}</option>
                @empty
                    <option>No hay roles</option>
                @endforelse
            </select>
        </div>
    </div>

</div>

<!-- END BLOCK EDIT USER -->

<!-- BLOCK CLOCK -->

@include('back-end.users.partials.schedule')


<!-- END BLOCK CLOCK -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 submitEditU">
    <input type="submit" value='Aceptar'>
</div>
