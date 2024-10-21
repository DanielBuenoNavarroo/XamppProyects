<h1 class="text-3xl font-bold">Users</h1>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-400">
        <thead class="text-xs uppercase bg-gray-700 text-gray-400">
            <tr>
                <?php foreach ($display_user as $key) {
                    echo "<th scope='col' class='px-6 py-3'>$key</th>";
                } ?>
            </tr>
        </thead>
        <?php
        require_once "./model/db/get_users.php";
        $users = getUsers(0);
        if ($users !== false)
            foreach ($users as $userData) {
                echo '<tbody>
                    <tr class= odd:bg-gray-900 even:bg-gray-50 bg-gray-800 border-b border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">' . $userData['id'] . '</th>
                        <td class="px-6 py-4">' . $userData['nombre'] . '</td>
                        <td class="px-6 py-4">' . $userData['email'] . '</td>
                        <td class="px-6 py-4">' . $userData['rol_id'] . '</td>
                        <td class="px-6 py-4">' . $userData['fecha_registro'] . '</td>
                        <td class="px-6 py-4">
                            <a 
                                href="?id=' . $userData['id'] . '" 
                                class="font-medium text-blue-500 hover:underline">
                                Edit
                            </a>
                        </td>
                    </tr>
                </tbody>';
            }
        ?>
    </table>
</div>