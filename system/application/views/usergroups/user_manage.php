<div id="content" class="narrowcolumn">
<?php $this->lang->load('userauth', $this->session->userdata('ua_language')); ?>

	<h3><a href="javascript:divToogle('usersholder');"><?= $this->lang->line('ua_manage_user'); ?></a></h3>
	<?php if (isset($msg)) { echo "<p class=\"error\" id=\"msg\">$msg</p>"; } ?>
	<div id="usersholder">
		<?= anchor ('admin/usergroups/addUser', $this->lang->line('ua_adduser'), 
													array('class' => 'addButton'));?>
		<table class="stripe" id="users_table">
			<tr>
				<th><?= $this->lang->line('ua_username'); ?></th>
				<th><?= $this->lang->line('ua_group'); ?></th>
				<th><?= $this->lang->line('ua_fullname'); ?></th>
				<th><?= $this->lang->line('ua_email'); ?></th>
				<th><?= $this->lang->line('ua_enabled'); ?></th>
				<th>&nbsp;</th>
			</tr>
			<?php foreach ($listAllUsers->result() as $user): ?>
			<tr>
				<td class="username"><?= $user->username; ?></td>
				<td class="groupname"><?= $user->groupname; ?></td>
				<td class="fullname"><?= $user->fullname; ?></td>
				<td class="email"><?= mailto($user->email, $user->email); ?></td>
				<td class="enabled"><?= ($user->enabled)? 
					$this->lang->line('ua_yes'):$this->lang->line('ua_no'); ?></td>
				<td class="edit_delete" nowrap="nowrap">
					<?= anchor ('admin/usergroups/editUser/'.$user->userid, 
						$this->lang->line('ua_edit'));?>
					<?= anchor ('admin/usergroups/removeUser/'.$user->userid, 
						$this->lang->line('ua_remove'));?></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>