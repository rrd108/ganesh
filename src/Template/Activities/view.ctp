<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="small-3 medium-2 large-2 columns" id="actions-sidebar">
    <ul class="menu vertical">
        <li class="menu-text"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Activity'), ['action' => 'edit', $activity->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Activity'), ['action' => 'delete', $activity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activity->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Activities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activity'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Festivals'), ['controller' => 'Festivals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Festival'), ['controller' => 'Festivals', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="activities view small-9 medium-10 large-10 columns content">
    <h3><?= h($activity->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Festival') ?></th>
            <td><?= $activity->has('festival') ? $this->Html->link($activity->festival->name, ['controller' => 'Festivals', 'action' => 'view', $activity->festival->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Department') ?></th>
            <td><?= $activity->has('department') ? $this->Html->link($activity->department->name, ['controller' => 'Departments', 'action' => 'view', $activity->department->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($activity->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($activity->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Manpower') ?></th>
            <td><?= $this->Number->format($activity->manpower) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start') ?></th>
            <td><?= h($activity->start) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End') ?></th>
            <td><?= h($activity->end) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($activity->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Token') ?></th>
                <th scope="col"><?= __('Token Expires') ?></th>
                <th scope="col"><?= __('Api Token') ?></th>
                <th scope="col"><?= __('Activation Date') ?></th>
                <th scope="col"><?= __('Secret') ?></th>
                <th scope="col"><?= __('Secret Verified') ?></th>
                <th scope="col"><?= __('Tos Date') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Is Superuser') ?></th>
                <th scope="col"><?= __('Role') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($activity->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->first_name) ?></td>
                <td><?= h($users->last_name) ?></td>
                <td><?= h($users->token) ?></td>
                <td><?= h($users->token_expires) ?></td>
                <td><?= h($users->api_token) ?></td>
                <td><?= h($users->activation_date) ?></td>
                <td><?= h($users->secret) ?></td>
                <td><?= h($users->secret_verified) ?></td>
                <td><?= h($users->tos_date) ?></td>
                <td><?= h($users->active) ?></td>
                <td><?= h($users->is_superuser) ?></td>
                <td><?= h($users->role) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
