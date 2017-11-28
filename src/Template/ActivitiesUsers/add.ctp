<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="small-3 medium-2 large-2 columns" id="actions-sidebar">
    <ul class="menu vertical">
        <li class="menu-text"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Activities Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="activitiesUsers form small-9 medium-10 large-10 columns content">
    <?= $this->Form->create($activitiesUser) ?>
    <fieldset>
        <legend><?= __('Add Activities User') ?></legend>
        <?php
            echo $this->Form->control('activity_id', ['options' => $activities]);
            ?>
            <?= $this->Form->label('ActivitiesUsers.start', __('Start date & time')); ?>
        <?= $this->Form->dateTime('start', [
            'minYear' => date('Y')-2,
            'maxYear' => date('Y')+2,
            'monthNames' => true,
            'orderYear' => 'asc',
            'empty' => [
                'year' => __('Choose year...'),
                'month' => __('Choose month...'),
                'day' => __('Choose day...'),
                'hour' => __('Choose hour...'),
                'minute' => __('Choose minute...')
            ],
            'year' => [
                'class' => 'columns medium-3'
            ],
            'month' => [
                'class' => 'columns medium-5 date-form'
            ],
            'day' => [
                'class' => 'columns medium-3 date-form'
            ],
            'hour' => [
                'class' => 'columns medium-3'
            ],
            'minute' => [
                'class' => 'columns medium-3 date-form'
            ]

        ]); ?>
        <?= $this->Form->label('ActivitiesUsers.end', __('End date & time')); ?>
        <?= $this->Form->dateTime('end', [
            'minYear' => date('Y')-2,
            'maxYear' => date('Y')+2,
            'monthNames' => true,
            'orderYear' => 'asc',
            'empty' => [
                'year' => __('Choose year...'),
                'month' => __('Choose month...'),
                'day' => __('Choose day...'),
                'hour' => __('Choose hour...'),
                'minute' => __('Choose minute...')
            ],
            'year' => [
                'class' => 'columns medium-3'
            ],
            'month' => [
                'class' => 'columns medium-5 date-form'
            ],
            'day' => [
                'class' => 'columns medium-3 date-form'
            ],
            'hour' => [
                'class' => 'columns medium-3'
            ],
            'minute' => [
                'class' => 'columns medium-3 date-form'
            ]

        ]); ?>

            <?php
            echo $this->Form->control('fulltime');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'button']) ?>
    <?= $this->Form->end() ?>
</div>
