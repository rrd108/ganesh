<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="small-3 medium-2 large-2 columns" id="actions-sidebar">
    <ul class="menu vertical">
        <li class="menu-text"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Department'), ['action' => 'edit', $department->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Department'), ['action' => 'delete', $department->id], ['confirm' => __('Are you sure you want to delete # {0}?', $department->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Departments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Department'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Managers'), ['controller' => 'Managers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Manager'), ['controller' => 'Managers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Places'), ['controller' => 'Places', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Place'), ['controller' => 'Places', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="departments view small-9 medium-10 large-10 columns content">
    <h3><?= h($department->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($department->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Manager') ?></th>
            <td><?= $department->has('manager') ? $this->Html->link($department->manager->name, ['controller' => 'Managers', 'action' => 'view', $department->manager->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Place') ?></th>
            <td><?= $department->has('place') ? $this->Html->link($department->place->name, ['controller' => 'Places', 'action' => 'view', $department->place->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($department->name) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Activities') ?></h4>
        <?php if (!empty($department->activities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Festival Id') ?></th>
                <th scope="col"><?= __('Department Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Start') ?></th>
                <th scope="col"><?= __('End') ?></th>
                <th scope="col"><?= __('Manpower') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($department->activities as $activities): ?>
            <tr>
                <td><?= h($activities->id) ?></td>
                <td><?= h($activities->festival_id) ?></td>
                <td><?= h($activities->department_id) ?></td>
                <td><?= h($activities->name) ?></td>
                <td><?= h($activities->start) ?></td>
                <td><?= h($activities->end) ?></td>
                <td><?= h($activities->manpower) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Activities', 'action' => 'view', $activities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Activities', 'action' => 'edit', $activities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Activities', 'action' => 'delete', $activities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
