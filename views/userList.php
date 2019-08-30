<?php
include_once 'header.php';
?>
<form action="userList" method="POST">
    <div class="form-row justify-content-lg-start my-2">
        <select id="idService" class="custom-select col-5">
            <option value="0">TOUS</option>
            <?php foreach ($serviceList as $serviceinfo): ?>
                <option value="<?= $serviceinfo->idService ?>"><?= $serviceinfo->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</form>
<table class="table table-bordered text-center">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
            <th>Adresse</th>
            <th>Code Postal</th>
            <th>Numéro de tel</th>
            <th>Service</th>
        </tr>
    </thead>
    <tbody id="tbody">
        <?php foreach ($UserList as $user) { ?>
            <tr>
                <td><?= $user->lastName ?></td>
                <td><?= $user->firstName ?></td>
                <td><?= $user->birthdate ?></td>
                <td><?= $user->adress ?></td>
                <td><?= $user->zipCode ?></td>
                <td><?= $user->phoneNumber ?></td>
                <td><?= $user->service ?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<?php
include_once 'footer.php';
