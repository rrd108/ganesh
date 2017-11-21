<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="small-3 medium-2 large-2 columns" id="actions-sidebar">
    <ul class="menu vertical">
        <li class="menu-text"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Activities User'), ['action' => 'edit', $activitiesUser->user_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Activities User'), ['action' => 'delete', $activitiesUser->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $activitiesUser->user_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Activities Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activities User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="activitiesUsers view small-9 medium-10 large-10 columns content">
    <h3><?= h($activitiesUser->user_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $activitiesUser->has('user') ? $this->Html->link($activitiesUser->user->id, ['controller' => 'Users', 'action' => 'view', $activitiesUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Activity') ?></th>
            <td><?= $activitiesUser->has('activity') ? $this->Html->link($activitiesUser->activity->name, ['controller' => 'Activities', 'action' => 'view', $activitiesUser->activity->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($activitiesUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start') ?></th>
            <td><?= h($activitiesUser->start) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End') ?></th>
            <td><?= h($activitiesUser->end) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fulltime') ?></th>
            <td><?= $activitiesUser->fulltime ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
