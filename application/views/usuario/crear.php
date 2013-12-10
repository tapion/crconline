<form id="frmCrear">
    <table border="0">
        <tr>
            <td>
                <h4>Nombre</h4>
                <input class="form-control" type="text" name="email" placeholder="Nombre">
            </td>
        </tr>
        <tr>
            <td>
                <h4>Persona</h4>
                <select id="selPersona" class="chzn-select" style="width: 150px">
                    <option>--seleccione--</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"><br>
                <button class="btn btn-sm btn-primary" type="submit">Ingresar</button>
            </td>
        </tr>
    </table>

</form>

<script>$('.chzn-select').chosen();</script>