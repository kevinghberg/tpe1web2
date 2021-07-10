{include file="header.tpl"}
<h2 >Lista de todos los Usuarios Registrados</h2>

{if $logged eq 'admin'}
   <section >
        <table>
            <thead>
                <tr>
                    <th>Rol Actual</th>
                    <th>Nombre</th>
                    <th>Cambiar Rol</th>
                    <th>Eliminar Usuario</th>
                </tr>
            </thead>
            <tbody  >
                {foreach from=$users item=user}
                    <tr>
                        {if $user->admin eq 0}
                            <td>Usuario Registrado</td>
                        {elseif $user->admin eq 1}
                            <td>Admin</td>
                        {/if}
                    <td>{$user->username}</td>
                    {if $user->admin eq 0}
                        <form action="admin/{$user->id}" method="POST">
                        <td><input id="input_admin" type="submit" value="Set Admin"></td>
                        </form>
                    {elseif $user->admin eq 1}
                        <form action="user/{$user->id}" method="POST">
                        <td><input id="input_admin" type="submit" value="Remover Admin"></td>
                        </form>
                    {/if}
                    <td> <button> <a href="deleteUser/{$user->id}">Eliminar Usuario</a> </button> </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </section>
{/if}