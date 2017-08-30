<tr>
  <td><?= $user->get('id'); ?></td>
  <td><?= $user->get('username'); ?></td>
  <td><?= $user->get('email'); ?></td>
  <td><?= $user->get('registerDate'); ?></td>
  <td><?= $user->get('lastLoginDate'); ?></td>
  <td><?= strlen($user->get('password')) > 0 ? '&#x2714;' : ''; ?></td>
  <td>
    <form method="post" action="delete">
      <input type="hidden" value="<?= $user->get('id'); ?>" name="id"/>
      <button type="submit" class="ui left attached red button">Löschen</button>
      <a href="edit?id=<?= $user->get('id'); ?>" class="ui right attached button">bearbeiten</a>
    </form>
  </td>
</tr>
