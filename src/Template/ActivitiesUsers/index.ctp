<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="small-3 medium-2 large-2 columns" id="actions-sidebar">
    <ul class="menu vertical">
        <li class="menu-text"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Activities User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="activitiesUsers index small-9 medium-10 large-10 columns content">
    <h3><?= __('Activities Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('activity_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fulltime') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($activitiesUsers as $activitiesUser): ?>
            <tr>
                <td><?= $this->Number->format($activitiesUser->id) ?></td>
                <td><?= $activitiesUser->has('user') ? $this->Html->link($activitiesUser->user->id, ['controller' => 'Users', 'action' => 'view', $activitiesUser->user->id]) : '' ?></td>
                <td><?= $activitiesUser->has('activity') ? $this->Html->link($activitiesUser->activity->name, ['controller' => 'Activities', 'action' => 'view', $activitiesUser->activity->id]) : '' ?></td>
                <td><?= h($activitiesUser->start) ?></td>
                <td><?= h($activitiesUser->end) ?></td>
                <td><?= h($activitiesUser->fulltime) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $activitiesUser->user_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $activitiesUser->user_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $activitiesUser->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $activitiesUser->user_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination text-center">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p class="text-center"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
