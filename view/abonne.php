<h1>Page Abonne 🎈</h1>

<table>
    <thead>
        <tr>
            <th>Abonne</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($abonne as $values): ?>
            <tr>
                <td><?= $values ['prenom']?></td>
            </tr>
            <?php endforeach; ?>
    </tbody>
</table>